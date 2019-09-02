<!DOCTYPE html>
<html>
<body>
<center><h1>Project Monitoring System</h1><br>
<?php
$servername="localhost";
$username="root";
$password="";j
$dbname="project";
$user=$_POST['username'];
$pass=$_POST['password'];
$pro_num=$_POST['pro_num'];
$pro_name=$_POST['pro_name'];
$dept=$_POST['dept'];
$men_name=$_POST['men_name'];
$men_mail=$_POST['men_mail'];
$member1=$_POST['member1'];
$member2=$_POST['member2'];
$member3=$_POST['member3'];
$conn=new mysqli($servername,$username,$password,$dbname);
if(!$conn)
{
	die("Connection failed:". mysqli_connect_error());
}
$sql="INSERT INTO `signup` (`us_name`, `pass`, `p_no`, `p_name`, `dep`, `m_name`, `m_mail`, `m1`, `m2`, `m3`) VALUES ('$user', '$pass', '$pro_num', '$pro_name', '$dept', '$men_name', '$men_mail', '$member1', '$member2', '$member3')";
$sql1="INSERT INTO `display2` (`username`, `per`, `comm`,`r1`,`r2`,`r3`) VALUES ('$user', 0, 'null','null','null','null')";
if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1))
{
	echo "Your record has been inserted into database successfully";
	echo "<br>Thank you for registering in our website";
}
else
{
	echo "Error:" . mysqli_error($conn);
}
mysqli_close($conn);
?>
<form action="login.html"><br>
Move to login page<br>
<input type="submit" value="Submit">
</form>
</body></center>
</html>
