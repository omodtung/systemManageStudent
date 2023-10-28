<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
     include "../DB_connection.php";
     include "data/grade.php";
     include "data/student.php";
    // echo $_SESSION['malop'];
    //  $ma_lop = $_SESSION['malop'];
     $ma_lop = '10A1';
     $students = getStudentsByLopCode($conn, $ma_lop);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student - Grade Summary</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
* { 
    margin: 0;
    padding: 0;
}
.tableStyle {
    border: none;
    width: 100%;
}
.tableStyle th {
    background-color: #cad8fa;
    padding: 5px;
}
.tableStyle td {
    background-color: #f0e7da;
    padding: 5px;
}
</style>
</head>
<body>
<table class="tableStyle">
    <thead>
        <tr >
            <th>ID</th>
            <th>Tên</th>
            <th>Mã lớp</th>
            <th>Ngay Sinh</th>
            <th>Gioi Tinh</th>
            <th>Dia Chi</th>
            <th>Hoc Luc</th>
            <th>Hanh Kiem</th>
        </tr>
<?php 
        include "inc/navbar.php";
     ?>
    <?php 
       foreach ($students as $student) {
        echo "<tr>";
        echo "<td>{$student['student_id']}</td>";
        echo "<td>{$student['hotenhs']}</td>";
        echo "<td>{$student['malop']}</td>";
        echo "<td>{$student['ngaysinh']}</td>";
        echo "<td>{$student['gioitinh']}</td>";
        echo "<td>{$student['diachi']}</td>";
        echo "</tr>";
    }
    ?>

    </thead>
    <tbody>
        </tbody>
</table>
</body>
    
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 
?>