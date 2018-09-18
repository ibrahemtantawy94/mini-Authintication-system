<?php
// بنستدعى صفحة ال connection الى فيها الاتصال بالداتابيز
require_once '../inc/connection.php' ;
session_start();
if(isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['password_confirm'])){
    $username = $_POST['username']; //اليوزر نيم الى اليوزر هايدخله فى الفورم
    $password = $_POST['password'];//الباسورد الى اليوزر هايدخله فى الفورم
    $email    = $_POST['email'];//الايميل الى اليوزر هايدخله فى الفورم
    $password_confirm = $_POST['password_confirm'];

    if(preg_match('/^[a-zA-Z0-9-_. ]*$/i',$username)){
        if(strlen($password)>=6 && strlen($password)<=32){
            if($password_confirm === $password){
                if(filter_var($email , FILTER_VALIDATE_EMAIL)){

                   $stmt=$pdo->prepare('SELECT * FROM users WHERE username = :username');
                   $stmt->execute([
                       ':username' => $username
                   ]);
                   if($stmt->rowCount()){
                       die("The username You have entered is already exists");
                   }else{
                       $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
                       $stmt->execute([
                           ':email' => $email
                       ]);
                       if($stmt->rowCount()){
                           die('Your email is Already exists');
                       }else{
                           $stmt = $pdo->prepare('INSERT INTO users (`username`,`password`,`email`) VALUES (:username,:password,:email)');
                           $stmt->execute([
                               /* => */// هنا بنساوى ال Placeholder ب ال Input الى اليوزر بيدخله وعشان هنا associative array فا بنساوى ب
                               ':username' => $username,
                               ':password' =>password_hash( $password ,PASSWORD_DEFAULT),
                               ':email'    => $email

                           ]);
                           if($stmt->rowCount()){
                               echo "Thanks For Registering , Please activate your account" ;
                               echo "<a href='../views/login.php'>Clic here to login</a>";
                           }
                       }
                   }

                }else{

                    echo "You Provided an invalid email" ;
                }
            }else{
                echo "Password Confimation dosen't match" ;
            }
        }else{
            echo "You Provided an invalid Password" ;
        }

    }else{
        echo "You Provided an invalid Username" ;
    }
}