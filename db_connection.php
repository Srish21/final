<?php
 $dsn = 'mysql:host=sql2.njit.edu;dbname=ss3545';
 $username = 'ss3545';
 $password = 'fuselage0';
 try{
   $db = new PDO($dsn,$username,$password);
 }catch (PDOException $e){
   $error_message = $e->getMessage();
   echo $error_message;
   exit();
 }
?>
