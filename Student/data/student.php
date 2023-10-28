<?php 

// All Students 
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

function getStudentsByLopCode($conn, $ma_lop) {
  $sql = "SELECT * FROM students WHERE malop = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $ma_lop);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
      $students = $stmt->fetchAll();
      return $students;
  } else {
      return 0;
  }
}




function getStudentById($id, $conn){
   $sql = "SELECT * FROM students,avgscore
   WHERE ID_student = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}





// function getDiem($conn, $id_student) {
//   $sql = "SELECT * FROM avgscore WHERE ID_student = ?";
//   $stmt = $conn->prepare($sql);
//   $stmt->bindParam(1, $id_student);
//   $stmt->execute();

//   if ($stmt->rowCount() == 1) {
//       $avgscore = $stmt->fetchAll();
//       return $avgscore;
//   } else {
//       return 0;
//   }
// }