<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
       include "../DB_connection.php";
       include "data/student.php";
      //  include "data/subject.php";
       include "data/grade.php";
      //  include "data/section.php";
       $student_id = $_SESSION['student_id'];
       
       $student = getStudentById($student_id, $conn);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student - Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">

  <link rel="stylesheet" href="../css/style3.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>

  <section class="home-section">
    <?php 
        include "inc/navbar.php";
     ?>
     <?php 
        if ($student != 0) {
     ?>
     <div style="display: flex;" class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/student-<?=$student['gioitinh']?>.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$student['username']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Mã Học Sinh: <?=$student['mahs']?></li>
            <li class="list-group-item">Username: <?=$student['username']?></li>
            <li class="list-group-item">Họ và tên: <?=$student['hotenhs']?></li>
            <li class="list-group-item">Ngày sinh: <?=$student['ngaysinh']?></li>
            <li class="list-group-item">Giới tính: <?=$student['gioitinh']?></li>
            <li class="list-group-item">Địa Chỉ: <?=$student['diachi']?></li>

            <li class="list-group-item">Khối: 
                 <?php 
                      $grade = $student['makhoi'];
                      $g = getGradeBycode($grade, $conn);
                      echo $g['grade'];
                  ?>
            </li> 
          </ul>
        </div>
        
                    
                    
                  
        <div>
          <h2 style="text-align: center;">BẢNG ĐIỂM </h2>
        <table class="tableStyle">
          <tr style="width:100%" style="text-align: center">
            <th>Toán</th>
            <th>Vật Lý</th>
            <th>Hóa Học</th>
            <th>Ngữ Văn</th>
            <th>Lịch Sử</th>
            <th>Địa Lí</th>
            <th>Tiếng Anh</th>
            <th>GDCD</th>
            <th>Công Nghệ</th>
            <th>Tin Học</th>
            <th>Thể Dục</th>       
            <th>Sinh Học</th>
          </tr>
          <tr>
            <td><?=$student['Toan']?></td>
            <td><?=$student['VatLy']?></td>
            <td><?=$student['Hoa']?></td>
            <td><?=$student['NguVan']?></td>
            <td><?=$student['LichSu']?></td>
            <td><?=$student['DiaLi']?></td>
            <td><?=$student['TiengAnh']?></td>
            <td><?=$student['GDCD']?></td>
            <td><?=$student['CongNghe']?></td>
            <td><?=$student['TinHoc']?></td>
            <td><?=$student['TheDuc']?></td>
            <td><?=$student['SinhHoc']?></td>
          </tr>
        </table>


       
        <table class="tableStyle">
          <tr style="width:100%">
            <th>Toán</th>
            <th>Vật Lý</th>
            <th>Hóa Học</th>
            <th>Ngữ Văn</th>
            <th>Lịch Sử</th>
            <th>Địa Lí</th>
            <th>Tin Học</th>
            <th>Tiếng Anh</th>
            <th>GDCD</th>
            <th>Công Nghệ</th>
            <th>Thể Dục</th>       
            <th>Sinh Học</th>
          </tr>
          <tr>
            <td><?=$student['Toan2']?></td>
            <td><?=$student['VatLy2']?></td>
            <td><?=$student['Hoa2']?></td>
            <td><?=$student['NguVan2']?></td>
            <td><?=$student['LichSu2']?></td>
            <td><?=$student['DiaLi2']?></td>
            <td><?=$student['TiengAnh2']?></td>
            <td><?=$student['GDCD2']?></td>
            <td><?=$student['CongNghe2']?></td>
            <td><?=$student['TinHoc2']?></td>
            <td><?=$student['TheDuc2']?></td>
            <td><?=$student['SinhHoc2']?></td>
          </tr>
        </table>
          
        </div>
         <script>
        $(document).ready(function() {
          $("#navLinks li:nth-child(1) a").addClass('active')
        });
      </script>  
     </div>
     <a class="btn_pdf" href="info.php">Export to PDF</a>
     <?php 
        }else {
          header("Location: student.php");
          exit;
        }
     ?>
     
    
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

