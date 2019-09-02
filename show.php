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
	$user=$_POST['username'];
	$pass=$_POST['password'];
	if($user=='thee'&&$pass=='thee')
	{
		echo("<center><h1>Mentor Page</h1></center>");
		echo("<center><br><button onclick=\"location.href='menUpdate.html'\">Updation</button>");
		echo("<br><br><button onclick=\"location.href='review.html'\">Review</button>");
		echo("<br><br><button onclick=\"location.href='menDisplay.html'\">Display</button>");
		echo("<br><br><button onclick=\"location.href='summery.php'\">Summary</button></center>");
	}
	else
	{
		if(!empty($_POST['username'])&&!empty($_POST['password']))
		{
			$conn=new mysqli($servername,$username,$password,$dbname);
			if(!$conn)
			{	
				die("Connection failed:". mysqli_connect_error());
			}
			$sql="SELECT * FROM signup WHERE us_name='". $user ." ' and pass='" .$pass. " ' ";
			$sql1="SELECT * FROM display2 WHERE username='".$user ." ' ";
			$result=mysqli_query($conn,$sql);
			$result1=mysqli_query($conn,$sql1);
	 		$rowcount=mysqli_num_rows($result);
			$rowcount1=mysqli_num_rows($result1);
			if($rowcount!=0&&$rowcount1!=0)
			{
				echo("<center><h1>User Updation</h1></center>");
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
					while($row1=mysqli_fetch_assoc($result1))
					{
						$re1=$row1['r1'];
						$re2=$row1['r2'];
						$re3=$row1['r3'];
						echo("<center><br><b>Review 1:</b><br>");
						echo($re1);echo("<br>");
						echo("<br><b>Review 2:</b><br>");
						echo($re2);echo("<br>");
						echo("<br><b>Review 3:</b><br>");
						echo($re3);echo("<br></center>");	
					}
					echo("<center><form name=display method=post action=update.php><br><br><br>");
					echo("<fieldset>");
					echo("<legend>Update details</legend>");
					echo("Username:<input type=text name=username value=".$row['us_name'].">");
					echo("<br><br>Percentage Completed:<input type=number name=complete min=0 max=100> <br><br>");
					echo("Update in comments: <input type=text name=comment > <br> <br><br>");
					echo (" <input type=submit value='Submit' > ");
					echo("</ fieldset></center>");
					echo("</ form>");			
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
	}
?>
</body>
</html>