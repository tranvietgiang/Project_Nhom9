<?php
class cart extends Db
{


    // lấy prodduct theo iduser 
    public function getallcart($iduser)
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` WHERE `user_id`= ? ORDER BY `id` DESC");
        $sql->bind_param("i", $iduser);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    // thêm product

    public  function addcart($id_user, $soluong, $name, $price, $image)
    {
        $sql = self::$connection->prepare("INSERT INTO `cart`(`id`, `user_id`, `quantiy`, `name`, `price`, `image`)
                                         VALUES ('',?,?,?,?,?,?)");
        $sql->bind_param("iisis", $id_user, $soluong, $name, $price, $image);
        $sql->execute();
        return true;
    }

    public  function addcartDemo($id_user, $soluong, $name, $price, $image, $productID)
    {
        $sql = self::$connection->prepare("INSERT INTO `cart`(`id`, `user_id`, `quantiy`, `name`, `price`, `image`, `productID`)
                                         VALUES ('',?,?,?,?,?,?)");
        $sql->bind_param("iisisi", $id_user, $soluong, $name, $price, $image, $productID);
        $sql->execute();
        return true;
    }

    // xóa sản phẩm 
    public function remove($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE `id`= ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        return true;
    }

    public function checkProductInCart($userId, $productId)
    {
        $sql = self::$connection->prepare("
        SELECT * 
        FROM `cart` 
        WHERE `user_id` = ? AND `productID` = ?
    ");
        $sql->bind_param("ii", $userId, $productId);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result !== null; // Trả về true nếu sản phẩm tồn tại, false nếu không.
    }

    public function updateCart($price, $userId, $productId)
    {
        $sql = self::$connection->prepare("
        UPDATE `cart` 
        SET `quantiy` = `quantiy` + 1, `price` = `price` + ?
        WHERE `user_id` = ? AND `productID` = ?
    ");
        $sql->bind_param("iii", $price, $userId, $productId);
        return $sql->execute();
    }


    // cart my user
    public function PrintCart($user_id)
    {
        $sql = self::$connection->prepare("SELECT *
        FROM `cart`
        WHERE `user_id` = ?");
        $sql->bind_param("i", $user_id);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    // cart my user
    public function MyCartUser($user_id)
    {
        $sql = self::$connection->prepare("SELECT *
        FROM `cartuser`
        WHERE `user_id` = ?");
        $sql->bind_param("i", $user_id);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    // cart my user
    public function MyCartUserTotal($user_id)
    {
        $sql = self::$connection->prepare("SELECT SUM(`totalSL`) AS 'soluong', SUM(`totalPrice` * totalSL) AS 'totalPrice'
        FROM `cartuser`
        WHERE `user_id` = ? ");
        $sql->bind_param("i", $user_id);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    // cart my user
    public function MyCartAddPay($name, $image, $user_id, $sl, $totalPrice)
    {
        $sql = self::$connection->prepare("INSERT INTO `cartuser`(`name`, `image`, `user_id`, `totalSL`, `totalPrice`) 
        VALUES (?,?,?,?,?)");

        // Sử dụng "ssfff" nếu cả $sl và $totalPrice đều là float
        $sql->bind_param("ssiii", $name, $image, $user_id, $sl, $totalPrice);

        return  $sql->execute();
    }


    public function MyCartDeletePay($user_id)
    {
        $sql = self::$connection->prepare("DELETE FROM  `cart` WHERE `user_id` = ?");
        $sql->bind_param("i", $user_id);
        return  $sql->execute();
    }
}
