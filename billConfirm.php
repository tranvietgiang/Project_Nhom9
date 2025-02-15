<?php
session_start();
require "models/config.php";
require "models/db.php";
require "models/address.php";
require "models/cart.php";
require "models/product.php";

$cart = new Cart;
$address = new Address;
$product = new Product;

$iduser = $_SESSION['username'];
$getiduser = $product->GetIDuser($iduser);
$_SESSION['iduser'] = $getiduser['id'];

$getTTND = $address->GetTTND();
$sdt = $getTTND[0]['sdtUser'];
$encryption = preg_replace('/(\d{2})\d+(\d{2})/', '$1******$2', $sdt);

$cartall = $cart->getallcart($_SESSION['iduser']);
$tongPhu = 0;

if (isset($_POST['checkOut']))

    //check user đã có địa chỉ nhận hàng chưa
    $checkAddress = $address->CheckAddress();

if (!$checkAddress) {
    header("location: phuongthucpay.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng Quan Đơn Hàng</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Component/css/billConfirm.css">
</head>

<body>

    <h1>Tổng Quan Đơn Hàng</h1>
    <span id="a">Thông tin đơn của bạn sẽ được bảo mật và mã hóa</span>

    <ion-icon name="location-outline"></ion-icon>
    <span class="nameUser"><?php echo $getTTND[0]['nameOrder']; ?>
        <b style="margin-left: 10px;">(84+) <?php echo $encryption; ?></b>
    </span>
    <br>
    <div>
        <span><?php echo $getTTND[0]['diaChiCuThe']; ?></span><br>
        <span><?php echo $getTTND[0]['wards']; ?></span>,
        <span><?php echo $getTTND[0]['district']; ?></span>,
        <span><?php echo $getTTND[0]['province']; ?></span>
    </div>

    <!-- Danh sách sản phẩm trong giỏ hàng -->
    <div>
        <?php foreach ($cartall as $value): ?>
            <div class="row">
                <div class="col-2">
                    <img src="public/img/<?php echo $value['image']; ?>" alt="" width="200" height="200">
                </div>
                <div class="col-6">
                    <b><?php echo $value['name']; ?></b><br>
                    <span>Size: <?php // echo $_SESSION['size'];  
                                ?></span><br>
                    <span>Số lượng: <?php echo $value['quantiy'] ?></span><br>
                    <b>Tổng Giá: <?php
                                    $tongPhu +=  $value['price'] * $value['quantiy'];
                                    echo number_format($value['price'] * $value['quantiy']) ?></b>

                    <b></b>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Phần giao hàng -->
    <div class="delivery-box">
        <b>Ngày giao dự kiến: 22-2-2025</b>
        <br>Vận Chuyển Tiêu Chuẩn
    </div>

    <!-- Phương thức thanh toán -->
    <div class="payment-method">
        <h4>Tóm tắt đơn hàng</h4>
        <span>Tổng phụ: <?php echo number_format($tongPhu); ?> VND</span><br>
        <span>Vận chuyển: Miễn phí</span><br>
        <span>Chiết khấu: <span style="color: red;">0</span></span>
    </div>

    <?php

    // check user can choose phương thức thanh toán chưa
    ?>
    <!-- Chọn phương thức thanh toán -->
    <form action="donDatHang.php" method="get">
        <div>
            <h4>Chọn phương thức thanh toán</h4>
            <label for="">
                <img id="pttt" src="public/img/cod.jpg" alt="Thanh toán khi nhận hàng">
                <span style="margin: 0 20px 0 0;">Thanh toán khi nhận hàng</span>
                <input type="radio" value="Thanh toán khi nhận hàng" name="payment">

            </label><br>
            <label>
                <img id="pttt" src="public/img/momo.png" alt="Momo">
                <span style="margin: 0 161px 0 0;">MoMo</span>
                <input type="radio" name="payment" value="MoMo">
            </label><br>
            <label>
                <img id="pttt" src="public/img/zaloPay.png" alt="ZaloPay">
                <span style="margin: 0 142px 0 0;">ZaLoPay</span>
                <input type="radio" name="payment" value="ZaLoPay">
            </label>
        </div>

        <p>Bằng cách đặt đơn hàng, bạn đồng ý với điều khoản sử dụng và bán hàng của <b>Shoe Giang</b>
            và xác nhận rằng bạn đã đọc <b>Chính sách quyền riêng tư của Shoe Giang</b>.</p>

        <button id="checkOutID" type="submit" name="checkOut" class="btn btn-dark btn-checkout mt-3 exit">
            PROCEED TO CHECK OUT
        </button>
    </form>

    <script>
        const checkPTTT = document.getElementById("checkOutID");
        checkPTTT.addEventListener("click", (event) => {
            const emptyInput = document.querySelector('input[name="payment"]:checked');
            if (!emptyInput) {
                alert("Vui lòng chọn phương thức thanh toán!");
                event.preventDefault();
            }
        })
    </script>

</body>

</html>