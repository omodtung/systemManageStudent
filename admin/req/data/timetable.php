<?php
function getAllTimeTable($conn){
    $sql = "SELECT * FROM students JOIN schedule on schedule.Class = students.malop ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if ($stmt->rowCount() >= 1) {
      $timetable = $stmt->fetchAll();
      return $timetable;
    }else {
        return 0;
    }
 }

?>