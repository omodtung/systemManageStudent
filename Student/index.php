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
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.tableStyle {
border-collapse: collapse;
width: 100%;
color: #333;
font-family: Arial, sans-serif;
font-size: 14px;
text-align: center;
border-radius: 10px;
overflow: hidden;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
margin: auto;
margin-top: 50px;
margin-bottom: 50px;
margin-left:50px;
}
th {
background-color: #ff9800;
color: #fff;
font-weight: bold;
padding: 10px;
text-transform: uppercase;
letter-spacing: 1px;
border-top: 1px solid #fff;
border-bottom: 1px solid #ccc;
}
tr:nth-child(even) td {
background-color: #f2f2f2;
}
tr:hover td {
background-color: #ffedcc;
}
td {
background-color: #fff;
padding: 10px;
border-bottom: 1px solid #ccc;
font-weight: bold;
}
</style>
  </style>

</head>
<body>
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

            <li class="list-group-item">Grade: 
                 <?php 
                      $grade = $student['makhoi'];
                      $g = getGradeBycode($grade, $conn);
                      echo $g['grade_code'].'-'.$g['grade'];
                  ?>
            </li> 
          </ul>
        </div>
        
                    
                    
                  
        <div>
          <h2 >BẢNG ĐIỂM </h2>
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

        </div>

     </div>
     <?php 
        }else {
          header("Location: student.php");
          exit;
        }
     ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>
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

