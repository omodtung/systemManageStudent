<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Scores</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <form method="POST" action="">
        <!-- Larger "Select Grade" text using Bootstrap classes -->
        <label class="h4">Select Grade:</label>
        <select name="selected_grade" onchange="this.form.submit()" class="form-control">
            <option value="" disabled selected>Select a grade</option>
            <option value="k10">Khối 10</option>
            <option value="k11">Khối 11</option>
            <option value="k12">Khối 12</option>
        </select>
    </form>
    <?php
        include "../DB_connection.php";
        if (isset($_POST["selected_grade"])) {
            // Handle the selected grade and fetch student scores here
            $selected_grade = $_POST["selected_grade"];
            // Replace the following lines with your database query and results retrieval
            $student_scores = []; // Sample data
        
            // Your SQL query to filter by selected grade
            $sql = "SELECT students.mahs, students.hotenhs, AVG(score.tbm) AS diem_tb
                    FROM schema3.score
                    JOIN schema3.students ON score.student_code = students.mahs
                    WHERE students.makhoi = :selected_grade
                    GROUP BY students.mahs, students.hotenhs
                    ";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':selected_grade', $selected_grade, PDO::PARAM_STR);
            $stmt->execute();
            $student_scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($student_scores)) {
                echo '<table class="table table-bordered mt-3">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Mã Học Sinh</th>';
                echo '<th>Họ Tên Học Sinh</th>';
                echo '<th>Điểm Trung Bình Học Kì</th>';
                echo '<th>Xem chi tiết</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($student_scores as $score) {
                    echo '<tr>';
                    echo '<td>' . $score['mahs'] . '</td>';
                    echo '<td>' . $score['hotenhs'] . '</td>';
                    echo '<td>' . number_format($score['diem_tb'], 2) . '</td>';
                
                    echo '<td>';
                    echo '<button type="button" onclick="window.location.href=\'Score_student.php?student_id=' . $score['mahs'] . '\'">';
                    echo 'View More';
                    echo '</button>';
                    echo '</td>';

                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No student scores available for the selected grade.</p>';
            }
        }
    ?>

    <!-- Include Bootstrap JavaScript (Optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleScores(link) {
            var scoresDiv = link.nextElementSibling;
            if (scoresDiv.style.display === 'none') {
                scoresDiv.style.display = 'block';
                link.innerHTML = 'Hide Scores';
            } else {
                scoresDiv.style.display = 'none';
                link.innerHTML = 'View More';
            }
        }
    </script>
</body>
</html>
