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

    public function ChangPassword($pass_new, $email, $pass_old,)
    {
        $sql = self::$connection->prepare("UPDATE `tb_login` SET `password` = ? WHERE `email_id` = ? AND `password` = ?");

        // Liên kết tham số với kiểu dữ liệu tương ứng
        $sql->bind_param("sss", $pass_new, $email, $pass_old);

        $sql->execute();


        if ($sql->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

        return $result;
    }
    public function dangki($username, $password, $email)
    {
        // Chuẩn bị câu lệnh SQL
        $sql = self::$connection->prepare("INSERT INTO `tb_login` VALUES (?, ?, ?, 'custom')");
        // Liên kết các tham số
        $sql->bind_param('sss', $username, $password, $email);
        // Thực thi câu lệnh
        $sql->execute();

        return true;
    }
    public function checkusername($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_login` WHERE username = ?");
        $sql->bind_param("s", $user);
        $sql->execute();
        $item = $sql->get_result();
        if ($item->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkemail($email)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_login` WHERE email_id = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $item = $sql->get_result();
        if ($item->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
