<?php
session_start();
include('./bo/loaiLinhKienbo.php');
include('./bo/linhKienbo.php');
include('./bo/khachHangbo.php');
include './dao/hoaDondao.php';
include './dao/chiTietHoaDondao.php';
?>
<?php
$p;
if(!isset($_GET["p"]))
{
    $p=1;
}
if (isset($_GET["dx"]) && $_GET["dx"] == 1) {
    session_destroy();
    header("Location: index.php");
}
?>
<?php
include './bean/gioHangbean.php';
//thêm giỏ hàng
if(isset($_GET["action"])){
    if($_GET["action"]==1&&isset($_POST["butThem"])){
    $maLinhKien=$_GET["mlk"];
    $tenLinhKien=$_GET["tlk"];
    $donGia= $_GET["gia"];
    $soLuongMua=$_POST["txtSL"];
    if($soLuongMua<0)
    {
        $soLuongMua=0;
    }
    $image=$_GET["img"];
    
    $itemInCart= new itemInCart($maLinhKien,$tenLinhKien,$donGia,$soLuongMua,$image);
    $cart;
    if(isset($_SESSION["cart"]))
        $cart=unserialize($_SESSION["cart"]);
    else
        $cart= new Cart();
    $cart->addItemInCart($itemInCart);
    $_SESSION["cart"]=serialize($cart);
    $_SESSION["sl"]= count($cart->lsItemInCart);
    }
    //xóa giỏ hàng
    if($_GET["action"]==3){
        $cart=unserialize($_SESSION["cart"]);
        $maLinhKien=$_GET["mlk"];
        $cart->deleteItemInCart($maLinhKien);
        $_SESSION["cart"]=serialize($cart);
        $_SESSION["sl"]= count($cart->lsItemInCart);
    }
    //thanh toán
    if($_GET["action"]==2 )
    {
        if(isset($_SESSION["user"])){
        $cart=unserialize($_SESSION["cart"]);
        $daMua=count($cart->lsItemInCart);
        $dt = new DateTime();
        $date= $dt->format('Y-m-d H:i:s');
        $maKhachHang=$_SESSION["user"];
        $hd= new hoaDondao();
        $hd->themHD($maKhachHang, $daMua,$date);
        $maHoaDon= $hd->getMHD($date);
        $cthd= new chiTietHoaDondao();
        foreach ($cart->lsItemInCart as $key){
            $cthd->themCTHD($key->maLinhKien, $key->soLuongMua, $maHoaDon);
        }
        unset($_SESSION["cart"]);
        unset($_SESSION["sl"]);
        header("Location: index.php");
        }
        else
            header("Location: index.php?p=2");
    }   
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
        include ("blocks/navbar.php");
        ?>
        <div class="row">
            <div class="col-lg-2">
                <div>
                    <?php
                    include ("blocks/listLoai.php");
                    ?>
                </div>
            </div>
            <div class="col-lg-10">
                <?php
                if (isset($_GET["p"])) {
                    $p = $_GET["p"];
                }
                    switch ($p) {
                        case 1: {
                                include ("pages/p1_TimLinhKienTheoLoai.php");
                                break;
                            }
                        case 2: {
                                include ("pages/p2_DangNhap.php");
                                break;
                            }
                        case 3: {
                                include ("pages/p3_MuaHang.php");
                                break;
                            }
                            
                        case 4:{
                            include ("pages/p4_DangKyTaiKhoan.php");
                                break;
                        }
                        case 7:{
                             include ("pages/p7_CapNhatThongTin.php");
                                break;
                        }
                        case 8:{
                            include ("pages/p8_DoiMatKhau.php");
                                break;
                        }
                        case 10:{
                            include ("pages/p10_GioHang.php");
                        break;
                    
                        }
                    }
                
                ?>
            </div>
        </div>
    </body>
</html>
