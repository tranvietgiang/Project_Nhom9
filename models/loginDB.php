<?php
class login_shoes extends Db
{
    public function CheckLogin($tk, $mk)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_login` WHERE `username` = ? AND `password` = ?");
        $sql->bind_param("ss", $tk, $mk);
        $sql->execute();

        $result = $sql->get_result()->fetch_assoc();
        return $result;
    }
}
