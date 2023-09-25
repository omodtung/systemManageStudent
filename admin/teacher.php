<?php
session_start();
// admin truy cap vao teacher
//kiem tra xem tren server co admin_id va role 
if(isset($_SESSION['admin_id']) && isset($_SESSION['role']))
{ 
    // neu cai role dung voi vai tro la admin thi
    if ($_SESSION['role']=='Admin')
    {
        // thuc hien voi database voi data teacher / subject/grade
        include "../DB_connection.php";
        include "data/teacher.php";
include "data/subject.php";
// viet code cho data/subject
include "data/grade/php";
// viet code cho data grade
$teacher = getAllTeacher($conn);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    include "inc/navbar.php";
    if($teacher !=0)
    {
?>
<div class ="container mt-5" >


<a href="teacher-add.php" class="btn btn-dark">add new teacher </a>
<div class="table-responsive">
<table class="table table-bordered mt-3 n-table">
    <!-- https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_table_bordered&stacked=h -->
    <!-- https://www.w3schools.com/bootstrap/bootstrap_tables.asp -->
<thead>
    <tr>
    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Action</th>
    </tr>
</thead>
<tbody>

<?php foreach ($teachers as $teacher){?>

<tr>
<!-- in ra gia tri cua tu khoa teacher_id trong mang teacher -->
<th scope="row">1</th>
<td><?=$teacher['teacher_id']?></td>
<td> <?=$teacher['fname']?></td>
<td><?=$teacher['lname']?></td>
<td><?=$teacher['username']?></td>
<td>

<?php
$s='';
$subjects = str_split(trim($teacher['subjects']))
// foreach ($subjects as $subject)
// {


// }
// $s_temp = get

?>
</td>
</tr>
</tbody>

</div>
</div>
    
    
</body>
</html>

<?php }
else
{
    header("Location:../login.php");
    exit;

} 

}else
{
    header("Location: ../login.php");
    exit;

}
