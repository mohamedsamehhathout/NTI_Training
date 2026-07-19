<?php

session_start();

if (isset($_SESSION['logged_in'])) {
    header("Location: welcome.php");
    exit;
}

require_once "connection/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");

    $stmt->execute([
        ':username' => $username
    ]);

    if ($stmt->fetch()) {

        $error = "Username already exists.";

    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users(username,password)
                                VALUES(:username,:password)");

        $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword
        ]);

        header("Location: login.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow p-4" style="width:400px;">

        <h2 class="text-center mb-4">Register</h2>

        <?php if(isset($error)){ ?>

            <div class="alert alert-danger">
                <?= $error; ?>
            </div>

        <?php } ?>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">Username</label>

                <input
                    type="text"
                    class="form-control"
                    name="username"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">Password</label>

                <input
                    type="password"
                    class="form-control"
                    name="password"
                    required>

            </div>

            <button class="btn btn-primary w-100">
                Register
            </button>

        </form>

    </div>

</div>

</body>
</html>