<?php
$bdd=mysqli_connect("localhost","root","root","calender");
// Check connection
if (mysqli_connect_errno())
{
echo "ไม่สามารถเชื่อมต่อกับฐานข้อมูล MySQL ได้: " . mysqli_connect_error();
}
?>