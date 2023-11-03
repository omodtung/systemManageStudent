<?php 
 


// Load the database configuration file 
include_once '../../DB_connection.php'; 
 
// Include XLSX generator library 
require_once '../inc/PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "teachers-data_" . date('Y-m-d') . ".xlsx"; 
 
// Define column names 
 
if(isset($_GET["searched"]) && $_GET["searched"] != ""){
    $excelData[] = array('ID', 'magv', 'username', 'hoten','mamonhoc','makhoi','ngaysinh', 'gioitinh', 'diachi', 'STATUS'); 
    $sql = "SELECT * FROM teachers WHERE hoten LIKE '". $_GET['searched'] ."%' ORDER BY id ASC";
}
else if(isset($_GET["studentsearched"]) && $_GET["studentsearched"] != ""){
    $fileName = "students-data_" . date('Y-m-d') . ".xlsx"; 
    $excelData[] = array('id', 'username', 'mahs', 'makhoi','malop','hotenhs','hanhkiem','HocLuc','ngaysinh', 'gioitinh', 'diachi', 'STATUS'); 
    $sql = "SELECT * FROM students JOIN avgscore ON students.id = avgscore.student_id WHERE hotenhs LIKE '". $_GET['studentsearched'] ."%' ORDER BY id ASC";
}
else{
    $sql = "SELECT * FROM teachers ORDER BY id ASC"; 
}


$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0){ 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        if(isset($_GET["studentsearched"])) $lineData = array($row['id'], $row['username'], $row['mahs'], $row['makhoi'],$row['malop'],$row['hotenhs'],$row['hanhkiem'],$row['HocLuc'], $row['ngaysinh'], $row['gioitinh'], $row['diachi'], $status);  
        else $lineData = array($row['id'], $row['magv'], $row['username'], $row['hoten'],$row['mamonhoc'],$row['makhoi'], $row['ngaysinh'], $row['gioitinh'], $row['diachi'], $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>