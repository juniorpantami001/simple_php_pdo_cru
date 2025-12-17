<?php
include 'config.php';
$id = $_GET['id'];

$stmt= $pdo->prepare("DELETE FROM users WHERE id=:id");
$stmt->execute([':id'=>$id]);
// echo "deleted the usre";
header('location:display.php');
?>