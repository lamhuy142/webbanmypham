<?php
require("../model/database.php");
require("../model/mypham.php");
require("../model/loaimypham.php");
require("../model/nguoidung.php");
require("../model/giohang.php");
require("../model/chitiethoadon.php");
require("../model/hoadon.php");

// Hàm validate email
function validateEmail($email)
{
    // Kiểm tra tính hợp lệ của email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

// Hàm validate mật khẩu
function validatePassword($password)
{
    // Kiểm tra tính hợp lệ của mật khẩu, ví dụ: ít nhất 6 ký tự
    if (strlen($password) < 6) {
        return false;
    }
    return true;
}

// Xét xem có thao tác nào được chọn
// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$mp = new MYPHAM();
$lmp = new LOAIMYPHAM();
$nd = new NGUOIDUNG();
$cthd = new CHITITETHOADON();
$hd = new HOADON();

switch ($action) {
    case "macdinh":
        // $id = $_SESSION["nguoidung"]["id"];
        // $sogio = $gh->demgiohang($id);
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "gioithieu":

        // $loai = $lmp->layloaimypham();
        // $mypham = $mp->laymypham();
        include("about.php");
    case "lienhe":

        // $loai = $lmp->layloaimypham();
        // $mypham = $mp->laymypham();
        include("contact.php");
        break;
    case "search":
        if (isset($_POST["timkiem"])) {
            $ten_tk = $_POST["txtsearch"];
            if ($ten_tk != "") {
                // lấy thông tin sản phẩm
                $mypham = $mp->timkiemmypham($ten_tk);
                include("search.php");
            } else {
                $id = $_SESSION["nguoidung"]["id"];
                $sogio = $gh->demgiohang($id);
                $loai = $lmp->layloaimypham();
                $mypham = $mp->laymypham();
                include("main.php");
            }
        }
        break;
    case "xemtatca":

        $mypham = $mp->laymypham();

        // $id = $_SESSION["nguoidung"]["id"];
        // $sogio = $gh->demgiohang($id);
        include("shop.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            $id_mp = $_GET["id"];
            // tăng lượt xem lên 1
            $mp->tangluotxem($id_mp);
            // lấy thông tin chi tiết sản phẩm
            $mpct = $mp->laymyphamtheoid($id_mp);
            // lấy các sản phẩm cùng danh mục
            $loai_id = $mpct["loai_id"];
            // $mypham = $mp->laymyphamtheoloai($loai_id);
            $mypham = $mp->laymypham();
            include("detail.php");
        }
        break;
    case "hoso":
        // $id = $_SESSION["nguoidung"]["id"];
        // $sogio = $gh->demgiohang($id);
        include("profile.php");
        break;
    case "xlhoso":
        $sua = new NGUOIDUNG();
        $id = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sdt = $_POST["txtsdt"];
        $tennd = $_POST["txttennd"];
        $hinhanh = $_POST["txthinhanh"];
        $diachi = $_POST["txtdiachi"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../img/user/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }

        $nd->capnhatnguoidung($id, $email, $sdt, $tennd, $hinhanh, $diachi);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        $giohang = laygiohang();
        include("profile.php");
        break;
    case "donmua":
        // $id = $_SESSION["nguoidung"]["id"];
        // $sogio = $gh->demgiohang($id);
        include("order.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xulydangnhap":

        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];

        // Kiểm tra tính hợp lệ của email và mật khẩu
        if (validateEmail($email) && validatePassword($matkhau)) {
            if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                if ($_SESSION["nguoidung"]["loaind_id"] == 2) {
                    $mypham = $mp->laymypham();
                    $loai = $lmp->layloaimypham();
                    include("main.php");
                } elseif ($_SESSION["nguoidung"]["loaind_id"] == 1) {
                    $mypham = $mp->laymypham();
                    header("Location:../admin/index.php");
                } else {
                    $thongbao = "Nhập sai mật khẩu hoặc email";
                    include("login.php");
                }
            } else {
                $thongbao = "Nhập sai mật khẩu hoặc email";
                include("login.php");
            }
        } else {
            $thongbao = "Mật khẩu hoặc email khôgn hợp lệ";
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "dangky":
        include("register.php");
        break;
    case "xulydangky":
        $them = new NGUOIDUNG();
        $them = $nd->settennd($_POST["txttennd"]);
        $them = $nd->setdiachi($_POST["txtdiachi"]);
        $them = $nd->setemail($_POST["txtemail"]);
        $them = $nd->setmatkhau($_POST["txtmatkhau"]);
        $them = $nd->setsdt("");
        $them = $nd->setloaind_id(2);

        $nd->themnguoidung($them);
        // $nguoidung = $nd->laynguoidungtheoid($_POST["txtid"]);
        // $mypham = $mp->laymypham();
        // $loai = $lmp->layloaimypham();
        include("profile.php");
        break;
    case "xemgiohang":
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "chovaogio":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["soluong"]))
            $soluong = $_REQUEST["soluong"];
        else
            $soluong = "1";
        if (isset($_SESSION["giohang"][$id])) {
            $soluong += $_SESSION["giohang"][$id];
            $_SESSION["giohang"][$id] = $soluong;
        } else {
            themhangvaogio($id, $soluong);
        }
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "giohang":
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $sanpham = $sp->laysanpham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "capnhatgio":
        if (isset($_REQUEST["mh"])) {
            $mh = $_REQUEST["mh"];
            foreach ($mh as $id => $soluong) {
                if ($soluong > 0)
                    capnhatsoluong($id, $soluong);
                else
                    xoamotmathang($id);
            }
        }
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "giamsoluong":
        if (isset($_REQUEST["id"])) {
            $mh = $_REQUEST["id"];
            giamsoluong($mh);
        }
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "tangsoluong":
        if (isset($_REQUEST["id"])) {
            $mh = $_REQUEST["id"];
            tangsoluong($mh);
        }
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "xoamathang":

        $mh = $_REQUEST["id"];
        xoamotmathang($mh);
        $giohang = laygiohang();
        $dh_dadat = $cthd->laychitiethoadon();
        $mypham = $mp->laymypham();
        $donhang = $hd->layhoadon();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "thanhtoan":
        // Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
        if ($isLogin == FALSE) {
            include("dangnhap.php");
        } else {
            $giohang = laygiohang();
            include("checkout.php");
        }
        break;
    case "luudonhang":
        //THÊM NGƯỜI DÙNG NẾU CHƯA CÓ TÀI KHOẢN
        // if (!isset($_SESSION["khachhang"])) {
        //     $email = $_POST["txtemail"];
        //     $hoten = $_POST["txthoten"];
        //     $sodienthoai = $_POST["txtsodienthoai"];
        //     $diachi = $_POST["txtdiachi"];

        //     // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa)
        //     // xử lý thêm...
        //     $kh = new NGUOIDUNG();
        //     $khachhang_id = $kh->themnguoidung($email, $sodienthoai, $hoten);
        // } else {

        //}
        $nguoidung_id = $_SESSION["nguoidung"]["id"];
        // lưu đơn hàng
        $dh = new HOADON();
        $ngayhd = date("Y-m-d");
        $tongtien = tinhtiengiohang();
        $donhang_id = $dh->themhoadon($nguoidung_id, $tongtien, $ngayhd);

        // lưu chi tiết đơn hàng
        $ct = new CHITITETHOADON();
        $giohang = laygiohang();
        foreach ($giohang as $id => $mh) {
            $dongia = $mh["giaban"];
            $soluong = $mh["soluong"];
            $thanhtien = $mh["thanhtien"];
            $ct->themchitietdonhang($donhang_id, $id, $dongia, $soluong, $thanhtien);
            $mh = new MYPHAM();
            $mh->capnhatsoluong($id, $soluong);
        }

        // xóa giỏ hàng
        xoagiohang();

        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "quenmatkhau":

        include("forgot-password.php");
        break;
    default:
        break;
}
