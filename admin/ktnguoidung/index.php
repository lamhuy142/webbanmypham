<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/loainguoidung.php");
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
    
    default:
        break;
}
