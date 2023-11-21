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
   $sql = "SELECT *
   FROM students s
   JOIN avgscore a ON s.student_id = a.ID_student
   JOIN avgscore2 a2 ON s.student_id = a2.ID_student
   WHERE s.student_id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}

function studentPasswordVerify($student_pass, $conn, $student_id){
  $sql = "SELECT * FROM students
          WHERE student_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$student_id]);

  if ($stmt->rowCount() == 1) {
    $student = $stmt->fetch();
    $pass  = $student['password'];

    if (password_verify($student_pass, $pass)) {
       return 1;
    }else {
       return 0;
    }
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