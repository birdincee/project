<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="js/bootstrap.min.js" />

<body>

<nav class="navbar navbar-inverse">
<ul class="nav navbar-nav">
      <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="#">contact</a></li>
      <li><a href="job.php">Jobs</a></li>
      <?php
        session_start();
        require_once "connect2.php";
            if (isset($_SESSION["id"])) {
            $userid = $_SESSION["id"];

            $sql = "SELECT * FROM account WHERE id = '$userid' LIMIT 1";
            $result = mysqli_query($bdd, $sql);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
    ?>
        <li><a href="job.php"><span class="glyphicon glyphicon-user"></span> <?php  echo $user["username"]; ?></a></li> 
    <?php
            }
        }
        else {
            ?>
            <li><a href="login.php">เข้าสู่ระบบ</a></li>
            <?php
        }
      ?>
    
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
</ul>
</nav>

</body>
