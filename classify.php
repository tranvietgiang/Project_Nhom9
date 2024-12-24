<?php
require "models/config.php";
require "models/db.php";
require "models/categaryCa.php";
require "models/product.php";

$categary = new categary;
$product = new product;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/stylecontent.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
</head>
<style>
    .product-actions {
        margin-top: 10px;
    }

    .product-actions a {
        margin: 0 10px;
        display: flex;
        align-items: center;
    }

    .product-actions i {
        font-size: 16px;
    }

    .product-card {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 15px;
        text-align: center;
        transition: box-shadow 0.3s;
    }

    .product-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .product-image {
        width: 100%;
        /* Đặt kích thước ảnh bằng 100% chiều rộng của thẻ cha */
        height: 200px;
        /* Đặt chiều cao cố định */
        object-fit: cover;
        /* Đảm bảo ảnh không bị biến dạng, giữ tỷ lệ */
    }

    .price {
        margin-top: 10px;
    }

    .rating {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 5px;
    }

    .rating i {
        margin: 0 2px;
        font-size: 16px;
    }

    .owl-item1 {
        width: 243px;
    }

    .phantrang a {
        background-color: #FFD700;
        color: black;
        margin: 0 5px;
    }

    .badge-dark {
        background-color: #343a40;
        /* Màu nền tối */
        color: white;
        /* Màu chữ trắng */
    }
</style>

<body>

    <content>
        <div class="container">
            <div class="BESTSELLER">
                <div class="col-lg-3 col-3">
                    <div class="danhmuc">
                        <h2>
                            BEST SELLER<br>
                            <strong>PRODUCTS</strong>
                        </h2>
                    </div>

                    <div class="menu-title">
                        <ul class="side-menu">
                            <li class="presentation check"><a href="index.php">HOME</a></li>
                            <?php
                            $cate = $categary->getallcategary();
                            foreach ($cate as $value) :
                            ?>
                                <li class="presentation"><a
                                        href="classify.php?id=<?php echo $value['id']; ?>"><?php echo $value['categary']; ?></a>
                                </li>
                            <?php endforeach; ?>
                            <li><img src="https://htmldemo.net/james/james/img/banner/banner-5.jpg" class="img-fluid"
                                    alt="Banner"></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-12 mt-4">
                    <div class="productsale">
                        <div class="listpro d-flex flex-wrap">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $productprice = $product->getsanphamtheodanhmuc($id);
                                $count = 4;
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $total = count($productprice);
                                $url  = $_SERVER['PHP_SELF'] . "?id=" . $id;
                                $seach = $product->getsanphamphantrang($id, $page, $count);
                            }
                            foreach ($seach as $value):


                            ?>
                                <div class="owl-item1 col-6 col-md-4 col-lg-3 mb-4">
                                    <div class="product-card">
                                        <a href="details.php?id=<?php echo $value['id']; ?>">
                                            <img src="public/img/<?php echo $value['image']; ?>"
                                                class="img-fluid product-image" alt="<?php echo $value['name']; ?>">
                                            <p><?php echo $value['name']; ?></p>
                                        </a>
                                        <div class="price">
                                            <b
                                                class="gia"><?php echo number_format($value['price'], 0, ',', '.') . ' VNĐ'; ?></b>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-4">
                                            <div>
                                                <a href="#" class="add-to-cart"><b>ADD TO CART</b></a>
                                            </div>
                                            <div>
                                                <div class="product-actions d-flex justify-content-center">
                                                    <a href="#"><i class="fas fa-search"></i></a>
                                                    <a href="#"><i class="far fa-heart"></i></a>
                                                    <a href="#"><i class="fas fa-sync"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="phantrang">
                                <?php echo $product->phantrang($url, $total, $page, $count, 1) ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </content>

    <script src="public/js/javascript.js"></script>
</body>

</html>