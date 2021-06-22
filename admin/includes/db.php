<?php
    $server = "127.0.0.1";
    $database = "dbms";
    $username = "root";
    $password = "";

    $conn = new mysqli($server,$username,$password,$database,3308);
    
    if($conn->connect_error){
        die("Connection not successful".$conn->connect_error);
    } 
?>