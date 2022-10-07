<?php    
    $host = "localhost";  
    $user = "laryyokkk";  
    $password = 'ulSmirnov2003';  
    $db_name = "webapp_training_ping_pong";  
      
    $connection_mysql = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: " . mysqli_connect_error());  
    }
?>  