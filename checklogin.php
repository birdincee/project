<?php
    session_start();
    $mysqli = new mysqli("localhost","root","root","calender");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
    $txtUsername = mysqli_real_escape_string($mysqli,$_POST['txtUsername']);
    $txtPassword = mysqli_real_escape_string($mysqli,$_POST['txtPassword']);
    $strSQL = "SELECT * FROM account WHERE username = '".$txtUsername."' and passwords = '".$txtPassword."' ";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง!";
	}
	else
	{
			$_SESSION["id"] = $objResult["id"];
			$_SESSION["userlevel"] = $objResult["userlevel"];

			session_write_close();
			
			if($objResult["userlevel"] == "admin")
			{
				header("location:adminpage.php");
			}
			else
			{
				header("location:userpage.php");
			}
    }
    
	$mysqli -> close();
?>
