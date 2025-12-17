<?php
include "config.php";

if($_SERVER['REQUEST_METHOD']==="POST"){
    // $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    // $hash_pass = password_hash($pass,PASSWORD_DEFAULT);
    // echo $name,$email,$hash_pass;
    $stmt_check = $pdo->prepare("SELECT * FROM users WHERE email =:email");
    $stmt_check->execute([':email'=>$email]);
    $user = $stmt_check->fetch();
    if($user && password_verify($pass,$user['password'])){
    //    echo 'login success';
    $_SESSION['email']= $user['email'];
    $_SESSION['name']=$user['name'];
    $_SESSION['id']=$user['id'];
    header("location:home.php");
    exit();
    }else{
    echo 'User not found';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Register</title>
    <style>
        .container{
            width: 50%;
            height: 50vh;
            background-color: #f1f1f1;
            margin: 50px auto;
        }
        .container form{
            width: 80%;
            height: 80%;
            margin: 10px auto;

        }
        input{
            width: 100%;
            height: 40px;
            border: 1px solid green;
            margin-top: 20px;
            outline: none;
            border-radius: 10px;
            text-transform: capitalize;
        }
        input::placeholder{
            color: black;
            margin-left: 20px;
        }
        input:last-child{
            background-color: green;
            text-transform: uppercase;
        }
        input:last-child:hover{
            opacity: 0.6;
        }
    </style>
</head>
<body>
   <div class="container">
     <h3>Register form </h3>
     <form action="#" method="POST">
        <input type="text" name="email" id="" placeholder="enter your email" required  inputmode="numeric" pattern="[0-9]"/>
        <input type="password" name="password" id="" placeholder="Enter your password" required>
        <input type="submit" value="Login">
     </form>
   </div>
</body>
</html>