<?php
require("../model/database.php");
require("../model/mypham.php");
require("../model/loaimypham.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$mp = new MYPHAM();
$lmp = new LOAIMYPHAM();

switch ($action) {
    case "macdinh":
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "xemtatca":
        $mypham = $mp->laymypham();
        include("shop.php");
        break;

    default:
        break;
}

?>