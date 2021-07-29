<?php
//Development connection
 //$host="127.0.0.1";
 //$db="attandance";
 //$user="root";
 //$pass="";
 //$charset="utf8mb4";

  //Remote Database Connection
 $host="remotemysql.com";
 $db="T1mI7G4qEd";
 $user="T1mI7G4qEd";
 $pass="r2g0GlwcxS";
 $charset="utf8mb4";
 $dsn="mysql:host=$host;dbname=$db;charset=$charset";
 
 try{
    $pdo=new PDO($dsn,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e){
    // echo "<h1 class='text-danger'>No dataBase Found</h1>";
     throw new PDOException($e->getMessage());
 }
 require_once "crud.php";
 require_once "user.php";
 $crud=new crud($pdo);
 $user=new user($pdo);
 $user->insertUser("admin","password");
?>