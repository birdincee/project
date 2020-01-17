<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="js/bootstrap.min.js" />

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">PARKINGSINGHA</a>  <!-- ส่วนหัว -->
    </div>
    <ul class="nav navbar-nav"> <!-- nav left -->
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="https://www.facebook.com/profile.php?id=100023236341473"><span class="glyphicon glyphicon-phone-alt"></span> contact</a></li>
        <li><a href="calendar.php"><span class="glyphicon glyphicon-calendar"></span> Jobs</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right"> <!-- nav right -->
        <?php
        session_start();
        require_once "connect2.php";    // เชื่อมต่อฐานข้อมูล
        if (isset($_SESSION["id"])) :   // Set Id
        ?>

        <?php 
            $userid = $_SESSION["id"];
            $sql = "SELECT * FROM account WHERE id = '$userid' LIMIT 1";    // หา id ของ User
            $result = mysqli_query($bdd, $sql);
            $user = mysqli_fetch_assoc($result);
        ?>


        <?php if($user) : ?>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php  echo $user["firstnames"]; // Show ชื่อ ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php endif;?>

        <?php else:?>
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

        <?php endif;?>
    </ul>
  </div>
</nav>

</body>
