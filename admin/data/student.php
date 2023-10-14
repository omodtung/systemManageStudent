<?php 

 
function getAllStudents($conn){
   $sql = "SELECT * FROM students";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
   	return 0;
   }
}


function getStudentUsingId( $conn , $idStudent)
{
  $sql = "SELECT * FROM students WHERE id =$idStudent";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetch();
    
    return $students;
  }else {
    return 0;
  }

}


 ?>