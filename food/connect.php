<?php
    $firstName = $_POST['firstname'];
    $nickName = $_POST['nickname'];
    $email = $_POST['email'];
    $gender = $_POST['Gender']; 
    $dob = $_POST['dob'];
    $card = $_POST['card'];
    $cvv = $_POST['cvv'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'my_database');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("Insert into registration(firstname, nickname, email, gender, dob, card, cvv)
            values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssii", $firstName, $nickName, $email, $gender, $dob, $card, $cvv);
        $stmt->execute();
        echo "Registration Successfull...";
        $stmt->close();
        $conn->close();
    }
?>