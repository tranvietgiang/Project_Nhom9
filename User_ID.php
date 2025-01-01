<?php session_start() ?>
<?php require "models/config.php";
require "models/db.php";
require "models/Users.php";
require "models/headerDB.php";
require "models/address.php";
?>


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

<?php
// nếu như user chưa đăng nhập thì qua trang này
$thongtin = new Users_shoes;
if (!isset($_SESSION['username'])) {
    header("location: Login_users.php");
    exit();
}

$user = $_SESSION['username'];
$getNme = $thongtin->GetUserInfo($user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
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
                                <?php elseif ($name === 'my cart'): ?>
                                    <a href="donDatHang.php"><?php echo $name; ?></a>
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
    <!-- User id -->

    <!--  -->
    <style>
        section#user_id>div.container>h2,
        div>p {
            color: #000;
        }
    </style>
    <section id="user_id">
        <div class="container">
            <?php
            // Lấy giờ hiện tại theo định dạng 24 giờ  
            $current_hour = (int)date('H');

            $check_hours = "";

            if ($current_hour >= 1 && $current_hour < 10) {
                $check_hours = "Good Morning: ";
            } else if ($current_hour >= 10 && $current_hour < 15) {
                $check_hours = "Good Afternoon: ";
            } elseif ($current_hour >= 15 && $current_hour < 17) {
                $check_hours = "Good Evening: ";
            } elseif ($current_hour >= 17 && $current_hour < 22) {
                $check_hours = "Good Night: ";
            } elseif ($current_hour >= 22 && $current_hour <= 23) {
                $check_hours = "Late Night: ";
            }

            $email_id = isset($_SESSION['userEmail']) ? $_SESSION['userEmail'] : "";
            $getImg =  $thongtin->GetAvatar($email_id);

            ?>
            <div style="text-align: center; background-color: #e5e5e5; max-width: 1000px; margin: 0 auto;" class="row">
                <div class="col-6">
                    <div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <img id="preview"
                                src="uploads/<?php echo isset($getImg[0]['name']) ? $getImg[0]['name'] : 'user.png'  ?>"
                                style="object-fit: cover; border-radius: 5%; border: 2px solid #dc3435; margin: 50px 0 10px  0;"
                                width="300px" height="100%" alt="img-fluid"><br>
                            <!-- handle images  -->
                            <input type="file" id="imageInput" style="margin-left: 100px;" value="choose"
                                name="avatarUser"><br>
                            <input style="display: none;" id="AvatarSave" class="btn btn-danger btn-mini" type="submit"
                                value="save" name="AvatarSave">
                        </form>
                    </div>
                </div>

                <!-- process gửi ajax not load page -->
                <script>
                    document.getElementById('AvatarSave').addEventListener('click', async () => {
                        try {
                            const response = await fetch('User_ID.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    action: 'saveAvatar'
                                })
                            });

                            if (response.ok) {
                                window.location.reload();
                            }

                        } catch {

                        }
                    })
                </script>
                <!-- Handle user choose image  -->

                <?php
                if (isset($_POST['AvatarSave'])) {

                    $addImage = $_FILES["avatarUser"]["name"];

                    if (!$thongtin->CheckEmailExits($email_id)) {
                        $thongtin->AddAvatar($addImage, $email_id);
                    } else {
                        $thongtin->UpdateFile($addImage, $email_id);
                    }
                    $thongtin->DeleteImgOld($email_id);


                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["avatarUser"]["name"]);
                    move_uploaded_file($_FILES["avatarUser"]["tmp_name"], $target_file);
                }
                ?>
                <!--  -->
                <div id="user" style="margin-top: 100px; margin-left: -100px;" class="col-6">
                    <h3><?php echo  $check_hours;
                        echo $getNme['nameUser'] ?>!
                    </h3>
                    <p><b>Email: </b><?php echo $getNme['email_id'] ?></p>
                </div>
            </div>
        </div>

    </section>
    <!--  -->
    <?php

    $myAccount = $thongtin->MyAccount();

    ?>
    <style>
        section row>col-6 a {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 15px;
        }
    </style>
    <section class="container">
        <div style="margin: 50px 0 0 0; text-transform: uppercase;" class="row ">
            <div class="col-6">
                <h4><i class="fa-solid fa-bars px-1"></i>SHOPPING OPTIONS</h4>
                <div>
                    <h5>Category</h5>
                    <?php foreach ($myAccount as $value): ?>
                        <div>
                            <a href="#"><?php echo $value['category'] ?></a>
                        </div>
                    <?php endforeach ?>
                    <h5 style="margin-top: 50px;">Color</h5>
                    <?php foreach ($myAccount as $value): ?>
                        <div>
                            <a href="#"><?php echo $value['color'] ?></a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="col-6">
                <div class="">
                    <?php foreach ($myAccount as $value): ?>
                        <div>
                            <span style="display: flex; align-items: center; margin: 20px 0 20px 0; width: 600px; height: 50px; background-color: #e5e5e5; border-radius: 5px; cursor: pointer;
                            border: 1px solid #e5e5e4">
                                <?php
                                $name = htmlspecialchars($value['name']);
                                if ($name === 'my person information'):
                                ?>

                                    <b style="border-right: 1px solid #000"
                                        class="px-2 handleCss"><?php echo $value['icon'] ?></b>
                                    <strong class="px-2 handleCss"><?php echo $value['name'] ?></strong>

                                <?php else: ?>
                                    <b style="border-right: 1px solid #000" class="px-2"><?php echo $value['icon'] ?></b>
                                    <strong class="px-2"><?php echo $value['name'] ?></strong>
                                <?php endif ?>
                            </span>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- handle css -->
    <style>
        #my-information {
            width: 600px;
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-left: 770px;
            margin-top: -60px;
            opacity: 0;
            transition: opacity 0.25s linear;
        }

        .address {
            margin-bottom: 15px;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select option:hover {
            background-color: #dc3435;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* handle css dropdown my-information */
        #my-information {
            height: 100%;
        }
    </style>

    <?php
    $address = new Address;
    $province = $address->Province();

    if (isset($_POST['province_id'])) {
        $province_id = intval($_POST['province_id']);
        $districts = $address->District($province_id);

        $options = '';
        foreach ($districts as $value) {
            $options .= '<option value="' . $value['district_id'] . '">' . htmlspecialchars($value['name']) . '</option>';
        }
        echo $options;
        exit();
    }

    if (isset($_POST['district_id'])) {
        $wards_id = intval($_POST['district_id']);
        $wards = $address->wards($wards_id);

        $options2 = '';
        foreach ($wards as $value) {
            $options2 .= '<option value="' . $value['wards_id'] . '">' . htmlspecialchars($value['name']) . '</option>';
        }
        echo $options2;
        exit();
    }

    ?>
    <section id="my-information">
        <form action="" method="post">
            <div class="address">
                <select name="province_id" id="province">
                    <option value="" disabled selected>Select province or city</option>
                    <?php foreach ($province as $value): ?>
                        <option value="<?php echo $value['province_id']; ?>">
                            <?php echo htmlspecialchars($value['name']); ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="address">
                <select name="district_id" id="district">
                    <option value="" disabled selected>Select District</option>
                </select>
            </div>

            <div class="address">
                <select name="wards_id" id="wards">
                    <option value="" disabled selected>Select Wards</option>
                </select>
            </div>

            <div>
                <input type="text" name="address" placeholder="Address cụ thể" style="width: 100%;">
            </div>
        </form>
    </section>

    <!-- jQuery Link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- handle Ajax -->
    <script>
        // handle my-information  
        const handleCss = document.querySelectorAll(".handleCss");
        const my_information = document.getElementById("my-information");

        // handle button AvatarSave
        const avatarSave = document.getElementById("AvatarSave");

        const imageInput = document.getElementById("imageInput");

        // Sự kiện focus khi hộp thoại tệp được mở
        imageInput.addEventListener("focus", () => {
            avatarSave.style.display = "block";
        });

        // Sự kiện blur khi hộp thoại tệp bị đóng (nếu không chọn gì)
        imageInput.addEventListener("blur", () => {
            if (imageInput.files.length === 0) {
                avatarSave.style.display = "none";
            }
        });

        imageInput.addEventListener("change", () => {
            if (imageInput.files.length > 0) {
                avatarSave.style.display = "block"; // Hiển thị khi có tệp được chọn
            }
        });


        handleCss.forEach(item => {
            item.addEventListener("click", () => {
                if (my_information.style.display === "none") {
                    my_information.style.display = "block";
                    setTimeout(() => {
                        my_information.style.opacity = 1;
                    }, 10);
                } else {
                    my_information.style.opacity = 0;
                    setTimeout(() => {
                        my_information.style.display = "none";
                    }, 250);
                }
            });
        });
        // quận or huyện
        $(document).ready(function() {
            $("#province").change(function() {
                var selectedValue = $(this).val();
                $.post("", {
                    province_id: selectedValue
                }, function(data) {
                    $("#district").html(data);
                });
            });
        });

        // xã or phường
        $(document).ready(function() {
            $("#district").change(function() {
                var selectedValue = $(this).val();
                $.post("", {
                    district_id: selectedValue
                }, function(data) {
                    $("#wards").html(data);
                });
            });
        });
    </script>

    <!-- Link js -->
    <script>
        //in thông thông thoát
        const exit = document.getElementById('exit');
        exit.addEventListener("click", (event) => {
            const userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                // Thực hiện hành động đăng xuất ở đây  
                alert("You have logged out.");
            } else {
                event.preventDefault();
                event.defaultPrevented();
                // alert("Logout canceled.");
            }
        });
    </script>
</body>

</html>

<?php include "footer.php" ?>