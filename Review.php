<?php
session_start();
?>
<!--  -->
<?php require "models/config.php";
require "models/db.php";
require "models/Users.php";
require "models/headerDB.php";
require "models/address.php";
?>
<!--  -->
<?php
$item_navbar = new navbar();
$getVND_1 = $item_navbar->GetVND_Navbar(1);
$getVND_2 = $item_navbar->GetVND_Navbar(2);
$getVND_3 = $item_navbar->GetVND_Navbar(3);
$getVND_4 = $item_navbar->GetVND_Navbar(4);
$getVND_5 = $item_navbar->GetVND_Navbar(5);

// get child VND
$getVND_child = $item_navbar->GetVND_Child();

// GetLi_thu4_child
$GetLi_thu4_child = $item_navbar->GetLi_thu4_child();

//get Navbar_2
$getAllNavbar2 = $item_navbar->GetNavbar2();

//get Navbar_2_child
$getAllNavbar2Child = $item_navbar->GetNavbar2Child();

//get navbar woman
$getAllWoman  = $item_navbar->GetAllWoman();
?>

<!-- check user login mới dc review -->
<?php
if (!isset($_SESSION['username']) && ($_SESSION['username']) == 0) {

    header("location: Login_users.php");
    return;
}

require "models/product.php";
?>
<!-- handle whe user để login -->
<?php

$name = new product;

if (isset($_GET['id'])) {
    $id_sp = $_GET['id'];
    $getNameSP = $name->GetNameSP($id_sp);
} else {
    echo "error!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />
<!-- link css -->
<link rel="stylesheet" href="public/css/style.css" />
<!-- link bootstrap 5 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
<!-- link icon -->
<script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
<!-- link font sale product -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Norican&display=swap" />

<body>
    <!--  -->
    <header>
        <section class="h_navbar">
            <ul class="navbar_item">
                <li id="li_first_1">
                    <a href="#">
                        <?php echo $getVND_1;
                        ?>
                        <i class="fa-solid fa-caret-down px-2"></i>
                    </a>
                    <ul>
                        <?php foreach ($getVND_child as $value): ?>
                        <li><a href="#"><?php echo $value['name_child'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li id="li_item2">
                    <a href="#"> <?php echo $getVND_2; ?><i class="fa-solid fa-caret-down px-2"></i></a>
                    <ul>
                        <li><a href="#">VietNamse</a></li>
                        <li><a href="#">Mĩ</a></li>
                    </ul>
                </li>
                <li id="">
                    <a href="#"><?php echo substr($getVND_3, 0, 19); ?>
                        <span style="font-weight: 500" class="text-danger"><?php echo substr($getVND_3, 19);  ?>
                        </span>
                    </a>
                </li>
                <li id="li-item4">
                    <a href=""><?php echo $getVND_4 ?></a>
                    <ul style="z-index: 999;" class="hover_item4">

                        <?php foreach ($GetLi_thu4_child as $value): ?>
                        <li>
                            <?php
                                $name = htmlspecialchars($value['name']); // Bảo mật đầu vào
                                if ($name === 'Log in'):
                                ?>
                            <a href="Login_users.php"><?php echo $name; ?></a>
                            <?php elseif ($name === 'my account'): ?>
                            <a href="User_ID.php"><?php echo $name; ?></a>
                            <?php elseif ($name === 'Log out'): ?>
                            <a id="exit" href="LogOut.php"><?php echo $name; ?></a>
                            <?php else: ?>
                            <a href="#"><?php echo $name; ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <!-- checkOut -->
                <li id="last-child">
                    <a href="#"><?php echo $getVND_5 ?></a>
                    <div>
                        <ul>
                            <li>
                                <div class="cart-info pt-5">
                                    <ul>
                                        <li class="row">
                                            <div class="cart-img col-5">
                                                <img src="https://htmldemo.net/james/james/img/cart/1.png" alt="" />
                                            </div>
                                            <div class="cart-details col-7">
                                                <a href="#">Fusce aliquam</a>
                                                <p>1 x $174.00</p>
                                                <!--  -->
                                                <a href="#">Thêm </a> -
                                                <a href="#">xóa</a>
                                            </div>
                                        </li>
                                        <li class="row pt-4">
                                            <div class="cart-img col-5">
                                                <img src="https://htmldemo.net/james/james/img/cart/2.png" alt="" />
                                            </div>
                                            <div class="cart-details col-7">
                                                <a href="#">Fusce aliquam</a>
                                                <p>1 x $777.00</p>
                                                <!--  -->
                                                <a href="#">Thêm</a> -
                                                <a href="#">xóa</a>
                                            </div>
                                        </li>
                                    </ul>
                            <li>
                                <div class="text-white pt-4">
                                    <span style=" border-bottom: 1px solid #e5e5e5;">Subtotal: <span> <span
                                                style="display: inline-block; margin-left: 150px;">$951.00</span><br>
                                            <a id="checkout" href="#" class="checkout ">checkout</a>
                                </div>
                            </li>
                    </div>
                </li>
            </ul>
            </div>
            </li>
            </ul>
        </section>
        <section style="background-color: #e5e5e5" class="h-navbar_2 text-white">
            <ul class="navbar_item_2">
                <li>
                    <a href="index.php">
                        <img style="background: white; margin-top: -79px"
                            src="https://htmldemo.net/james/james/img/logo.png" alt="" />
                    </a>
                </li>
                <li id="item_2_fl"><a href="#">HOME</a>
                    <ul>
                        <li><a href="#">Menu_1</a></li>
                        <li><a href="#">Menu_1</a></li>
                    </ul>
                </li>
                <li id="item_2_fl1"><a href="#">WOMEN</a>
                    <ul class="d-flex gap-4 ">
                        <?php foreach ($getAllWoman as $value): ?>
                        <li class="col-3"><a class="item_as"
                                href="#"><?php echo htmlspecialchars($value['name']) ?></a><br>
                            <div class="sub-menu">
                                <!-- Hiển thị các mục con nếu có -->
                                <?php
                                    if ($value['name_child']) {
                                        $children  = explode(", ", $value['name_child']);
                                        foreach ($children  as $child) {
                                            echo "<a href ='#'>" . htmlspecialchars(trim($child)) . "</a>" . "<br>";
                                        }
                                    }
                                    ?>
                            </div>
                        </li>
                        <li id="li_image1"><a href="#"><img src="<?php echo $value['image'] ?>" alt=""></a></li>
                        <?php endforeach ?>
                    </ul>

                </li>
                <!--  -->
                <?php foreach ($getAllNavbar2 as $value): ?>
                <li><a href="#"><?php echo $value['name'] ?></a></li>
                <?php endforeach ?>
                <li id="last-child2"><a href="#">PAGES</a>

                    <ul class="sub-menu  pages">
                        <?php foreach ($getAllNavbar2Child as $value): ?>
                        <li><a href="#"><?php echo $value['name'] ?></a></li>
                        <?php endforeach ?>
                    </ul>

                </li>
            </ul>
        </section>
    </header>

    <!-- Phần đánh giá -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- link bootstrap 5 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <!-- css -->
    <style>
    #review form input,
    textarea {
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
        border: 2px solid #dc3435;
        transition: border-color 0.3s ease;
    }

    #review form input:focus,
    textarea:focus {
        outline: none;
        border-color: green;
    }

    div#image_review {
        background-color: #fff;
    }

    #image_review {
        object-fit: cover;
        width: 400px;
        height: 400px;
        border-radius: 5px;
        border: 2px solid #dc3435;
    }

    section#review h1 {
        margin: 20px 0 100px 0;
    }

    #b_name {
        font-family: 'Courier New', Courier, monospace;
    }

    #review_sp {
        margin-top: 190px;
        margin-left: -150px;
    }

    textarea {
        width: 500px;
        height: 50px;
        resize: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    </style>

    <body>
        <section id="review">
            <h1 style="text-align: center;">Detail product</h1>
            <form action="" class="container" method="get">
                <div class="row">
                    <div class="col-6">
                        <img id="image_review" src="public/img/<?php echo $getNameSP['image'] ?>" alt="">
                    </div>
                    <div id="review_sp" class="col-5">
                        <h5><b style="text-transform: uppercase;" id="b_name"><?php echo $getNameSP['name'] ?></b></h5>
                        <br>
                        <textarea name="review" placeholder="Comment" id="" cols="50" rows="11"></textarea>
                        <button name="SendCommit" class="btn btn-danger">Send</button>
                    </div>
                </div>
            </form>
            <!-- Handle show Comment -->
            <?php


            ?>
        </section>

    </body>

    </html>
    <?php

    include "footer.php";
    ?>