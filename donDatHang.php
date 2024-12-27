<?php
session_start();
require "models/config.php";
require "models/Db.php";
require "models/product.php";
require "models/cart.php";
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



foreach ($sp as $value) {
    $cart->MyCartAddPay($value['name'], $value['image'], $id, $value['quantiy'], $value['price']);
}

// xóa item after payment
$cart->MyCartDeletePay($id);


$myCartUser = $cart->MyCartUser($id);
$myCartUserTotal = $cart->MyCartUserTotal($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            background-color: white;
            border-radius: 8px;
        }

        .cart-item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-details {
            flex: 1;
            padding-left: 20px;
        }

        .cart-details p {
            margin: 5px 0;
        }

        .total-section {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }

        .total-section p {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .checkout {
            text-align: center;
            margin-top: 20px;
        }

        .checkout button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout button:hover {
            background-color: #218838;
        }
    </style>
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
            <p>Loại hình thức thanh toán: tiền mặc</p>
            <p><strong>Total Quantity:</strong> <?php echo $myCartUserTotal[0]['soluong']; ?></p>
            <p><strong>Total Price:</strong>
                <?php echo number_format($myCartUserTotal[0]['totalPrice'], 0, ',', '.'); ?> VNĐ</p>
        </div>
    </div>
    <div><a href="User_ID.php">Quay ve</a></div>
</body>

</html>