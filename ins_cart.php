<?php  
include 'conn.php';
include 'session_checker.php';

// Ensure item_id is set and not empty
if(isset($_GET['item_id']) && !empty($_GET['item_id'])) {
    $user_id = $_SESSION['user_id'];
    $item_id = $_GET['item_id'];
    
    // Check if the user exists
    $userCheckSql = "SELECT * FROM user WHERE user_id = :user_id";
    $userCheckStmt = $pdo->prepare($userCheckSql);
    $userCheckStmt->bindParam(':user_id', $user_id);
    $userCheckStmt->execute();
    $user = $userCheckStmt->fetch();
    
    if($user) {
        // If the user exists, insert into cart table
        $sql = "INSERT INTO cart (user_id, item_id) 
                VALUES (:user_id, :item_id)";
        
        $stmt = $pdo->prepare($sql); 
        
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':item_id', $item_id);
        
        $stmt->execute();
        
        header("Location:index.php");
    } else {
        // Redirect if user does not exist
        header("Location:index.php");
        exit(); // Ensure script stops execution
    }
} else {
    // Redirect if item_id is not provided
    header("Location:index.php");
    exit(); // Ensure script stops execution
}
?>
