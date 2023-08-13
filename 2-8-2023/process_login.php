<?php
session_start();

$valid_username = "ali";
$valid_password = "123";

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['isLoggedIn'] = true;
    header('Location: home.php');
    exit();
} else {
    
}

?>