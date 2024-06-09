<?php 
    include 'conn.php';
    include 'session_checker.php';

    $user_id = $_SESSION['user_id'];
    $cart_id = $_GET['cart_id'];
    
    $sql = "DELETE FROM cart WHERE :cart_id = cart_id ";
    
    $stmt = $pdo->prepare($sql); 
    $stmt->bindParam(':cart_id',$cart_id);
    $stmt->execute();
    
    header("Location:cart.php");