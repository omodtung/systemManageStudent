<?php 
 
// Load the database configuration file 
include_once '../../DB_connection.php'; 
 
// Include XLSX generator library 
require_once '../inc/PhpXlsxGenerator.php'; 
 
// Excel file name for download 
$fileName = "teachers-data_" . date('Y-m-d') . ".xlsx"; 
 
// Define column names 
$excelData[] = array('ID', 'magv', 'username', 'hoten','mamonhoc','makhoi','ngaysinh', 'gioitinh', 'diachi', 'STATUS'); 
 
// Fetch records from database and store in an array 
$sql = "SELECT * FROM teachers ORDER BY id ASC"; 
$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0){ 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['magv'], $row['username'], $row['hoten'],$row['mamonhoc'],$row['makhoi'], $row['ngaysinh'], $row['gioitinh'], $row['diachi'], $status);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
 
?>