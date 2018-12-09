
<?php
if(isset($_SESSION["cart"])){    
$cart=unserialize($_SESSION["cart"]);
$tong=0;
}
?>

<?php
if(isset($_SESSION["cart"])&&$_SESSION["sl"]!=0){?>
<table border="1" cellspacing="0" cellpading="0">
    <thead>
    <th style="text-align: center">Linh Kiện</th>
    <th style="text-align: center">Tên Linh Kiện</th>
    <th style="text-align: center">Giá</th>
    <th style="text-align: center">Số Lượng Mua</th>
    <th style="text-align: center">Thành Tiền</th>
    <th style="text-align: center">Xóa</th>
    </thead>
    <?php    foreach ($cart->lsItemInCart as $key){ ?>
    
    <tr>
        <td><img width="100" src="./<?php echo $key->image ?>"></td>
        <td><?php echo $key->tenLinhKien ?></td>
        <td><?php echo $key->donGia ?></td>
        <td style="text-align: center"><?php echo $key->soLuongMua ?></td>
        <td><?php echo $key->thanhTien  ?></td>
        <td><a href="index.php?p=10&action=3&mlk=<?php echo $key->maLinhKien?>"><img width="50" src="./image/trash.png"></a></td>
    </tr>
    <?php $tong+=$key->thanhTien; } ?>
</table>
<h1>Tổng tiền: <?php echo $tong ?> VNĐ</h1><br> 
<a href="index.php?p=10&action=2"><img width="200" src="./image/dat-mua-ngay.png"></a>
<?php } ?>

<?php 

?>