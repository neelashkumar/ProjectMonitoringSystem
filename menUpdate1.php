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
			$result=mysqli_query($conn,$sql);
	 		$rowcount=mysqli_num_rows($result);
			if($rowcount!=0)
			{
				echo("<center><h1>Updation Site</h1></center>");
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
					echo("<center><form name=details method=post action=menUpdate2.php><br><br><br>");
					echo("<fieldset>");
					echo("<legend>Project Details</legend>");
					echo("Username:<input type=text name=username value=".$_POST['name']."><br><br><br>");
					echo("Project Number:<input type=text name=pro_num value=".$row['p_no']."><br><br><br>");
					echo("Project Name:<input type=text name=pro_name value=".$row['p_name']."><br><br><br>");
					echo("Mentor Name:<input type=text name=men_name value=".$row['m_name']."><br><br><br>");
					echo("Mentor Mail-id:<input type=email name=men_mail value=".$row['m_mail']."><br><br><br>");
					echo("</fieldset>");
					echo("<fieldset>");
					echo("<legend>Team Members</legend>");
					echo("Member 1:<input type=text name=member1 value=".$row['m1']."><br><br><br>");
					echo("Member 2:<input type=text name=member2 value=".$row['m2']."><br><br><br>");
					echo("Member 3:<input type=text name=member3 value=".$row['m3']."><br><br><br>");
					echo("</fieldset>");
					echo("<input type=submit value=Submit>");
					echo("<input type=reset value=Reset>");
					echo("</form></center>");		
    				}  
			}
			else
			{
				echo("<center>");
				echo("Invalid User<br>");
 				echo("<button onclick=\"location.href='menupdate.html'\">Back to login page</button></center>");		
			}
	}
	else
	{
			echo("<center>");
			echo("Enter the Username <br>");
 			echo("<button onclick=\"location.href='menUpdate.html'\">Back to login page</button></center>");
	}
		