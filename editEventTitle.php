<?php

require_once('connect.php');
$mysqli = new mysqli("localhost","root","root","calender");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	
	$strSQL = "SELECT * FROM account WHERE userLevel = 'admin' ";
	$objQuery = mysqli_query($bdd,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			$sql = "DELETE FROM events WHERE id = $id";
			$query = $bdd->prepare( $sql );
			if ($query == false) {
		 	print_r($bdd->errorInfo());
		 	die ('Erreur prepare');
			}
			$res = $query->execute();
			if ($res == false) {
		 	print_r($query->errorInfo());
			die ('Erreur execute');
	}		 
	else{
		echo '<script>alert("กรุณาติดต่อผู้ดูแลระบบ")window.location = "calendar.php";</script>';
		}
}
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	
	$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}


