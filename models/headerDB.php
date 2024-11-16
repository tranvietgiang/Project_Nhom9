<?php

class navbar extends Db
{
    public function GetNavbarAll()
    {
        $sql = self::$connection->prepare("SELECT * FROM tb_navbar");
        $sql->execute();

        $array_new = array();
        $array_new = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $array_new;
    }

    public function GetVND_Navbar($id)
    {
        $sql = self::$connection->prepare("SELECT name FROM tb_navbar WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result()->fetch_assoc();
        return $result ? $result['name'] : null; // Chỉ trả về giá trị của 'name' hoặc null nếu không tìm thấy
    }

    public function GetVND_Child()
    {
        $sql = self::$connection->prepare("SELECT * FROM tb_navbar_child");
        $sql->execute();

        $array_new = array();
        $array_new = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $array_new;
    }

    // lấy li thứ 4
    public function GetLi_thu4_child()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_navbar_li_tem4`");
        $sql->execute();

        $array_new = array();
        $array_new = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $array_new;
    }

    // lấy Navbar_2
    public function GetNavbar2()
    {
        $sql = self::$connection->prepare("SELECT * FROM tb_navbar_2");
        $sql->execute();

        $result = array();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    // lấy Navbar_2_child
    public function GetNavbar2Child()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_navbar_2_child`");
        $sql->execute();

        $result = array();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function Search($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_shoes` WHERE id = ?");

        // $keySearch = "%" . $id . "%";
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = array();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
}
