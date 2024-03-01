<?php
class LOAIMYPHAM
{
    private $idlmp;
    private $tenloai;

    public function getidlmp()
    {
        return $this->idlmp;
    }

    public function setidlmp($value)
    {
        $this->idlmp = $value;
    }

    public function gettenloai()
    {
        return $this->tenloai;
    }

    public function settenloai($value)
    {
        $this->tenloai = $value;
    }

    // Lấy danh sách
    public function layloaimypham()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaimypham";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }


    // Lấy danh mục theo id
    public function layloaimyphamtheoid($idlmp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loaimypham WHERE idlmp=:idlmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":idlmp", $idlmp);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function themloaimypham($loaimypham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO loaimypham(tenloai) VALUES(:tenloai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenloai", $loaimypham->tenloai);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoaloaimypham($loaimypham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM loaimypham WHERE idlmp=:idlmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":idlmp", $loaimypham->idlmp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function sualoaimypham($loaimypham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE loaimypham SET tenloai=:tenloai WHERE idlmp=:idlmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenloai", $loaimypham->tenloai);
            $cmd->bindValue(":idlmp", $loaimypham->idlmp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
