<?php session_start();


require "models/config.php";
require "models/Db.php";
require "models/product.php";
require "models/cart.php";
require "models/Users.php";
require "models/address.php";

//
$address = new Address;
$province = $address->Province();
$_SESSION['provincetUser'] = $province[0]['name'];

if (isset($_POST['province_id'])) {
    $province_id = intval($_POST['province_id']);
    $districts = $address->District($province_id);

    $options = '';
    foreach ($districts as $value) {
        $options .= '<option value="' . $value['district_id'] . '">' . htmlspecialchars($value['name']) . '</option>';
        $_SESSION['districtUser'] = $value['name'];
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

    $_SESSION['wardsUser'] = $value['name'];
    echo $options2;
    exit();
}

// handle xác nhận địa chỉ user
if (isset($_GET['confirm_Order'])) {

    $nameOrder = $_SESSION['userEmail'];

    $sdt = $_GET['sdtOrder'];
    $name = $_GET['nameOrder'];
    $province = $_SESSION['provincetUser'];
    $district = $_SESSION['districtUser'];
    $wards = $_SESSION['wardsUser'];
    $addressCuThe = $_GET['cuThe'];

    // add địa chỉ nếu chưa có
    $address->addressDetail($nameOrder, $sdt, $name, $province, $district, $wards, $addressCuThe);
    // header("location: billConfirm.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="./Component/css/phuongthucpay.css">
</head>

<body>

    <form action="" method="get">
        <h1>Chọn hình thức thanh toán!</h1>
        <input type="text" name="sdtOrder" placeholder="Mời nhập SDT"><br>
        <input type="text" name="nameOrder" placeholder="Mời nhập Tên "><br>

        <div class="address">
            <select name="province_id" id="province">
                <option value="" disabled selected>Select province or city</option>
                <?php foreach ($province as $value): ?>
                    <option value="<?php echo $value['province_id']; ?>">
                        <?php echo htmlspecialchars($value['name']);
                        $province = $value['name'];
                        ?>
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

        <input type="text" name="cuThe" placeholder="Mời nhập địa chỉ cụ thể"><br>
        <button type="submit" name="confirm_Order">
            Confirm Address
        </button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
</body>

</html>
</body>

</html>