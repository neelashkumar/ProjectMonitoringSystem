<!DOCTYPE html>
<html>
<head>
<title>Project Monitoring System</title>
</head>
<body>
<center><h1>Project Monitoring System</h1><br><h3>Summary</h3></center>
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if(!$conn)
	{	
		die("Connection failed:". mysqli_connect_error());
	}
	$sql="SELECT * FROM signup";
	$sql1="SELECT * FROM display2";
	$result=mysqli_query($conn,$sql);
	$result1=mysqli_query($conn,$sql1);
	 $rowcount=mysqli_num_rows($result);
	$rowcount1=mysqli_num_rows($result1);
	if($rowcount>0&&$rowcount1>0)
	{
		echo "<fieldset >
    		<legend >Project Details </legend>
		<table border='4' cellpadding='5' cellspacing='0'>
		<tr> <th> Project No</th>
		<th> Project Name</th>
		<th> Department</th>
		<th> Mentor</th>
		<th> M_Mail</th>
		<th> Member1</th>
		<th> Member2</th>
		<th> Member3</th>
		<th> % Completed</th>
		<th> Last Update</th>
		<th> Review1</th>
		<th> Review2</th>
		<th> Review3</th>
		</tr>";
		while(($row = mysqli_fetch_assoc($result)) && ($row1 = mysqli_fetch_assoc($result1)))
		 {
			echo "<tr>";
			echo "<td>".$row['p_no']."</td>";
			echo "<td>".$row['p_name']."</td>";
			echo "<td>".$row['dep']."</td>";
			echo "<td>".$row['m_name']."</td>";
			echo "<td>".$row['m_mail']."</td>";
			echo "<td>".$row['m1']."</td>";
			echo "<td>".$row['m2']."</td>";
			echo "<td>".$row['m3']."</td>";
			echo "<td>".$row1['per']."</td>";
			echo "<td>".$row1['comm']."</td>";
			echo "<td>".$row1['r1']."</td>";
			echo "<td>".$row1['r2']."</td>";
			echo "<td>".$row1['r3']."</td>";
			echo "</tr>";
		}
		echo " </table>
       		</fieldset>";
		echo("<br><br><center><button onclick=\"location.href='output.php'\">Print</button></center>");
	}
	else
	{ 
		echo "0 records";
	}
	$conn->close();	

	/*ob_start();
	$body = ob_get_clean();
	$body = iconv("UTF-8", "UTF-8//IGNORE", $body);
	include("mpdf/mpdf.php");
	$mpdf = new \mPDF('c', 'A4', '','',0,0,0,0,0,0);

	$mpdf->writeHTML($body);

	$mpdf->Output('demo.pdf', 'D');*/
		
?>
</body>
</html>	