<?php
include "config.php";
$id = $_GET['id'];
echo $id;
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute([
  ':id'=>$id
]);
$data = $stmt->fetchAll();
foreach($data as $row){

}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $has_password = password_hash($pass,PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("UPDATE users SET name =:name,email =:email,password=:password WHERE id =:id");
  $stmt->execute([
    ':name'=>$name,
    ':email'=>$email,
    ':password'=>$has_password,
    ':id'=>$id
  ]);
  echo "Update success";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="name" placeholder="enter your name" value="<?php echo $row['name']; ?>">
    <input type="email" name="email" placeholder="enter your name" value="<?php echo $row['email']; ?>">
    <input type="password" name="password" placeholder="enter your password" value="<?php echo $row['password']; ?>">
    <input type="submit" value="Update">
  </form>  
</body>
</html>