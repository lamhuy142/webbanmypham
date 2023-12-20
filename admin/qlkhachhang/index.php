<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/loainguoidung.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$lnd = new LOAINGUOIDUNG();
$nd = new NGUOIDUNG();

switch ($action) {
    case "xem":
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        include("main.php");
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
            $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "1") {
            $tinhtrang = 0;
            $nd->doitinhtrang($id, $tinhtrang);
        } else {
            $tinhtrang = 1;
            $nd->doitinhtrang($id, $tinhtrang);
        }
        // load người dùng
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        include("main.php");
        break;
    case "them":
        $loai = $lnd->layloainguoidung();
        include("add.php");
        break;
    case "xulythem":
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý thêm mặt hàng
        $nguoidungmoi = new NGUOIDUNG();
        $nguoidungmoi->setemail($_POST["txtemail"]);
        $nguoidungmoi->setsdt($_POST["txtsodienthoai"]);
        $nguoidungmoi->setdiachi($_POST["txtdiachi"]);
        $nguoidungmoi->setmatkhau($_POST["txtmatkhau"]);
        $nguoidungmoi->settennd($_POST["txthoten"]);
        $nguoidungmoi->setloaind_id($_POST["optquyen"]);
        $nguoidungmoi->settinhtrang($_POST["txttrangthai"]);
        $nguoidungmoi->sethinhanh($hinhanh);
        // thêm
        $nd->themnguoidung($nguoidungmoi);
        // load người dùng
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        include("main.php");
        break;
    case "xoa":
        $xoa = new NGUOIDUNG();
        $xoa->setid($_GET["id"]);
        $nguoidung = $nd->xoanguoidung($xoa);
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        include("main.php");
        break;
    default:
        break;
}
