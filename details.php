<?php

session_start();

require "models/config.php";
require "models/db.php";
require "models/product.php";
$product = new product;


//handle check 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body a {
            text-decoration: none;
            color: black;
        }

        .icon {
            border: 1px solid #28a745;
            border-radius: 5px;
            padding: 10px;
            color: #28a745;
            transition: background 0.3s;
        }

        .icon:hover {
            background-color: #e2f0e2;
        }

        .Qty-details button,
        .Qty-details input {
            padding: 5px 10px;
            width: 40px;
        }

        .Qty-details input {
            margin: 0 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .addcart p {
            padding: 10px;
            border: 1px solid #28a745;
            text-align: center;
            transition: background-color 0.3s, color 0.4s;
        }

        .addcart p:hover {
            color: white;
            background-color: #28a745;
        }

        .info,
        .imagedetails {
            padding: 40px;
        }

        .rating {
            margin-left: 0;
            cursor: pointer;
        }

        .rating i {
            color: #FFD700;
            /* Gold color for stars */
        }

        .product img {
            height: 200px;
            object-fit: cover;
        }

        #a,
        #b,
        #c,
        #d {
            cursor: pointer;
        }

        .chooseSize {
            background-color: #28a745;
            color: #000;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <style>
        #cart {
            cursor: pointer;
            transition: color 0.25s linear;
            /* margin: 0 0 0px 1000px; */

        }

        #cart:hover {
            color: #FFD700;
        }
    </style>

    <div class="container mt-5">
        <h1 class="d-flex justify-content-center">Detail Shoe</h1>
        <div class="d-flex justify-content-between ">
            <div class="home"><a href="index.php">
                    <span class="fs-4 text-primary">Home</span>
                </a>
            </div>
            <!-- Css my cart -->
            <div>
                <span><i id="cart" class="fa-solid fa-cart-shopping"></i></span>
            </div>
        </div>
        <div class="chiitiet">
            <div class="row">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $chitiet = $product->getproductbyid($id);
                foreach ($chitiet as $value):
                ?>
                    <div class="imagedetails mb-3 col-12 col-md-6">
                        <img src="public/img/<?php echo $value['image'] ?>" class="img-fluid">
                    </div>
                    <div class="info col-12 col-md-6 mt-5">
                        <h3><?php echo $value['name'] ?></h3>
                        <h4 class="price"><?php echo number_format($value['price'], 0, ',', '.') . ' VNĐ'; ?></h4>
                        <p><?php echo $value['detail'] ?></p>
                        <div>
                            <a id="heartLink" href="#" onclick="updateLink()">
                                <i class="far fa-heart mx-2 icon"></i>
                            </a>
                        </div>
                        <p>Size</p>
                        <form action="guicartDemo.php" method="get">
                            <label class="chooseSize" for="a">39
                                <input id="a" value="39" type="radio" name="sizeShoe">
                            </label>
                            <label class="chooseSize" for="b">40
                                <input id="b" value="40" type="radio" name="sizeShoe">
                            </label>
                            <label class="chooseSize" for="c">41
                                <input id="c" value="41" type="radio" name="sizeShoe">
                            </label>
                            <label class="chooseSize" for="d">42
                                <input id="d" value="42" type="radio" name="sizeShoe">
                            </label><br>

                            <div>
                                <label for="sl">Số Lượng:
                                    <input id="sl" name="soLuongShoe" type="number" min="1" value="1">
                                </label><br>
                                <b id="tongGia"> Tong gia:
                                    <?php echo $value['price'] ?> </b>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                            <button id="checkAdd" type="submit">🛒 ADD TO CART</button>
                        </form>
                    </div>
                <?php endforeach; ?>
                <?php

                $_SESSION['tongGia'] = number_format($value['price'], 0, ',', '.');

                if (isset($_GET['sizeShoe'])) {
                    $_SESSION['size'] = $_GET['sizeShoe'];
                }


                ?>
            </div>
        </div>


        <script>
            const heartLink = document.getElementById("heartLink");
            const checkAdd = document.querySelector("#checkAdd");

            checkAdd.addEventListener("click", (event) => {
                const selectedSize = document.querySelector('input[name="sizeShoe"]:checked');

                if (!selectedSize) {
                    alert("Vui lòng chọn size shoe!");
                    event.preventDefault();

                }
            });

            // handle total price
            const sl = document.getElementById("sl");
            const tongGia = document.getElementById("tongGia");
            const giaGoc = <?php echo $value['price']; ?>; // Giá gốc từ PHP

            sl.addEventListener("input", () => { // Sự kiện input để cập nhật ngay lập tức
                let soLuong = parseInt(sl.value) || 1; // Đảm bảo số lượng hợp lệ
                let tongTien = soLuong * giaGoc;
                tongGia.innerHTML = `Tổng giá: ${tongTien}`; // Hiển thị giá đã format
            });

            function updateLink() {
                const image = "<?php echo urlencode($value['image']) ?>";
                const name = "<?php echo urlencode($value['name']) ?>";
                const selectedSize = document.querySelector('input[name="sizeShoe"]:checked')?.value
                const sl = document.getElementById('sl')?.value;

                if (!selectedSize) {
                    alert('Vui lòng chọn size!');
                    return;
                }

                if (!sl || sl <= 0) {
                    alert('Vui lòng nhập số lượng hợp lệ!');
                    return;
                }

                const heartLink = document.getElementById('heartLink');
                heartLink.href = `listHeart.php?image=${image}&name=${name}&sizeShoe=${selectedSize}&soLuongShoe=${sl}`;
                heartLink.click();
            }
        </script>
</body>

</html>