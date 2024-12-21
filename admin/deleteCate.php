<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

if (!isset($_SESSION['admin']) && ($_SESSION['admin']) == 0) {

    header("location: loginAdmin.php");
    return;
}

$addSP = new Admin;

?>
<?php
if (isset($_GET['idCate'])) {

    $name = $_GET['idCate'];

    $addSP->DeleteCate($name);
    header("location: categories.php");
}