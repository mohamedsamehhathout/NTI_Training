<?php

session_start();

if(!isset($_SESSION['logged_in'])){

    header("Location: login.php");

    exit;

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include "navbar.php"; ?>

<div class="container mt-5">

<div class="card shadow p-5">

<h1>

Welcome

<?= $_SESSION['username']; ?>

</h1>

<p>

This is your profile page.

</p>

</div>

</div>

</body>

</html>