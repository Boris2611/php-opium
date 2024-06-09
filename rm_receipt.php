<?php
    include 'conn.php';
    include 'session_checker.php';

    $user_id = $_SESSION['user_id'];
    
    $sql = "DELETE FROM cart WHERE cart.user_id = :user_id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->execute();
    
    header("Location:index.php");