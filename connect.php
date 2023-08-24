<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password_1 = $_POST['password_1'];
$password_2 = $_POST['password_2'];

//Database connection
$conn = new mysqli('localhost','root','','passcheck1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into user_info(name, email, password_1, password_2)
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$name, $email, $password_1, $password_2);
    $stmt->execute();
    echo "Successful";
    $stmt->close();
    header("Location: pass1.php");
    
    $conn->close();
}
?>