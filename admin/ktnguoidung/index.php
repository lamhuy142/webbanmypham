<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/loainguoidung.php");

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

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
}
$nd = new NGUOIDUNG();
$lnd = new LOAINGUOIDUNG();
switch ($action) {
    case "macdinh":
        include("main.php");
        break;
    case "hoso":
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
        include("profile.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xulydangnhap":

        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtpassword"];

        // Kiểm tra tính hợp lệ của email và mật khẩu
        if (validateEmail($email) && validatePassword($matkhau)) {
            if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                if ($_SESSION["nguoidung"]["loaind_id"] == 1) {
                    include("main.php");
                } elseif ($_SESSION["nguoidung"]["loaind_id"] == 2) {
                    header("Location:../../public/index.php");
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
    default:
        break;
}
