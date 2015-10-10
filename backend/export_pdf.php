<?php 
include("../config/connect_mysql.php");
require_once("html2pdf/setPDF.php"); // ไฟล์สำหรับกำหนดรายละเอียด pdf

// เพิ่มหน้าใน PDF   
$pdf->AddPage();  

$htmlcontent='<p>ทดสอบ</p>';  
$htmlcontent=stripslashes($htmlcontent);  
$htmlcontent=AdjustHTML($htmlcontent);  

// สร้างเนื้อหาจาก  HTML code  
$pdf->writeHTML($htmlcontent, true, 0, true, 0);  

// เลื่อน pointer ไปหน้าสุดท้าย  
$pdf->lastPage();  
  
// ปิดและสร้างเอกสาร PDF  

header('Content-Type: application/pdf');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=".$pdf->Output('test.pdf', 'I'));
readfile($pdf->Output('test.pdf', 'I'));

?>