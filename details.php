<?php
require "models/config.php";
require "models/db.php";
require "models/product.php";
$product = new product;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
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
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="home"><a href="index.php">
                <h2>Home</h2>
            </a></div>
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
                        <a href="#"><i class="far fa-heart mx-2 icon"></i></a>
                        <a href="#"><i class="fas fa-sync mx-2 icon"></i></a>
                    </div>
                    <p>Size</p>
                    <?php
                        for ($i = 1; $i <= 10; $i++) {
                            $size = $i + 35;
                            echo "<i class='mx-2 icon'>$size</i>";
                        }
                        ?>
                    <div class="Qty-details mt-4">
                        Qty:
                        <button class="minus">-</button>
                        <input type="text" value="0" id="soluong">
                        <button class="plus">+</button>
                    </div>
                    Tổng giá: <input type="text" class="total mt-4" value="0" id="total-price" readonly>
                    <div class="addcart mt-4">
                        <!-- demo -->
                        <a href="guicartDemo.php?id=<?php echo $value['id'] ?>">
                            <p>ADD TO CART</p>
                        </a>
                        <!--  -->
                    </div>
                    <div class="rating mt-4">
                        <h5>Rate this product:</h5>
                        <span class="star" data-value="1"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="2"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="3"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="4"><i class="fas fa-star"></i></span>
                        <span class="star" data-value="5"><i class="fas fa-star"></i></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="outstanding-product mt-5">
            <h3><i class="fas fa-bars"></i> OUTSTANDING PRODUCTS</h3>
            <div class="product d-flex flex-wrap mt-4">
                <?php
                $sanphamtuongtu = $product->getsanphamtuongtu($value['catalogue']);
                foreach ($sanphamtuongtu as $value):
                ?>
                <div class="owl-item1 col-12 col-md-3 mb-4 mt-4">
                    <div class="noibat">
                        <a href="details.php?id=<?php echo $value['id'] ?>">
                            <img src="public/img/<?php echo $value['image'] ?>" class="img-fluid">
                            <p><?php echo $value['name'] ?></p>
                        </a>
                        <div class="price">
                            <b class="gia"><?php echo number_format($value['price'], 0, ',', '.') . ' VNĐ'; ?></b>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <a href="guicartDemo.php?id=<?php echo $value['id'] ?>"
                                class="btn btn-success btn-sm mr-2">ADD TO CART</a>
                            <div class="mx-2">
                                <a href="#"><i class="fas fa-search mx-1"></i></a>
                                <a href="#"><i class="far fa-heart mx-1"></i></a>
                                <a href="#"><i class="fas fa-sync mx-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
    const tru = document.querySelector(".minus");
    const soluong = document.querySelector("#soluong");
    const cong = document.querySelector(".plus");
    const total_price = document.querySelector('#total-price');
    const price_product = document.querySelector('.price');

    cong.addEventListener("click", () => {
        let curen = parseInt(soluong.value);
        soluong.value = curen + 1;
        updatetotalprice();
    });

    tru.addEventListener("click", () => {
        let curen = parseInt(soluong.value);
        if (curen > 0) {
            soluong.value = curen - 1;
        }
        updatetotalprice();
    });

    function updatetotalprice() {
        let soluong1 = parseInt(soluong.value);
        let gia = parseFloat(price_product.innerText.replace(' VNĐ', '').replace('.', '').replace(',',
            '.')); // Convert price
        let total = soluong1 * gia * 1000;
        total_price.value = total.toLocaleString('vi-VN') + ' VNĐ'; // Format total price
    }

    // Star rating script
    const stars = document.querySelectorAll('.star');
    stars.forEach(star => {
        star.addEventListener('click', () => {
            const ratingValue = star.getAttribute('data-value');
            stars.forEach(s => {
                s.classList.remove('fas');
                s.classList.add('far'); // Reset star to empty
            });
            for (let i = 0; i < ratingValue; i++) {
                stars[i].classList.remove('far');
                stars[i].classList.add('fas'); // Fill selected stars
            }
        });
    });
    </script>
</body>

</html>