<?php
session_start();
?>
<!--  -->
<?php require "models/config.php";
require "models/db.php";
require "models/Users.php";
require "models/headerDB.php";
require "models/address.php";
require "models/review.php";
require "models/product.php";
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


?>
<!-- handle whe user để login -->
<?php

$name = new product;
$showSP = $name->GetShowReview();


if (isset($_GET['id'])) {
    $id_sp = $_GET['id'];
    $getNameSP = $name->GetNameSP($id_sp);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="Website icon" type="jpg" href="../public/img/logoShoes.jpg">
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
<link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">

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

    <style>
    .comments-container {
        border: 1px solid #dc3435;
        border-radius: 8px;
        background-color: #f9f9f9;
        max-height: 200px;
        overflow-y: auto;
    }

    /* Bình luận đơn lẻ */
    .comment {
        border-bottom: 1px solid #e0e0e0;
        padding: 10px 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    /* Header của bình luận */
    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Tên người dùng */
    .comment-user {
        font-weight: bold;
        color: #dc3435;
        font-size: 1.1rem;
        text-transform: capitalize;
    }

    /* Nội dung bình luận */
    .comment-content {
        color: #333;
        font-size: 1rem;
        line-height: 1.5;
    }

    .comment:hover {
        background-color: #ffecec;
        border-radius: 4px;
    }

    .comment:not(:last-child) {
        margin-bottom: 15px;
    }

    .comment {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .comment:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #star-only {
        cursor: pointer;
    }
    </style>

    <?php

    $nameUser = $_SESSION['username'];



    $reviews = new review;
    $getIDuserComment = new Users_shoes;


    // Get Avatar

    $email_id = isset($_SESSION['userEmail']) ? $_SESSION['userEmail'] : "";
    $getImg = $getIDuserComment->GetAvatar($email_id);



    $print = array();


    // lưu comment


    if (isset($_GET['sendCommit'])) {

        // $comment = $_GET['review'];
        $star = isset($_GET['select']) ? trim($_GET['select']) : "";
        $review = isset($_GET['review']) ? trim($_GET['review']) : "";

        $flag = false;

        if (empty($review) || empty($star)) {
            $flag = true;
        }

        if (!$flag) {
            $review_user = $reviews->Comment($nameUser, $review, $id_sp, $star);
        }



        $userComment = $reviews->PrintComment($id_sp);
        $print = $userComment;

        if (!empty($print)) {

            echo "
            
            <style>
            #click-review{
                margin-top: -150px !important;
            }
            </style>
            
            ";
        }
    }

    $tempRaTing = $reviews->GetStarByid($id_sp);

    if (!empty($tempRaTing)) {
        $raTing =  $tempRaTing[0]['totalRatings'];
        $countReview =  $tempRaTing[0]['countReviews'];

        if ($countReview > 0) {
            $totalStar = round($raTing / $countReview, 2);
        }
    }
    ?>

    <body>
        <section id="review">
            <h1 style="text-align: center;">Review product</h1>
            <form action="Review.php" class="container" method="get">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="row">
                    <div class="col-6">
                        <img id="image_review" src="public/img/<?php echo $getNameSP['image'] ?>" alt="">
                    </div>
                    <div id="review_sp" class="col-5">
                        <h5><b style="text-transform: uppercase;" id="b_name"><?php echo $getNameSP['name'] ?></b>
                            <p style="color: #333;" id="average-rating">Rating:
                                <?php echo  isset($totalStar) ? $totalStar : "?"  ?> ⭐
                                <b style="color: #333; font-size: 15px;">Lượt review: <?php echo $countReview ?></b>
                            </p>
                        </h5>
                        <div id="rating-container">
                            <input id="star-only" name="select" type="radio" value="1">
                            <label for="star-only">1 ⭐</label>

                            <input id="star-only" name="select" type="radio" value="2">
                            <label for="star-only">2 ⭐</label>

                            <input id="star-only" name="select" type="radio" value="3">
                            <label for="star-only">3 ⭐</label>

                            <input id="star-only" name="select" type="radio" value="4">
                            <label for="star-only">4 ⭐</label>

                            <input id="star-5" name="select" type="radio" value="5">
                            <label for="star-5">5 ⭐ </label>
                        </div>

                        <br>
                        <textarea name="review" placeholder="Comment" cols="50" rows="10">  </textarea>
                        <button id="submit-rating" class="btn btn-danger" style="margin-left: 450px;
                            margin-top: -90px" name="sendCommit" type="submit">
                            <i class="fa-solid fa-comment"></i>
                        </button>
                    </div>
                    <section style="max-width: 700px; margin-left: 515px">
                        <div class="comments-container">
                            <?php foreach ($print as $value): ?>
                            <div class="comment">
                                <div class="comment-header">
                                    <strong class="comment-user d-flex align-items: center  gap-3"><img
                                            style="border-radius: 50%; object-fit: cover; height: 50px; width: 50px;"
                                            src="uploads/<?php echo isset($getImg[0]['name']) ? $getImg[0]['name'] : 'user.png'  ?>"
                                            class="img-fluid">
                                        <?php echo htmlspecialchars($value['nameUser']); ?></strong>
                                </div><br>
                                <p class="comment-content px-4"><?php echo htmlspecialchars($value['comment']); ?>
                                </p>
                                <span><?php echo $value['star'] ?> ⭐</span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                </div>
            </form>
            <style>
            #hoverReview {
                transform: scale(1);
                cursor: pointer;
                transition: all 0.75s ease-in-out;
            }

            #hoverReview:hover {
                transform: scale(1.2);
            }
            </style>
            <div id="click-review" class="px-5" style="display: flex; gap: 10px; margin-top: 20px; margin-left: 40px;">
                <?php foreach ($showSP as $value):  ?>
                <a href="Review.php?id=<?php echo $value['id'] ?>">
                    <img id="hoverReview" style="border: 1px solid #dc3435; border-radius: 5px;  object-fit: contain;"
                        src=" public/img/<?php echo $value['image'] ?>" class="img-fluid" alt="" width="100px"
                        height="100px">
                    <?php endforeach ?>
                </a>
            </div>
            <p class="pt-5"></p>
        </section>

        <script>
        // tính toán số star
        let totalRating = 0;
        let totalUsers = 0;

        // Lấy các phần tử cần sử dụng
        const ratingContainer = document.getElementById("rating-container");
        const submitButton = document.getElementById("submit-rating");
        const averageRatingText = document.getElementById("average-rating");

        let selectedValue = 0;

        //in thông thông thoát
        const exit = document.getElementById('exit');


        exit.addEventListener("click", () => {
            const userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                alert("You have logged out.");
            } else {
                event.preventDefault();
                event.defaultPrevented();
            }
        });
        </script>
    </body>

    </html>
    <?php
    include "footer.php";
    ?>