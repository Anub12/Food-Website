<?php
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'my_database');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("Insert into login(email, password)
            values(?,?)");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        echo "Registration Successfull...";
        $stmt->close();
        $conn->close();
    }
?>