<?php
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";
$pro = new Admin;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $pro->delete($id);
    header("location:quanlisanpham.php");
}
