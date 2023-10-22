
<?php  

// tim kiem tat ca giao vien
function getAllTeachers($conn){
   $sql = "SELECT * FROM teachers where active=1";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   }else {
   	return 0;
   }
}

// kiem tra neu nhu ten nay doc nhat 
function findNameDocNhat($uname, $conn){
   $sql = "SELECT username FROM teachers
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);

   if ($stmt->rowCount() >= 1) {
     return 0;
   }else {
   	return 1;
   }
}