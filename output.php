<?php 
/*include 'MPDF57/mpdf.php';
ob_start();  // start output buffering
include 'summery.php';
$content = ob_get_clean(); // get content of the buffer and clean the buffer
$mpdf = new mPDF(); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($content);
$mpdf->Output('summery.pdf'); // output as inline content*/
	ob_start();
	$body = ob_get_clean();
	$body = iconv("UTF-8", "UTF-8//IGNORE", $body);
	include("mpdf/mpdf.php");
	$mpdf = new \mPDF('c', 'A4', '','',0,0,0,0,0,0);

	$mpdf->writeHTML($body);

	$mpdf->Output('summery.pdf', 'D');
?>