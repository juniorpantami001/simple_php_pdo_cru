<?php
include "config.php";
if(!isset($_SESSION['email'])){
    header('location:index.php');
    exit();
}
$stmt = $pdo->prepare("SELECT * FROM users WHERE email =:email");
$stmt->execute([
    ':email'=>$_SESSION['email']
]);
$data = $stmt->fetchAll();
foreach($data as $result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>Welcome back <?php echo $result['name']; ?></p>
    <a href="update.php?id=<?php echo $_SESSION['id']; ?>">udate your detail</a>
    <a href="logout.php">logout</a>
</body>
</html>