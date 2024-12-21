<?php session_start();
require "models/config.php";
require "models/Db.php";
require "models/cart.php";
$cart = new cart;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $xoa = $cart->remove($id);
  header("location:guicart.php");
}
