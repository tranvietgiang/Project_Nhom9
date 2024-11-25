<?php session_start() ?>

<?php
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    header("location: Login_users.php");
} else {
    header("location: index.php");
}


?>