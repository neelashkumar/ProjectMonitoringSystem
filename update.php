<!DOCTYPE html>
<html>
<body>
<center><h1>Project Monitoring System</h1><br>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="project";
$user=$_POST['username'];
$comp=$_POST['complete'];
$comm=$_POST['comment'];
$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
	die("Connection failed:". mysqli_connect_error());
}
$sql="UPDATE `display2` SET `per`=$comp,`comm`='$comm' WHERE `username`='$user'";
if(mysqli_query($conn,$sql))
{
	echo "Your record has been updated into database successfully";
}
else
{
	echo "Error:" . mysqli_error($conn);
}
mysqli_close($conn);
echo("<br><br><button onclick=\"location.href='login.html'\">Logout</button></center>");
?>
</body></center>
</html>
