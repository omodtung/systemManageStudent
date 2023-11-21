<?php
session_start();

require_once 'dompdf/autoload.inc.php';

include "../DB_connection.php";
include "data/student.php";
include "data/grade.php";

use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\FontMetrics;

if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
        $student_id = $_SESSION['student_id'];
        $student = getStudentById($student_id, $conn);

        $output = "
        <style>
            body { font-family: DejaVu Sans, sans-serif; }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>";

        if ($student != 0) {
            $output .= '
            <ul>
                <li>Mã Học Sinh: ' . $student['mahs'] . '</li>
                <li>Username: ' . $student['username'] . '</li>
                <li>Họ và tên: ' . $student['hotenhs'] . '</li>
                <li>Ngày sinh: ' . $student['ngaysinh'] . '</li>
                <li>Giới tính: ' . $student['gioitinh'] . '</li>
                <li>Địa Chỉ: ' . $student['diachi'] . '</li>
                <li>Khối: ' . $student['makhoi'] . '</li>
            </ul>
            <table>
                <tr>
                    <th>Học Kì</th>
                    <th>Toán</th>
                    <th>Vật Lý</th>
                    <th>Hóa Học</th>
                    <th>Ngữ Văn</th>
                    <th>Lịch Sử</th>
                    <th>Địa Lí</th>
                    <th>Tiếng Anh</th>
                    <th>GDCD</th>
                    <th>Công Nghệ</th>
                    <th>Tin Học</th>
                    <th>Thể Dục</th>
                    <th>Sinh Học</th>
                </tr>
                <tr>
                    <td>HK1</td>
                    <td>' . $student['Toan'] . '</td>
                    <td>' . $student['VatLy'] . '</td>
                    <td>' . $student['Hoa'] . '</td>
                    <td>' . $student['NguVan'] . '</td>
                    <td>' . $student['LichSu'] . '</td>
                    <td>' . $student['DiaLi'] . '</td>
                    <td>' . $student['TiengAnh'] . '</td>
                    <td>' . $student['GDCD'] . '</td>
                    <td>' . $student['CongNghe'] . '</td>
                    <td>' . $student['TinHoc'] . '</td>
                    <td>' . $student['TheDuc'] . '</td>
                    <td>' . $student['SinhHoc'] . '</td>
                </tr>
                <tr>
                    <td>HK2</td>
                    <td>' . $student['Toan2'] . '</td>
                    <td>' . $student['VatLy2'] . '</td>
                    <td>' . $student['Hoa2'] . '</td>
                    <td>' . $student['NguVan2'] . '</td>
                    <td>' . $student['LichSu2'] . '</td>
                    <td>' . $student['DiaLi2'] . '</td>
                    <td>' . $student['TiengAnh2'] . '</td>
                    <td>' . $student['GDCD2'] . '</td>
                    <td>' . $student['CongNghe2'] . '</td>
                    <td>' . $student['TinHoc2'] . '</td>
                    <td>' . $student['TheDuc2'] . '</td>
                    <td>' . $student['SinhHoc2'] . '</td>
                </tr>
            ';
        }
        $output .= '</table>';

        $options = new Options();
        $options->set('isPhpEnabled', 'true');
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($output);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $canvas = $dompdf->getCanvas();
        $fontMetrics = new FontMetrics($canvas, $options);
        $w = $canvas->get_width();
        $h = $canvas->get_height();
        $font = $fontMetrics->getFont('times');
        $text = "STUDENT";
        $txtHeight = $fontMetrics->getFontHeight($font, 75);
        $textWidth = $fontMetrics->getTextWidth($text, $font, 75);
        $canvas->set_opacity(.2);
        $x = (($w - $textWidth) / 2);
        $y = (($h - $txtHeight) / 2);
        $canvas->text($x, $y, $text, $font, 75);
        $dompdf->stream('document.pdf', array("Attachment" => 0));
    }
}
?>
