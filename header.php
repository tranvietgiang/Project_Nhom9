<?php
require "models/config.php";
require "models/Db.php";
require "models/headerDB.php";

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
<!-- Link icon  -->
<link rel="stylesheet" href="https://unpkg.com/ionicons@latest/dist/css/ionicons.min.css">



<body>
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
    <main>
        <!-- image move -->
        <?php
        // Mã PHP chèn CSS vào trong thẻ <head> của HTML
        echo '
<style>
    .sb-img {
        display: flex;
        transition: transform 0.5s ease-in-out; 
    }
    
.m-font .title_1:nth-child(1) .showContentjs .a_sale,
.m-font .title_1:nth-child(1) .showContentjs .lorem,
.m-font .title_1:nth-child(1) .showContentjs .a_sale_2,
.m-font .title_1:nth-child(1) .showContentjs button {
  display: inline-block;
  transform: translateY(50px);
  filter: blur(20px);
  opacity: 0;
  animation: font 0.7s ease-out forwards;
}
   
  @keyframes font {
    from {
      transform: translateY(50px);
      filter: blur(20px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      filter: blur(0);
      opacity: 1;
    }
  }
</style>';
        ?>
        <section id="shoes_banner">
            <div class="sb-img d-flex">
                <div style="transition: transform 0.25s ease-in-out;" class="img_move">
                    <img class="item_imgs" src="https://htmldemo.net/james/james/img/slider/slider-2.jpg" alt="" />
                </div>
                <div class="img_move"><img class="item_imgs"
                        src="https://htmldemo.net/james/james/img/slider/slider-1.jpg" alt="" />
                </div>
            </div>
        </section>
        <!-- js -->
        <!--  -->
        <div class="icon_left_right">
            <button onclick="prevImage()" class="button_1">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button onclick="nextImage()" class="button_2">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <!--  part word run  -->
        <section class="m-font animation-container">
            <div class="title_1 ">
                <div class="content">
                    <span class=""><a class="a_sale" style="font-family: 'Norican', cursive; font-size: 60px"
                            href="#">Sale products</a></span><br />
                    <span><a class="a_sale_2" style="
                  font-family: 'Montserrat', sans-serif;
                  font-size: 62px;
                  font-weight: 700;
                  font-stretch: expanded;
                " href="#">GET UP TO 50% SALE</a></span><br />
                    <span style="
                font-family: 'Montserrat', sans-serif;
                font-size: 20px;
                font-weight: 700;
              "><a href="#" class="lorem">Lorem Ipsum is simply dummy text of the printing</a></span><br />
                    <button style="width: 120px; height: 40px; position: absolute; z-index: 999;" type="submit"
                        class="btn btn-outline-danger">
                        <span class="b-span">Read Move</span>
                    </button>
                </div>
            </div>
            <!-- time running -->
            <div class="progress-bar"></div>
        </section>
        <!--  -->
        <div class="row">
            <section style="background-color: white" class="col-5">
                <div style="margin: 30px" class="font_3item">
                    <a style="color: #dc3545" href="#">NIKE ARI MAX 2015</a><br />
                    <a style="font-size: 30px; font-weight: 700" href="#">AIR SUPERIORITY</a><br />
                    <a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</a><br />
                    <button type="button" class="btn btn-outline-secondary">
                        Shopping Now
                    </button>
                </div>
                <div>
                    <img style="width: 638px; height: 291px; object-fit: cover"
                        src="https://htmldemo.net/james/james/img/banner/banner-2.jpg" alt="" />
                </div>
            </section>
            <!-- tìm kiếm  -->
            <section class="m-find col-7">
                <div style="background-color: #e5e5e5">
                    <form action="search.php" method="get">
                        <input type="text" id="search-input" name="search" value="" />
                        <a href="#">
                            <button style="border: none;" value="search"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </a>
                    </form>


                </div>
                <section class="row">
                    <div class="col-7">
                        <img src="https://htmldemo.net/james/james/img/banner/banner-1.jpg" alt="" />
                    </div>
                    <!--  -->
                    <div class="font_3item_2 col-5">
                        <a style="color: #dc3545" href="#">NIKE ARI Md</a><br />
                        <a style="font-size: 30px; font-weight: 700" href="#">AIR SUPERIORITY</a><br />
                        <a style="font-size: 14px; font-stretch: expanded" href="#">Lorem Ipsum is simply dummy text of
                            the printing and
                            typesetting industry.</a><br />
                        <button type="button" class="btn btn-outline-secondary">
                            Shopping Now
                        </button>
                    </div>
                </section>
                <!--  -->
                <section class="row">
                    <div class="col-4">
                        <img style="width: 340px; height: 180px; object-fit: cover"
                            src="https://htmldemo.net/james/james/img/banner/banner-3.jpg" alt="" />
                    </div>
                    <div class="col-8">
                        <img style="width: 100%; height: auto; object-fit: cover"
                            src="https://htmldemo.net/james/james/img/banner/banner-4.jpg" alt="" />
                    </div>
                </section>
            </section>
        </div>
    </main>
    <footer></footer>
    <!-- js -->
    <script>
        setInterval(function() {
            const content = document.querySelector('.content');
            content.classList.add('showContentjs'); // Thêm hiệu ứng di chuyển

            // Loại bỏ class move-up sau khi hiệu ứng hoàn tất
            setTimeout(() => content.classList.remove('showContentjs'), 4000);
        }, 4000); // Mỗi 4 giây


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
    <!-- link js bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/js_Da9.js"></script>
</body>

</html>