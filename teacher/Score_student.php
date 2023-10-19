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
    <?php
    // Include your database connection code here
    include "../DB_connection.php";

    // Check if the student ID is provided in the query parameter
    if (isset($_GET['student_id'])) {
        $student_id = $_GET['student_id'];

        // Write a SQL query to fetch detailed scores based on the student ID
        $sql = "SELECT students.mahs, students.hotenhs, subjects.*, score.*
        FROM students
        JOIN score ON students.mahs = score.student_code
        JOIN subjects ON subjects.subject_id = score.id_subject
        WHERE score.student_code = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$student_id]);
        $student_scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the detailed scores in a table or format of your choice
        if (!empty($student_scores)) {
            echo '<div class="container">';
            echo '<h1 class="mt-5">Điểm chi tiết của học sinh: ' . $student_scores[0]['hotenhs'] . '</h1>';
            echo '<table class="table table-bordered mt-3">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>Môn</th>';
            echo '<th>Điểm kiểm tra 15 phút</th>';
            echo '<th>Điểm kiểm tra 45</th>';
            echo '<th>Điểm thi</th>';
            echo '<th>Điểm trung bình môn</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($student_scores as $score) {
                echo '<tr>';
                echo '<td>' . $score['subject'] . '</td>';
                echo '<td>' . $score['diem15'] . '</td>';
                echo '<td>' . $score['diem45'] . '</td>';
                echo '<td>' . $score['thi'] . '</td>';
                echo '<td>' . $score['tbm'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="mt-5">No detailed scores available for this student.</p>';
        }
    } else {
        // Redirect or display an error message if the student ID is not provided
        header('Location: error_page.php');
        exit();
    }
    ?>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
