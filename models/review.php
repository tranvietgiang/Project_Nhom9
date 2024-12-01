<?php

class review extends Db
{
    public function Comment($nameUser, $comment, $idShoe)
    {
        // Chỉ định rõ các cột cần chèn dữ liệu (ngoại trừ id tự động tăng)
        $sql = self::$connection->prepare("INSERT INTO `tb_comment` (`nameUser`, `comment`, `idShoes`) VALUES (?, ?, ?)");
        $sql->bind_param("ssi", $nameUser, $comment, $idShoe);

        // Thực thi truy vấn
        $sql->execute();

        // Kiểm tra xem bản ghi đã được thêm thành công chưa
        return $sql->affected_rows > 0;
    }



    // public function PrintComment($nameUser)
    // {
    //     $sql = self::$connection->prepare("SELECT cm.`nameUser`, cm.`comment`
    //     FROM `tb_comment` cm,`product`sp
    //     WHERE cm.`idShoes` = sp.id AND nameUser = ?");

    //     $sql->bind_param("s", $nameUser);
    //     $sql->execute();

    //     $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    //     return $result;
    // }

    public function PrintComment($idShoe)
    {
        $sql = self::$connection->prepare("SELECT `nameUser`, `comment` 
        FROM `tb_comment` 
        WHERE `idShoes` = ?");
        $sql->bind_param("i", $idShoe);
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
}
