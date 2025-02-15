<?php
session_start();
require "models/config.php";
require "models/Db.php";
require "models/product.php";
require "models/cart.php";
require "models/address.php";
$address = new Address;

$cart = new cart;
$product = new product;

if (!isset($_SESSION['username'])) {
    header("location:Login_users.php");
}


$iduser = $_SESSION['username'];

$getiduser = $product->GetIDuser($iduser);


$_SESSION['myCart'] = $getiduser['id'];

$id =  $_SESSION['myCart'];

$sp = $cart->PrintCart($id);

$payment = $_GET['payment'];

// add product when user had click payment!
// này là thêm phải không
foreach ($sp as $value) {
    $cart->MyCartAddPay($value['name'], $value['image'], $id, $value['quantiy'], $value['price']);
}

// xóa item after payment
$cart->MyCartDeletePay($id);


$myCartUser = $cart->MyCartUser($id);
$myCartUserTotal = $cart->MyCartUserTotal($id);

$checkDelivery = $cart->Delivery($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
    <link rel="stylesheet" href="./Component/css/dondathang.css">
</head>

<body>
    <div class="container">
        <?php foreach ($myCartUser as $value): ?>
            <div class="cart-item">
                <img src="public/img/<?php echo $value['image']; ?>" alt="Product Image">
                <div class="cart-details">
                    <p><strong>Product Name:</strong> <?php echo $value['name']; ?></p>
                    <p><strong>Price:</strong> <?php echo number_format($value['totalPrice'], 0, ',', '.'); ?> VNĐ</p>
                    <p><strong>Quantity:</strong> <?php echo $value['totalSL']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="total-section">
            <p>Loại hình thức thanh toán: <?php echo $payment ?></p>
            <p><strong>Total Quantity:</strong> <?php echo $myCartUserTotal[0]['soluong']; ?></p>
            <p><strong>Total Price:</strong>
                <?php echo number_format($myCartUserTotal[0]['totalPrice'], 0, ',', '.'); ?> VNĐ</p>
        </div>
        <div class="email text-center">
            <span>Gửi hóa đơn về email!</span>
        </div>
    </div>
    <div><a href="User_ID.php">Quay ve</a></div>
</body>

</html>