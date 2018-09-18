<?php

session_start();
require_once '../inc/connection.php' ;

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    if(isset($_POST['current_password'] , $_POST['current_password'] ,$_POST['password_confirm'] ) && !empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['password_confirm'])){
        if(strlen($_POST['current_password']) >= 6 && strlen($_POST['current_password']) <= 32){
            if(strlen($_POST['new_password']) >= 6 && strlen($_POST['new_password']) <= 32){
                if($_POST['new_password'] === $_POST['password_confirm'] ){

                    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
                    $stmt->execute([
                        ':username' =>$_SESSION['username'],
                        ':email' =>$_SESSION['email']
                    ]);
                    if($stmt->rowCount()){
                        foreach ($stmt -> fetchAll() as $value){

                            if(password_verify($_POST['current_password'],$value['password'])){
                                $stmt = $pdo ->prepare('UPDATE users SET password = :password WHERE username = :username OR email = :email');
                                $stmt->execute([
                                    ':password' => password_hash($_POST['new_password'] , PASSWORD_DEFAULT),
                                    ':username'  =>$value['username'],
                                    ':email'     =>$value['email']
                                ]);
                                if($stmt->rowCount()){
                                    echo "password has changed <br>";

                                    echo"<a href='../views/navbar.php'>Go to main page</a>";

                                }else{echo "nothing changed ";}

                            }else{echo "password isn't correct";}

                       }

                   }else{echo "You have an error and the sql statement didn't execute";}
                }else{echo 'passwords does\'t; match ' ;}
            }else{
                    echo ' The password is less than 6 please chose another one ' ;
            }

        }else{
            echo 'password is weak';
        }

    }else{
        echo 'please fill up your form';
    }
}else{
    die('you have to login');
     }


