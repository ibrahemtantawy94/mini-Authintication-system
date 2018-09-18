<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location:../views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Welcome <?php echo $_SESSION['username'] ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../views/navbar.php">Login_Register</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Welcome
                    <strong>  <?php echo $_SESSION['username'] ?> </strong>
                    <b class='caret'></b></a>
                <ul class="dropdown-menu">
                    <li><a href='../views/create.php'>Creat Post</a></li>
                    <li><a href='../views/posts.php'>View Posts</a></li>
                    <li class="divider"></li>
                    <li><a href='../views/change_email.php'>Change You E-mail</a></li>
                    <li><a href='../views/change_password.php'>Change Your password</a></li>
                    <li class="divider"></li>
                    <li><a href='../control/logout.php'>Logout</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<script type="text/javascript">

</script>
</body>
</html>
