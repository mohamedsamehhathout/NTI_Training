<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    header("Location: profile.php");
} else {
    header("Location: login.php");
}
exit;
?>