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
        if ($tinhtrang == "0") {
            $tinhtrang = 1;
            $hd->doitinhtrang($id, $tinhtrang);
        } 
            // load hóa đơn
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        $hoadon = $hd->layhoadon();
        include("main.php");
        break;
    case "hoantat":

        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
        $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "1") {
            $tinhtrang = 2;
            $hd->doitinhtrang($id, $tinhtrang);
        }
        //cập nhật thời gian giao hàng khi nhấn nút hoàn tất
        $hodonsua = new HOADON();
        $currentDateTime = date('Y-m-d H:i:s');
        $hd->capnhatngaygiaohang($id, $currentDateTime);

        // load hóa đơn
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        $hoadon = $hd->layhoadon();
        include("main.php");
        break;
    case "huydon":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
            $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        $tinhtrang = 3;
        $hd->doitinhtrang($id, $tinhtrang);
        // load hóa đơn
        $loai = $lnd->layloainguoidung();
        $nguoidung = $nd->laynguoidung();
        $hoadon = $hd->layhoadon();
        include("main.php");
        break;
    // case "xemchitiethd":
    //     if (isset($_REQUEST["txthoadon_id"]))
    //         $id = $_REQUEST["txthoadon_id"];
    //     if (isset($_REQUEST["id_hd"]))
    //         $id_hd = $_REQUEST["id_hd"];
    //     if($id == $id_hd)
        
    //     include("");

    //     // load hóa đơn
    //     $loai = $lnd->layloainguoidung();
    //     $nguoidung = $nd->laynguoidung();
    //     $hoadon = $hd->layhoadon();
    //     include("main.php");
    //     break;
        
    default:
        break;
}
