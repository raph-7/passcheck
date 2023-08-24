<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password_1 = $_POST['password_1'];

//Database connection
$conn = new mysqli('localhost','root','','passcheck1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into user_info(name, email, password_1)
    values(?, ?, ?)");
    $stmt->bind_param("sss",$name, $email, $password_1);
    $stmt->execute();
    echo "Successful";
    $stmt->close();
    header("Location: pass1.php");

    $sql = "SELECT * FROM user_info WHERE username='$name' AND password='$password_1'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1)

    {
        echo "Login Successful!";
        header("Location: pass1.php");
    }
    
    $conn->close();
}
?>