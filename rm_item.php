<?php
    include 'conn.php';
    include 'session_checker.php';

    $item_id = $_GET['item_id'];
    
    $sql = "DELETE FROM item WHERE ID = :item_id";
    
    $stmt = $pdo->prepare($sql); 
    $stmt->bindParam(':item_id', $item_id);
    $stmt->execute();
    
    header("Location: admin.php");
?>
