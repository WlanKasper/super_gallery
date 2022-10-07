<?php      
    include('connection.php');  

    $_firstname = $_POST['_firstname'];  
    $_lastname = $_POST['_lastname'];  
    $_phone = $_POST['_phone'];  
      
    $_firstname = stripcslashes(strtolower($_firstname));  
    $_lastname = stripcslashes(strtolower($_lastname));  
    $_phone = stripcslashes(strtolower($_phone));  
    $_firstname = mysqli_real_escape_string($connection_mysql, $_firstname);  
    $_lastname = mysqli_real_escape_string($connection_mysql, $_lastname);  
    $_phone = mysqli_real_escape_string($connection_mysql, $_phone);  
    
    $sql = "INSERT INTO `login`(`firstname`, `lastname`, `phone`, `isAdmin`) VALUES ('$_firstname', '$_lastname', '$_phone', '0')";  
    $result = mysqli_query($connection_mysql, $sql);  

    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection_mysql);
        mysqli_close($connection_mysql);
    }

    $sql = "select id_user from login where firstname = '$_firstname' and lastname = '$_lastname' and phone = '$_phone'";
    $result = mysqli_query($connection_mysql, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
        
    if ($count == 1) {  
        header("Location: ../pages/main.php?id=".$row['id_user']);
    } else {  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }
    mysqli_close($connection_mysql);
?> 