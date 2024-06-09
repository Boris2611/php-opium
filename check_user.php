<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    include 'conn.php';
 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");

    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);

    $query->execute();

    
    $result = $query->fetch(PDO::FETCH_ASSOC); 


    if (!$result) {
        header("Location:login.php?error=2");
        exit();
    } else {
        session_start();
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['is_admin'] = $result['is_admin'];


        if ($_SESSION['is_admin'] == 1) {
            header("Location:admin.php");
            exit();
        }else{
            header("Location:index.php");
            exit();
        }
        
    }
}