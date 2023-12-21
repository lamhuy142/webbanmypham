<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/hoadon.php");
require("../../model/nguoidung.php");
require("../../model/loainguoidung.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$hd = new HOADON();
$nd = new NGUOIDUNG();
$lnd = new LOAINGUOIDUNG();

switch ($action) {
    case "xem":
        $nguoidung = $nd->laynguoidung();
        $hoadon = $hd->layhoadon();
        include("main.php");
        break;
    // case "xoa":
    //     $xoa = new HOADON();
    //     $xoa->setid($_GET["id"]);
    //     $hoadon = $hd->xoahoadon($xoa);
        
    //     $nguoidung = $nd->laynguoidung();
    //     $hoadon = $hd->layhoadon();
    //     include("main.php");
    //     break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
            $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "1") {
            $tinhtrang = 0;
            $hd->doitinhtrang($id, $tinhtrang);
        } else {
            $tinhtrang = 1;
            $hd->doitinhtrang($id, $tinhtrang);
        }
        // load người dùng
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        $hoadon = $hd->layhoadon();
        include("main.php");
        break;
    default:
        break;
}
