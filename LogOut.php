<?php session_start() ?>

<?php

unset($_SESSION['username']);
header("location: index.php");
?>