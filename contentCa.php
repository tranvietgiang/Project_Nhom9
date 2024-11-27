<?php
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
</head>

<body>
    <style>
        body p {
            color: #000;
            font-weight: bold;
        }

        body a:hover p {
            color: #dc3545;
        }
    </style>
    <content>
        <div class="container">
            <div class="BESTSELLER ">
                <div class="col-lg-3 col-3">
                    <div class="danhmuc">
                        <h2>
                            BEST SELLER<br>
                            <strong> PRODUCTS </strong>
                        </h2>
                    </div>

                    <div class="menu-title">
                        <ul class="side-menu">
                            <li class="presentation check"><a href>WOMEN</a></li>
                            <?php
                            $cate = $categary->getallcategary();
                            foreach ($cate as $value) :
                            ?>
                                <li class="presentation"><a href><?php echo $value['categary'] ?></a></li>
                            <?php endforeach ?>
                            <li> <img src="https://htmldemo.net/james/james/img/banner/banner-5.jpg" width="100%"
                                    height="300"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-12 mt-4">
                    <div class="row mx-5">

                        <div class="produst">

                            <div class="list-img">

                                <?php
                                $productsp = $product->getallproduct();
                                foreach ($productsp as $key => $value):
                                ?>
                                    <div class="owl-item ">

                                        <div>
                                            <a href>
                                                <img src="public/img/<?php echo $value['image'] ?>" width="255"
                                                    height="255">
                                                <p><?php echo $value['name'] ?></p>
                                            </a>
                                            <div></div>
                                            <div class="price">
                                                <div class="odn col-lg-4">
                                                    <b class="gia "><?php echo $value['price'] ?></b>
                                                </div>
                                                <div class="col-lg-12 col-12 mx-5 rating ">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-4 ">
                                                <div class=" col-5">
                                                    <a href class><b class>ADD TO
                                                            CART</b> </a>
                                                </div>
                                                <div>
                                                    <div class="mx-3 col-lg-12 col-12">
                                                        <a href><i class="fas fa-search mx-3"></i></a>
                                                        <a href> <i class="far fa-heart mx-2"></i></a>
                                                        <a href><i class="fas fa-sync mx-3"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        ?>
                                        <div class="mt-5">
                                            <a href>
                                                <img src="public/img/<?php echo $value['image'] ?>" width="255"
                                                    height="255">
                                                <p><?php echo $value['name'] ?></p>
                                            </a>
                                            <div></div>
                                            <div class="price">
                                                <div class="odn col-lg-4">
                                                    <b class="gia "><?php echo $value['price'] ?></b>
                                                </div>
                                                <div class="col-lg-12 col-12 mx-5 rating ">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-4 ">
                                                <div class=" col-5">
                                                    <a href class><b class>ADD TO
                                                            CART</b> </a>
                                                </div>
                                                <div>
                                                    <div class="mx-3 col-lg-12 col-12">
                                                        <a href><i class="fas fa-search mx-3"></i></a>
                                                        <a href> <i class="far fa-heart mx-2"></i></a>
                                                        <a href><i class="fas fa-sync mx-3"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php endforeach ?>


                            </div>
                            <div class="btn">
                                <button class="btn-leght"><i class="fas fa-angle-left"></i></button>
                                <button class="btn-right"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prosale">
                <div class="container mt-5 ">
                    <div class="FEATURED d-flex">
                        <div class="col-lg-11">
                            <h3 class=""><i class="fas fa-bars"></i> FEATURED PRODUCTS</h3>
                        </div>
                        <div class="btn1 text-end">
                            <button class="btn-leght1"><i class="fas fa-angle-left"></i></button>
                            <button class="btn-right1 mx-3"><i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                    <div class="productsale ">

                        <div class="listpro d-flex">
                            <?php $productprice = $product->getpricebig();
                            foreach ($productprice as $key => $value):
                            ?>
                                <div class="owl-item1 ">
                                    <div>
                                        <a href>
                                            <img src="public/img/<?php echo $value['image'] ?>" width="255" height="255">
                                            <p><?php echo $value['name'] ?></p>
                                        </a>
                                        <div></div>
                                        <div class="price">
                                            <div class="odn ">
                                                <b class="gia "><?php echo $value['price'] ?></b>
                                            </div>
                                            <div class="col-lg-12 col-12 mx-5 rating ">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-4 ">
                                            <div class=" ">
                                                <a href class><b class>ADD TO
                                                        CART</b> </a>
                                            </div>
                                            <div>
                                                <div class="mx-3  col-12">
                                                    <a href><i class="fas fa-search mx-3"></i></a>
                                                    <a href> <i class="far fa-heart mx-2"></i></a>
                                                    <a href><i class="fas fa-sync mx-3"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner mt-5 ">
            <div>
                <div>
                    <img src="https://htmldemo.net/james/james/img/banner/banner-bg.jpg" width="100%" height="500">

                </div>
                <div class="container online    ">
                    <a href=""><img src="https://htmldemo.net/james/james/img/banner/banner-10.jpg"></a>
                </div>
            </div>
        </div>

        <div class="end">
            <div class="prosale1 ">
                <div class="container mt-5 ">
                    <div class="FEATURED d-flex">
                        <div class="col-lg-11">
                            <h3 class=""><i class="fas fa-bars"></i> NEWS PRODUCTS</h3>
                        </div>
                        <div class="btn1 text-end">
                            <button class="btn-leght2"><i class="fas fa-angle-left"></i></button>
                            <button class="btn-right2 mx-3"><i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                    <div class="productsale ">

                        <div class="listpro1 d-flex">

                            <?php $productnew = $product->getallproduct();
                            foreach ($productnew as $key => $value):
                            ?>
                                <div class="owl-item2 ">
                                    <div>
                                        <a href>
                                            <img src="public/img/<?php echo $value['image'] ?>" width="255" height="255">
                                            <p><?php echo $value['name'] ?></p>
                                        </a>
                                        <div></div>
                                        <div class="price">
                                            <div class="odn ">
                                                <b class="gia ">$<?php echo $value['price'] ?></b>
                                            </div>
                                            <div class="col-lg-12 col-12 mx-5 rating ">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-4 ">
                                            <div class=" ">
                                                <a href class><b class>ADD TO
                                                        CART</b> </a>
                                            </div>
                                            <div>
                                                <div class="mx-3  col-12">
                                                    <a href><i class="fas fa-search mx-3"></i></a>
                                                    <a href> <i class="far fa-heart mx-2"></i></a>
                                                    <a href><i class="fas fa-sync mx-3"></i></a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="Review.php?id=<?php echo $value['id'] ?>">detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>


                            <div class="owl-item2 ">
                                <div>
                                    <a href>
                                        <img src="	https://htmldemo.net/james/james/img/product/18.png" width="255"
                                            height="255">
                                        <p>FUSCE ALIQUAM</p>
                                    </a>
                                    <div></div>
                                    <div class="price">
                                        <div class="odn ">
                                            <b class="gia ">$170.00</b>
                                        </div>
                                        <div class="col-lg-12 col-12 mx-5 rating ">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4 ">
                                        <div class=" ">
                                            <a href class><b class>ADD TO
                                                    CART</b> </a>
                                        </div>
                                        <div>
                                            <div class="mx-3  col-12">
                                                <a href><i class="fas fa-search mx-3"></i></a>
                                                <a href> <i class="far fa-heart mx-2"></i></a>
                                                <a href><i class="fas fa-sync mx-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item2 ">
                                <div>
                                    <a href>
                                        <img src="	https://htmldemo.net/james/james/img/product/2.png" width="255"
                                            height="255">
                                        <p>FUSCE ALIQUAM</p>
                                    </a>
                                    <div></div>
                                    <div class="price">
                                        <div class="odn ">
                                            <b class="gia ">$170.00</b>
                                        </div>
                                        <div class="col-lg-12 col-12 mx-5 rating ">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4 ">
                                        <div class=" ">
                                            <a href class><b class>ADD TO
                                                    CART</b> </a>
                                        </div>
                                        <div>
                                            <div class="mx-3  col-12">
                                                <a href><i class="fas fa-search mx-3"></i></a>
                                                <a href> <i class="far fa-heart mx-2"></i></a>
                                                <a href><i class="fas fa-sync mx-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item2 ">
                                <div>
                                    <a href>
                                        <img src="	https://htmldemo.net/james/james/img/product/20.png" width="255"
                                            height="255">
                                        <p>FUSCE ALIQUAM</p>
                                    </a>
                                    <div></div>
                                    <div class="price">
                                        <div class="odn ">
                                            <b class="gia ">$170.00</b>
                                        </div>
                                        <div class="col-lg-12 col-12 mx-5 rating ">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4 ">
                                        <div class=" ">
                                            <a href class><b class>ADD TO
                                                    CART</b> </a>
                                        </div>
                                        <div>
                                            <div class="mx-3  col-12">
                                                <a href><i class="fas fa-search mx-3"></i></a>
                                                <a href> <i class="far fa-heart mx-2"></i></a>
                                                <a href><i class="fas fa-sync mx-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item1">
                                <div>
                                    <a href>
                                        <img src="	https://htmldemo.net/james/james/img/product/21.png" width="255"
                                            height="255">
                                        <p>FUSCE ALIQUAM</p>
                                    </a>
                                    <div></div>
                                    <div class="price">
                                        <div class="odn ">
                                            <b class="gia ">$170.00</b>
                                        </div>
                                        <div class="col-lg-12 col-12 mx-5 rating ">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4 ">
                                        <div class=" ">
                                            <a href class><b class>ADD TO
                                                    CART</b> </a>
                                        </div>
                                        <div>
                                            <div class="mx-3  col-12">
                                                <a href><i class="fas fa-search mx-3"></i></a>
                                                <a href> <i class="far fa-heart mx-2"></i></a>
                                                <a href><i class="fas fa-sync mx-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="owl-item2 ">
                                <div>
                                    <a href>
                                        <img src="	https://htmldemo.net/james/james/img/product/22.png" width="255"
                                            height="255">
                                        <p>FUSCE ALIQUAM</p>
                                    </a>
                                    <div></div>
                                    <div class="price">
                                        <div class="odn ">
                                            <b class="gia ">$170.00</b>
                                        </div>
                                        <div class="col-lg-12 col-12 mx-5 rating ">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4 ">
                                        <div class=" ">
                                            <a href class><b class>ADD TO
                                                    CART</b> </a>
                                        </div>
                                        <div>
                                            <div class="mx-3  col-12">
                                                <a href><i class="fas fa-search mx-3"></i></a>
                                                <a href> <i class="far fa-heart mx-2"></i></a>
                                                <a href><i class="fas fa-sync mx-3"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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