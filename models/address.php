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
}
