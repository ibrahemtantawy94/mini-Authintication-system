<?php
require_once "../views/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {

            background-color: #ddd;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            background-color: #f3f3f3;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            position: relative;
            font: 15px 'Segoe UI',Arial,sans-serif;
            background-color: #EAEBE5;
            height: auto;
            padding: 10px;
            color:#7e8c8d;
            outline:none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        /*___________________________________*/
        .container {
            border-top: 2px solid #aaa;
            box-shadow:  0 2px 10px rgba(0,0,0,0.8);
            width:288px;
            height:321px;
            margin:0 auto;
            position:relative;
            z-index:1;

            -moz-perspective: 800px;
            -webkit-perspective: 800px;
            perspective: 800px;
        }

        .container form {
            width:100%;
            height:100%;
            position:absolute;
            top:0;
            left:0;

            /* Enabling 3d space for the transforms */
            -moz-transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;

            /* When the forms are flipped, they will be hidden */
            -moz-backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;

            /* Enabling a smooth animated transition */
            -moz-transition:0.8s;
            -webkit-transition:0.8s;
            transition:0.8s;

        }


        .form-signin {
            z-index:100;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="container" id="formContainer">

            <form class="form-signin" action='../control/change_password.php' method="POST">
                <h3 class="form-signin-heading">Change Password</h3>
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" required autofocus>
                <br/>
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required="">
                <br>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" required="">
                <br>
                <button class="btn btn-lg btn-primary btn-block" id = "submit" name ="submit" type ="submit">Change Password</button>
            </form>

        </div> <!-- /container -->
    </div>
</div>
</body>
</html>
