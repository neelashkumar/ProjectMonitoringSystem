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
$pro_num=$_POST['pro_num'];
$pro_name=$_POST['pro_name'];
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
//$sql="UPDATE `display1` SET `per`=$comp,`comm`='$comm' WHERE `username`='$user'";
$sql="UPDATE `signup` SET `p_no`='$pro_num',`p_name`='$pro_name',`m_name`='$men_name',`m_mail`='$men_mail',`m1`='$member1',`m2`='$member2',`m3`='$member3' WHERE `us_name`='$user'";
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
