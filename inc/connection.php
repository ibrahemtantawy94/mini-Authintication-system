<?php

//establishing connection
try{
//    $hostname = 'sql305.epizy.com';
//    $database = 'epiz_22461635_lrapp';
//    $user = 'epiz_22461635';
//    $pass = '1851994';

      $hostname = 'localhost';
      $database = 'lrapp';
      $user = 'root';
      $pass = '';

    $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$user , $pass, [
        PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
    catch(PDOException $e){
        die($e->getMessage());
    }
