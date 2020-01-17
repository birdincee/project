<?php 
session_start();
require_once "connect2.php";

$txtUsername = mysqli_real_escape_string($_POST['txtUsername']);
$txtPassword = mysqli_real_escape_string($_POST['txtPassword']);
$txtfirstName = mysqli_real_escape_string($_POST['txtfirstName']);
$txtlastname = mysqli_real_escape_string($_POST['txtlastname']);
$txtphone = mysqli_real_escape_string($_POST['txtphone']);

$user_check = "SELECT * FROM account WHERE username = '$txtUsername' LIMIT 1";
$resultuser = mysqli_query($bdd, $user_check);
$user = mysqli_fetch_assoc($resultuser);
if ($user['username'] === $txtUsername) {
    echo "<script>alert('Username already exists');</script>";
} else {
        $sql = "INSERT INTO account (username, passwords, firstnames, lastnames, phone, userlevel) VALUE ('$txtUsername', '$txtPassword', '$txtfirstName', '$txtlastname','$txtphone','user')";
        $result = mysqli_query($bdd, $sql);
            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                    echo '  <meta http-equiv="refresh" content="0;url=index.php"> ';
                        } 
                            else {
                            // ข้อมูลไม่ถูกต้อง
                        $_SESSION['error'] = "Something went wrong";
                        echo "Fail";
                                }
}

//if(!$param1 = ((isset($Post["txtUsername"]) && trim($_Post["txtUsername"]) != "")? trim($_Post["txtUsername"]) : null )){
// การตั้งเงื่อนไขแบบบรรทัดเดียว => (เงื่อนไข) ? (หากจริงจะคืนค่านี้) ? (หากเท็จจะคืนค่านี้)
// ส่วน if(!$param1 = ...) เป็นการกำหนดค่าให้ param1 ถ้าเป็น null จะเข้าเงื่อนไข ถ้าไม่จะแทนค่าใน param1
//echo "No parameter : param1";
//die();
//}
//if(!$param2 = ((isset($Post["txtPassword"]) && trim($_Post["txtPassword"]) != "")? trim($_Post["txtPassword"]) : null )){
    //echo "No parameter : param2";
//die();
//}
//if(!$param3 = ((isset($_Post["txtfirstName"]) && trim($_Post["txtfirstName"]) != "")? trim($_Post["txtfirstName"]) : null )){
    //echo "No parameter : param3";
//die();
//}
//if(!$param4 = ((isset($_Post["txtlastname"]) && trim($_Post["txtlastname"]) != "")? trim($_Post["txtlastname"]) : null )){
    //echo "No parameter : param4";
//die();
//}
//if(!$param5 = ((isset($_Post["txtphone"]) && trim($_Post["txtphone"]) != "")? trim($_Post["txtphone"]) : null )){
    //echo "No parameter : param5";
//die();
//}
//ถ้าข้อมูลครบ
//บันทึกลงฐานข้อมูล







?>