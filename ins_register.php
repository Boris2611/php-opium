<?php
include 'conn.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$is_admin = 0;

$sql = "INSERT INTO user (username, email, `password`, is_admin) 
        VALUES (:username, :email, :password, :is_admin)";

$stmt = $pdo->prepare($sql); 

$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':is_admin', $is_admin);

$stmt->execute();

header("Location:login.php?register=1");