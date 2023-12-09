<?php
class LOAINGUOIDUNG
{
    private $id;
    private $tenlnd;

    public function getid()
    {
        return $this->id;
    }

    public function setid($value)
    {
        $this->id = $value;
    }

    public function gettenlnd()
    {
        return $this->tenlnd;
    }

    public function settenlnd($value)
    {
        $this->tenlnd = $value;
    }

    // Lấy danh sách
    public function layloainguoidung()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loainguoidung";
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
    public function layloainguoidungtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM loainguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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
    public function themloainguoidung($loainguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO loainguoidung(tenlnd) VALUES(:tenlnd)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenlnd", $loainguoidung->tenlnd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoaloainguoidung($loainguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM loainguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $loainguoidung->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function sualoainguoidung($loainguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE loainguoidung SET tenlnd=:tenlnd WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenlnd", $loainguoidung->tenlnd);
            $cmd->bindValue(":id", $loainguoidung->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
