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
$_SESSION['iduser'] = $getiduser['id'];

$getSL = isset($_GET['soLuongShoe']) ? $_GET['soLuongShoe'] : 0;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sp = $product->getproductbyid($id);


    foreach ($sp as $value) {
        $checkExited = $cart->checkProductInCart($_SESSION['iduser'], $id);
        if ($checkExited) {
            $cart->updateCart($value['price'], $_SESSION['iduser'], $id);
        } else {
            $addgiohang = $cart->addcartDemo($_SESSION['iduser'], $getSL, $value['name'], $value['price'], $value['image'], $id);
        }
    }
}

$tongtien = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Giao Diện Giỏ Hàng</title>
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
    <link rel="stylesheet" href="./Component/css/guiCartDemo.css">
</head>

<body>
    <div class="container mb-5 mt-3"><a href="index.php">HOME</a></div>
    <div class="container">
        <table class="table">
            <thead class="title ">
                <tr>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cartall = $cart->getallcart($_SESSION['iduser']);
                foreach ($cartall as $value):
                    $tongtien +=  $value['price'] * $value['quantiy'];
                ?>
                    <tr>
                        <td><img src="public/img/<?php echo $value['image'] ?>" width="180px" class="img-fluid"></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo number_format($value['price']) ?></td>
                        <td><?php echo $value['quantiy'] ?></td>
                        <td><?php echo number_format($value['price'] *  $value['quantiy']) ?> </td>
                        <td>
                            <a href="deletecart.php?id=<?php echo $value['id'] ?>" class="btn btn-dark text-white"
                                style="text-decoration: none;">XÓA</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="checkout ">
            <div class="d-flex justify-content-between">
                <span>TOTAL</span>
                <span class="total"><?php echo number_format($tongtien) ?> </span>
            </div>
            <form action="billConfirm.php" method="POST" id="checkoutForm">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['iduser']; ?>">
                <button type="submit" name="checkOut" class="btn btn-dark btn-checkout mt-3 exit">
                    PROCEED TO CHECK OUT
                </button>
            </form>
        </div>
    </div>

    <script>
        //in thông thông thoát
        const exitButtons = document.querySelectorAll('.exit');

        exitButtons.forEach(exit => {
            exit.addEventListener("click", (event) => {
                const userConfirmed = confirm("Are you sure you want to payment item?");
                if (!userConfirmed) {
                    event
                        .preventDefault(); // Ngừng hành động mặc định của thẻ a nếu người dùng không xác nhận
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2zB5jYFz7F5J2h+4+Mk1iD2f/csHk6K2x5a0eK0eN4q2gC1gM5k4Y8qI/1" crossorigin="anonymous">
    </script>
</body>

</html>