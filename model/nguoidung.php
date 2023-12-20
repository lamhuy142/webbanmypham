<?php
class NGUOIDUNG
{
    // khai báo các thuộc tính
    private $id;
    private $matkhau;
    private $loaind_id;
    private $diachi;
    private $email;
    private $sdt;
    private $hinhanh;
    private $tinhtrang;
    private $tennd;

    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function getmatkhau()
    {
        return $this->matkhau;
    }
    public function setmatkhau($value)
    {
        $this->matkhau = $value;
    }
    public function getloaind_id()
    {
        return $this->loaind_id;
    }
    public function setloaind_id($value)
    {
        $this->loaind_id = $value;
    }
    public function getdiachi()
    {
        return $this->diachi;
    }
    public function setdiachi($value)
    {
        $this->diachi = $value;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function setemail($value)
    {
        $this->email = $value;
    }
    public function getsdt()
    {
        return $this->sdt;
    }
    public function setsdt($value)
    {
        $this->sdt = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }
    public function gettinhtrang()
    {
        return $this->tinhtrang;
    }
    public function settinhtrang($value)
    {
        $this->tinhtrang = $value;
    }
    public function gettennd()
    {
        return $this->tennd;
    }
    public function settennd($value)
    {
        $this->tennd = $value;
    }


    public function kiemtranguoidunghople($email, $matkhau)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND tinhtrang=1";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->bindValue(":matkhau", md5($matkhau));
            $cmd->execute();
            $valid = ($cmd->rowCount() == 1);
            $cmd->closeCursor();
            return $valid;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function laythongtinnguoidung($email)
    {
        $db = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE email=:email";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":email", $email);
            $cmd->execute();
            $ketqua = $cmd->fetch();
            $cmd->closeCursor();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy danh sách
    public function laynguoidung()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung ORDER BY id DESC ";
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
    public function timkiemnguoidung($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung n, loainguoidung l where n.loaind_id = l.id AND n.tennd like '%$search%'  "; //OR p.tenpl like '%$search%'
            $cmd = $dbcon->prepare($sql);
            // $cmd->bindValue(":tenmp", $search);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laynguoidungtheoloai($loaind)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE loaind_id=:madm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $loaind);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laynguoidungtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM nguoidung WHERE id=:id";
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
    //         $sql = "UPDATE nguoidung SET luotxem=luotxem+1 WHERE id=:id";
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
    // public function laynguoidungxemnhieu()
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM nguoidung ORDER BY luotxem DESC LIMIT 3";
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
    public function themnguoidung($nguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
nguoidung(matkhau,loaind_id,diachi,email,sdt,hinhanh,tinhtrang,tennd) 
VALUES(:matkhau,:loaind_id,:diachi,:email,:sdt,:hinhanh,:tinhtrang,:tennd)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":matkhau", md5($nguoidung->matkhau));
            $cmd->bindValue(":loaind_id", $nguoidung->loaind_id);
            $cmd->bindValue(":diachi", $nguoidung->diachi);
            $cmd->bindValue(":email", $nguoidung->email);
            $cmd->bindValue(":sdt", $nguoidung->sdt);
            $cmd->bindValue(":hinhanh", $nguoidung->hinhanh);
            $cmd->bindValue(":tinhtrang", $nguoidung->tinhtrang);
            $cmd->bindValue(":tennd", $nguoidung->tennd);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoanguoidung($nguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $nguoidung->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suanguoidung($nguoidung)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung SET matkhau=:matkhau,
            loaind_id=:loaind_id,
            diachi=:diachi,
            email=:email,
            sdt=:sdt,
            hinhanh=:hinhanh,
            tinhtrang=:tinhtrang,
            tennd=:tennd,
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":matkhau", $nguoidung->matkhau);
            $cmd->bindValue(":loaind_id", $nguoidung->loaind_id);
            $cmd->bindValue(":diachi", $nguoidung->diachi);
            $cmd->bindValue(":email", $nguoidung->email);
            $cmd->bindValue(":sdt", $nguoidung->sdt);
            $cmd->bindValue(":hinhanh", $nguoidung->hinhanh);
            $cmd->bindValue(":tinhtrang", $nguoidung->tinhtrang);
            $cmd->bindValue(":tennd", $nguoidung->tennd);
            $cmd->bindValue(":id", $nguoidung->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function doitinhtrang($id, $tinhtrang)
    {
        $db = DATABASE::connect();
        try {
            $sql = "UPDATE nguoidung set tinhtrang=:tinhtrang where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':tinhtrang', $tinhtrang);
            $ketqua = $cmd->execute();
            return $ketqua;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
