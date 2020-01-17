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

?>