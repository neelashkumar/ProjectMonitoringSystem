<!DOCTYPE html>
<html>
<head>
<title>Project Monitoring System</title>
</head>
<body>
<center><h1>Project Monitoring System</h1></center>
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="project";
	$user=$_POST['name'];
	if(!empty($_POST['name']))
		{
			$conn=new mysqli($servername,$username,$password,$dbname);
			if(!$conn)
			{	
				die("Connection failed:". mysqli_connect_error());
			}
			$sql="SELECT * FROM signup WHERE us_name='". $user ." ' ";
			$sql1="SELECT * FROM display2 WHERE username='".$user ." ' ";
			$result=mysqli_query($conn,$sql);
			$result1=mysqli_query($conn,$sql1);
	 		$rowcount=mysqli_num_rows($result);
			$rowcount1=mysqli_num_rows($result1);
			if($rowcount!=0&&$rowcount!=0)
			{
				echo("<center><h1>Review</h1></center>");
				while($row=mysqli_fetch_assoc($result))  
   				 {  
					$proj_num=$row['p_no'];
					$proj_name=$row['p_name'];
					$deptment=$row['dep'];
					$mentor_name=$row['m_name'];
					$mentor_mail=$row['m_mail'];
					$mem1=$row['m1'];
					$mem2=$row['m2'];
					$mem3=$row['m3'];
					echo("<center><b>Project Number:</b>");
					echo($proj_num);echo("<br><br>");
					echo("<b>Project Name:</b>");
					echo($proj_name);echo("<br><br>");
					echo("<b>Department:</b>");
					echo($deptment);echo("<br><br>");
					echo("<b>Mentor Name:</b>");
					echo($mentor_name);echo("<br><br>");
					echo("<b>Mentor Mail-id:</b>");
					echo($mentor_mail);echo("<br><br>");
					echo("<b>Member 1:</b>");
					echo($mem1);echo("<br><br>");
					echo("<b>Member 2:</b>");
					echo($mem2);echo("<br><br>");
					echo("<b>Member 3:</b>");
					echo($mem3);echo("<br> </center>");		
    				}  
				while($row1=mysqli_fetch_assoc($result1))
				{
					$user=$row1['username'];
					$perc=$row1['per'];
					$commt=$row1['comm'];
					$re1=$row1['r1'];
					$re2=$row1['r2'];
					$re3=$row1['r3'];
					echo("<center><br><b>Percentage Completed:</b>");
					echo($perc);echo("<br> ");	
					echo("<br><b>Last Update:</b>");
					echo($commt);echo("<br></center>");
					//echo("<textarea name=co rows=3 cols=30 value=".$commt."></textarea><br></center>");
					echo("<center><br><br><br>");
					echo("<fieldset>");
					echo("<legend>Reviews</legend>");
					if($re1=='null'||$re1=='')
					{
						echo("<form name=review1 method=post action=updateReview1.php><br><br><br>");
						echo("<br>Username:<input type=text name=username value=".$row1['username']."><br><br>");
						echo("Review1<br><br><textarea name=r1 rows=3 cols=30 ></textarea><br><br><br>");
						echo (" <input type=submit value='Submit' > ");
						echo("</ form>");
					}
					else
					{
						echo("<br><b>Review 1:</b><br>");
						echo($re1);echo("<br>");
					}
					if($re2=='null'||$re2=='')
					{
						echo("<form name=review2 method=post action=updateReview2.php><br><br><br>");
						echo("<br>Username:<input type=text name=username value=".$row1['username']."><br><br>");
						echo("Review2<br><br><textarea name=r2 rows=3 cols=30 ></textarea><br><br><br>");
						echo (" <input type=submit value='Submit' > ");
						echo("</ form>");
					}
					else
					{
						echo("<br><b>Review 2:</b><br>");
						echo($re2);echo("<br>");
					}
					if($re3=='null'||$re3=='')
					{
						echo("<form name=review2 method=post action=updateReview3.php><br><br><br>");
						echo("<br>Username:<input type=text name=username value=".$row1['username']."><br><br>");
						echo("Review3<br><br><textarea name=r3 rows=3 cols=30 ></textarea><br><br><br>");
						echo (" <input type=submit value='Submit' > ");
						echo("</ form>");
					}
					else
					{
						echo("<br><b>Review 3:</b><br>");
						echo($re3);echo("<br>");
					}
					echo("</ fieldset></center>");		
				}
			}
			else
			{
				echo("<center>");
				echo("Invalid User<br>");
 				echo("<button onclick=\"location.href='login.html'\">Back to login page</button></center>");		
			}	
		}
		else
		{
			echo("<center>");
			echo("Enter the Username and Password<br>");
 			echo("<button onclick=\"location.href='login.html'\">Back to login page</button></center>");
		}