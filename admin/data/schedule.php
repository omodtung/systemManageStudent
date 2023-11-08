
<?php  

function getSchedule($conn,$idsche){
   $sql = "SELECT * FROM schedule WHERE id = $idsche";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() == 1) {
     $schedule = $stmt->fetch();
     return $schedule;
   }else {
   	return 0;
   }
}

function findschedule($uname, $conn){
   $sql = "SELECT username FROM schedule
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);

   if ($stmt->rowCount() >= 1) {
     return 0;
   }else {
   	return 1;
   }
}

function getAllSchedules($conn){
  $sql = "SELECT * FROM schedule";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $schedules = $stmt->fetchAll();
    return $schedules;
  }else {
    return 0;
  }
}

function getScheduleFrom($conn,$idteach){
  $sql = "SELECT * FROM schedule WHERE TeacherId = $idteach";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $schedules = $stmt->fetchAll();
    return $schedules;
  }else {
    return 0;
  }
}