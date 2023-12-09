<?php
class HOADON
{
    // khai báo các thuộc tính
    private $id;
    private $nguoidung_id;
    private $ngayhd;
    private $ngaygiaohang;
    private $dathanhtoan;
    private $tinhtrang;
    private $tongtien;

    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function getnguoidung_id()
    {
        return $this->nguoidung_id;
    }
    public function setnguoidung_id($value)
    {
        $this->nguoidung_id = $value;
    }
    public function getngayhd()
    {
        return $this->ngayhd;
    }
    public function setngayhd($value)
    {
        $this->ngayhd = $value;
    }
    public function getngaygiaohang()
    {
        return $this->ngaygiaohang;
    }
    public function setngaygiaohang($value)
    {
        $this->ngaygiaohang = $value;
    }
    public function getdathanhtoan()
    {
        return $this->dathanhtoan;
    }
    public function setdathanhtoan($value)
    {
        $this->dathanhtoan = $value;
    }
    public function gettongtien()
    {
        return $this->tongtien;
    }
    public function settongtien($value)
    {
        $this->tongtien = $value;
    }
    public function gettinhtrang()
    {
        return $this->tinhtrang;
    }
    public function settinhtrang($value)
    {
        $this->tinhtrang = $value;
    }

    // Lấy danh sách
    public function layhoadon()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hoadon ORDER BY id DESC ";
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
    // Tìm kiếm 
    public function timkiemhoadon($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hoadon h where h.ngayhd like '%$search%'  "; //OR p.tenpl like '%$search%'
            $cmd = $dbcon->prepare($sql);
            // $cmd->bindValue(":nguoidung_id", $search);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // // Lấy danh sách mặt hàng thuộc 1 danh mục
    // public function layhoadontheoloai($loaisp)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM hoadon WHERE ngayhd=:madm";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":madm", $loaisp);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

    // Lấy hoadon theo id
    public function layhoadontheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM hoadon WHERE id=:id";
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
    // // Cập nhật lượt xem
    // public function tangluotxem($id)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE hoadon SET luotxem=luotxem+1 WHERE id=:id";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":id", $id);
    //         $result = $cmd->execute();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // Lấy mặt hàng xem nhiều
    // public function layhoadonxemnhieu()
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM hoadon ORDER BY luotxem DESC LIMIT 3";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // Thêm mới
    public function themhoadon($hoadon)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
hoadon(nguoidung_id,ngayhd,ngaygiaohang,dathanhtoan,tinhtrang,tongtien) 
VALUES(:nguoidung_id,:ngayhd,:ngaygiaohang,:dathanhtoan,:tinhtrang,:tongtien)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $hoadon->nguoidung_id);
            $cmd->bindValue(":ngayhd", $hoadon->ngayhd);
            $cmd->bindValue(":ngaygiaohang", $hoadon->ngaygiaohang);
            $cmd->bindValue(":dathanhtoan", $hoadon->dathanhtoan);
            $cmd->bindValue(":tinhtrang", $hoadon->tinhtrang);
            $cmd->bindValue(":tongtien", $hoadon->tongtien);
            
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoahoadon($hoadon)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM hoadon WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $hoadon->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suahoadon($hoadon)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE hoadon SET nguoidung_id=:nguoidung_id,
            ngayhd=:ngayhd,
            ngaygiaohang=:ngaygiaohang,
            dathanhtoan=:dathanhtoan,
            tinhtrang=:tinhtrang,
            tongtien=:tongtien,
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $hoadon->nguoidung_id);
            $cmd->bindValue(":ngayhd", $hoadon->ngayhd);
            $cmd->bindValue(":ngaygiaohang", $hoadon->ngaygiaohang);
            $cmd->bindValue(":dathanhtoan", $hoadon->dathanhtoan);
            $cmd->bindValue(":tinhtrang", $hoadon->tinhtrang);
            $cmd->bindValue(":tongtien", $hoadon->tongtien);
            $cmd->bindValue(":id", $hoadon->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
