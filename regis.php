<?php 
session_start();
require_once "connect2.php";

// mysqli_real_escape_string parameter ตัวแรกให้ใส่ connection ของ db ซึ่งก็คือตัวแปร $bdd ที่ใช้ใน connect2
$txtUsername = mysqli_real_escape_string($bdd, $_POST['txtUsername']);
$txtPassword = mysqli_real_escape_string($bdd, $_POST['txtPassword']);
$txtfirstName = mysqli_real_escape_string($bdd, $_POST['txtfirstName']);
$txtlastname = mysqli_real_escape_string($bdd, $_POST['txtlastname']);
$txtphone = mysqli_real_escape_string($bdd, $_POST['txtphone']);

$sql = "SELECT * FROM account WHERE username = '$txtUsername' LIMIT 1";
$result = mysqli_query($bdd, $sql);
$user = mysqli_fetch_assoc($result);

if ($user) { // TRUE
    echo "<script>alert('".$user["username"]." already exists');</script>";
} else { // FALSE
        $sql = "INSERT INTO account (username, passwords, firstnames, lastnames, phone, userlevel) VALUE ('$txtUsername', '$txtPassword', '$txtfirstName', '$txtlastname','$txtphone','user')";
        $result = mysqli_query($bdd, $sql);
            if ($result) {
                    $_SESSION['msg'] = "Insert user successfully";
                    echo '<script>alert("Insert user successfully");window.location = "index.php";</script>';
                        } 
                            else {
                            // ข้อมูลไม่ถูกต้อง
                        $_SESSION['msg'] = "Something went wrong";
                        echo '<script>alert("Something went wrong");window.location = "index.php";</script>';
                                }
}

?>