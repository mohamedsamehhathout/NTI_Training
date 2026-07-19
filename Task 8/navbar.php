<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="profile.php">

Company

</a>

<div class="ms-auto">

<?php if(isset($_SESSION['logged_in'])){ ?>

<span class="text-white me-3">

Welcome,

<strong>

<?= $_SESSION['username']; ?>

</strong>

</span>

<a href="logout.php"

class="btn btn-danger">

Logout

</a>

<?php }else{ ?>

<a href="login.php"

class="btn btn-primary me-2">

Login

</a>

<a href="register.php"

class="btn btn-primary">

Register

</a>

<?php } ?>

</div>

</div>

</nav>