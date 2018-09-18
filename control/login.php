<?php

session_start();

require_once '../inc/connection.php';
if(isset($_POST['username'],$_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(preg_match('/^[a-zA-Z0-9-_. @]*$/i',$username)){
        if(strlen($password)>=6 && strlen($password)<=32){
            $stmt=$pdo->prepare('SELECT * FROM `users` WHERE (`username` = :username OR `email`= :email) AND `activated` = 1');
            $stmt->execute([':username' => $username , ':email' => $username ]);
                if($stmt->rowCount()){
                   foreach ($stmt->fetchAll() as $value){
                       if(password_verify($password , $value['password'])){

                           header("location:../views/navbar.php");

                           $_SESSION['loggedin'] = true;
                           $_SESSION['username'] = $value['username'];
                           $_SESSION['email']    = $value['email'];
                           $_SESSION['id']       = $value['id'];

                           $stmt = $pdo->prepare('UPDATE users SET last_login = :last_login WHERE username =:username OR email = :email');
                           $stmt->execute([
                               ':last_login' => date('Y-m-d H:i'),
                               ':username'   => $value['username'], //$_SESSION['username'] or $_POST['username']
                               ':email'      => $value['email']
                           ]);

                       }else{
                           echo "username/E-mail or Password isn't correct :D <br>";
                           echo"<strong><a href='../views/login.php'>back to login</a></strong>";
                       }
                   }
                        }else{
                            echo "Username or email  not found<br>";
                            echo"<strong><a href='../views/login.php'>back to login</a></strong>";
                        }
        }else{
            echo "You Provided an invalid Password<br>" ;
            echo"<strong><a href='../views/login.php'>back to login</a></strong>";
        }

    }else{
        echo "You Provided an invalid Username or email<br>" ;
        echo"<strong><a href='../views/login.php'>back to login</a></strong>";
    }
}
