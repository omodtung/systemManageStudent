<?php 

 
function getAllStudents($conn){
   $sql = "SELECT students.*,avgscore.scoretype FROM students JOIN avgscore ON students.id=avgscore.ID_student WHERE status = 1";
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
  $sql = "SELECT students.*,avgscore.HocLuc FROM students JOIN avgscore ON students.id=avgscore.student_id WHERE id =$idStudent";
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