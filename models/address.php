<?php
class Address extends Db
{

    // Print province
    public function Province()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_province`");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
    // Print District
    public function District($province_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_district` WHERE `province_id` = ?");
        $sql->bind_param("i", $province_id);
        $sql->execute();
        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Print wards
    public function wards($district_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_wards` WHERE `district_id` = ?");
        $sql->bind_param("i", $district_id);
        $sql->execute();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    // store address detail my user
    public function addressDetail($nameUser, $sdtUser, $nameOrder, $province, $district, $wards, $diaChiCuThe)
    {
        $sql = self::$connection->prepare("INSERT INTO `tb_addressdetail`(`nameUser`, `sdtUser`, `nameOrder`, `province`, `district`, `wards`, `diaChiCuThe`)
        VALUES(?,?,?,?,?,?,?)");
        $sql->bind_param("sssssss", $nameUser, $sdtUser, $nameOrder, $province, $district, $wards, $diaChiCuThe);

        return $sql->execute();
    }

    // check address user đã nhập chưa
    public function CheckAddress()
    {
        $sql = self::$connection->prepare("SELECT EXISTS (SELECT 1 FROM `tb_addressdetail` WHERE `nameUser` IS NOT NULL)");
        $sql->execute();
        $sql->bind_result($check);
        $sql->fetch();
        $sql->close();

        return (bool) $check;
    }

    // get thong tin address user
    public function GetTTND()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_addressdetail`");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
}
