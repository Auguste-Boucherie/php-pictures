<?php

	 error_reporting(E_ALL );
    
     session_start();
     $date = new DateTime();
   
    
     $host = 'localhost';
     $dbname = 'photo';
     $user = 'root';
     $passsword = 'root';

     try {
         $connexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $passsword);
     }catch(PDOException $e) {
         echo $e->getMessage();
     }

?>
