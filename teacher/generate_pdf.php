<?php
include "../DB_connection.php";
require __DIR__ . '/../vendor/autoload.php';

$teacherinfo = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['teacher_id'])) {
    $teacherid = $_POST['teacher_id'];
    $sql = "SELECT * FROM teachers WHERE teachers.magv = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$teacherid]);
    $teacherinfo = $stmt->fetch(PDO::FETCH_ASSOC);
}

$html = "
<h2>" . ($teacherinfo['hoten'] ?? '') . "</h2>
<p><strong>Mã Giáo Viên:</strong> " . ($teacherinfo['magv'] ?? '') . "</p>
<p><strong>Môn Học:</strong> " . ($teacherinfo['mamonhoc'] ?? '') . "</p>
<p><strong>Ngày Sinh:</strong> " . ($teacherinfo['ngaysinh'] ?? '') . "</p>
<p><strong>Giới Tính:</strong> " . ($teacherinfo['gioitinh'] == 'M' ? 'Nam' : 'Nữ') . "</p>
<p><strong>Địa Chỉ:</strong> " . ($teacherinfo['diachi'] ?? '') . "</p>
<!-- Add any other fields you want to display here -->
";

// The rest of your code remains unchanged.
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('teacher_cv.pdf', 'I'); // This will output the PDF in-browser

?>
