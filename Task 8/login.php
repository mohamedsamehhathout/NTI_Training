<?php

include "navbar.php";

session_start();

require_once "connection/db.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt=$conn->prepare("SELECT * FROM users WHERE username=:username");

    $stmt->execute([
        ':username'=>$username
    ]);

    $user=$stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password,$user['password'])){

        $_SESSION['logged_in']=true;
        $_SESSION['user_id']=$user['id'];
        $_SESSION['username']=$user['username'];

        header("Location: profile.php");
        exit;

    }else{

        $error="Invalid Username or Password";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">

<div class="card shadow p-4" style="width:400px;">

<h2 class="text-center mb-4">
Login
</h2>

<?php if(isset($error)){ ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">

Username

</label>

<input
type="text"
class="form-control"
name="username"
required>

</div>

<div class="mb-3">

<label class="form-label">

Password

</label>

<input
type="password"
class="form-control"
name="password"
required>

</div>

<button class="btn btn-primary w-100">

Login

</button>

<div class="text-center mt-3">

<a href="register.php">

Create Account

</a>

</div>

</form>

</div>

</div>

</body>

</html>