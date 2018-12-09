<?php
session_start();
include('./bo/hoaDonbo.php');
include('./bo/loaiLinhKienbo.php');
include('./bo/linhKienbo.php');
include('./bo/khachHangbo.php');
if ($_SESSION["quyen"] !== "1") {
    header("Location: index.php");
}
$p;
if (!isset($_GET["p"])) {
    $p = 5;
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
<?php
include ("blocks/navbarQuanLy.php");
?>
        <div class="row">
            <div class="col-lg-2">
                <div>
<?php
include ("blocks/chucNangQuanLy.php");
?>
                </div>
            </div>
            <div class="col-lg-10">
<?php
if (isset($_GET["p"])) {
    $p = $_GET["p"];
}
switch ($p) {
    case 5: {
            include ("pages/p5_QuanLyLoaiLinhKien.php");
            break;
        }
    case 6: {
            include ("pages/p6_QuanLyLinhKien.php");
            break;
        }
    case 9: {
            include ("pages/p9_ThemLinhKien.php");
            break;
        }
}
?>
            </div>
        </div>
    </body>
</html>
