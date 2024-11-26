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

            $getImg = $thongtin->GetImg();
            ?>
            <div style="text-align: center; background-color: #e5e5e5; max-width: 1000px; margin: 0 auto;" class="row">
                <div class="col-6">
                    <div>
                        <form method="post" enctype="multipart/form-data">
                            <img id="preview" src="<?php echo $getImg['name'] ?>"
                                style="object-fit: contain; border-radius: 50%; margin: 50px 0 10px  0;" width="200px"
                                height="100%" alt="img-fluid"><br>
                            <input type="file" id="imageInput" name="ChooseImg" accept="image/*"><br>
                            <button id="saveButton" name="send" class="btn btn-danger"
                                style="display: none;">Save</button>
                        </form>
                    </div>
                </div>
                <?php

                // if (isset($_POST['send'])) {
                //     if (isset($_FILES['ChooseImg']) && $_FILES['ChooseImg']['error'] === UPLOAD_ERR_OK) {
                //         $file = $_FILES['ChooseImg'];
                //         $uploadDir = 'uploads/';
                //         $fileName = basename($file['name']);
                //         $targetFilePath = $uploadDir . $fileName;

                //         // Di chuyển tệp đã tải lên
                //         if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                //             // Gọi UploadImg để lưu vào DB
                //             if ($thongtin->UploadImg($fileName)) {
                //                 echo "Tệp đã được tải lên thành công!";
                //             } else {
                //                 echo "Lỗi khi lưu thông tin tệp vào cơ sở dữ liệu.";
                //             }
                //         } else {
                //             echo "Lỗi khi di chuyển tệp.";
                //         }
                //     } else {
                //         echo "Không có tệp nào được tải lên hoặc có lỗi xảy ra.";
                //     }
                // }




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
                        <span style="display: flex; align-items: center; margin: 20px 0 20px 0; width: 600px; height: 50px; background-color: #e5e5e5; border-radius: 5px;
                            border: 1px solid #e5e5e4">
                            <b style="border-right: 1px solid #000" class="px-2"><?php echo $value['icon'] ?></b>
                            <strong class="px-2"><?php echo $value['name'] ?></strong>
                        </span>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <style>
    #my-information {
        width: 600px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        margin-left: 770px;
        margin-top: -60px;
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
    </style>

    <!-- PHP Section -->
    <?php
    $address = new Address;
    $province = $address->Province();

    if (isset($_POST['province_id'])) {
        $province_id = intval($_POST['province_id']);
        $districts = $address->District($province_id);

        $options = '';
        foreach ($districts as $district) {
            $options .= '<option value="' . $district['district_id'] . '">' . htmlspecialchars($district['name']) . '</option>';
        }
        echo $options;
        exit;
    }
    ?>
    <section id="my-information">
        <form action="" method="POST">
            <div style="margin-bottom: 15px;">
                <select name="province_id" id="province">
                    <option value="" disabled selected>Select province or city</option>
                    <?php foreach ($province as $value): ?>
                    <option value="<?php echo $value['province_id']; ?>">
                        <?php echo htmlspecialchars($value['name']); ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <select name="district_id" id="district">
                    <option value="" disabled selected>Select District</option>
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
    $(document).ready(function() {
        $("#province").change(function() {
            var selectedValue = $(this).val();
            $.post("", {
                province_id: selectedValue
            }, function(data) {
                $("#district").html(data); // Populate districts  
            });
        });
    });
    </script>

    <!-- Link js -->
    <script>
    // 
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('preview');
    const saveButton = document.getElementById('saveButton');
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

    imageInput.addEventListener('change', function() {
        const file = this.files[0]; // Lấy file đầu tiên  

        if (file) {
            const reader = new FileReader();

            reader.onload = function(event) {
                preview.src = event.target.result; // Gán địa chỉ vào thẻ img  
                preview.style.display = 'block'; // Hiển thị thẻ img  
            }

            reader.readAsDataURL(file); // Đọc file và chuyển đổi thành URL dữ liệu  
        }
    });

    imageInput.addEventListener("click", () => {
        saveButton.style.display = 'block'; // Show the button  

        // saveButton.style.display = 'none'; // Hide the button if no file  

    })
    </script>
</body>

</html>

<?php include "footer.php" ?>