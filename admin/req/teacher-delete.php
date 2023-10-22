<?php
session_start();

include "../../DB_connection.php";

$id = $_GET['idteach'];
$sql = "UPDATE teachers SET active='0' WHERE id =:teacherId;";
// UPDATE test.teachers SET active='0' WHERE id =:teacherId;

$stmt = $conn->prepare($sql);
$stmt->bindParam(':teacherId', $id, PDO::PARAM_INT);
try {
    $stmt->execute();
    return true; // Teacher deleted successfully
} catch (PDOException $e) {
    return false; // Failed to delete teacher
}


if ($_SESSION['role'] !== 'Admin') {
    die('Permission denied');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['teachers'])) {
    $teacherId = $_POST['teachers'];


    if (deleteTeacher($teacherId, $conn)) {
        echo 'Teacher deleted successfully';
    } else {
        echo 'Failed to delete teacher';
    }
}
?>


<option value="" disabled selected>Select a teacher info</option>
            
    <?php
    include "../DB_connection.php";
    $query = "SELECT magv,hoten FROM teachers";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $name_teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($name_teachers as $name) {
        echo '<option value="' . $name['magv'] . '">' . $name['hoten'] . '</option>';
    }   

    ?>



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



    <?php
        $selected_teacher_details = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_teacher'])) {
            $teacher_id = $_POST['select_teacher'];  
            $query_details = "SELECT * FROM teachers WHERE magv = :teacher_id";
            $stmt_details = $conn->prepare($query_details);
            $stmt_details->bindParam(':teacher_id', $teacher_id, PDO::PARAM_STR);
            
            $stmt_details->execute();
            $selected_teacher_details = $stmt_details->fetch(PDO::FETCH_ASSOC);
        }
        if (!empty($selected_teacher_details)) {
            echo '<table class="table table-bordered mt-3">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Mã Giáo Viên</th>';
            echo '<th>Tên Giáo Viên</th>';
            echo '<th>Mã môn học </th>';
            echo '<th>Mã khối</th>';
            echo '<th>Ngày sinh</th>';
            echo '<th>Giới Tính</th>';
            echo '<th>Địa Chỉ</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $selected_teacher_details['magv'] . '</td>';
            echo '<td>' . $selected_teacher_details['hoten'] . '</td>';
            echo '<td>' . $selected_teacher_details['mamonhoc'] . '</td>';
            echo '<td>' . $selected_teacher_details['makhoi'] . '</td>';
            echo '<td>' . $selected_teacher_details['ngaysinh'] . '</td>';
            echo '<td>' . $selected_teacher_details['gioitinh'] . '</td>';
            echo '<td>' . $selected_teacher_details['diachi'] . '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No teacher details available for the selected teacher.</p>';
        }
        
    ?>

</body>
</html>
