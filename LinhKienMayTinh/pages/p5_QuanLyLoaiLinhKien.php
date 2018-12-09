
<?php
$lbo = new loaiLinhKienbo();
$lkbo = new linhKienbo();
$lkbo->getLinhKien();
$lbo->getLoaiLinhKien();
$listLK = $lbo->getLoaiLinhKien();
?>
<?php
if (isset($_GET["xoaloai"])) {
    $txtml = $_GET["xoaloai"];
    if ($lkbo->getLinhKienTheoMa($txtml) == null) {
        $lbo->xoaLoaiLinhKien($txtml);
        header("Location: quanLy.php?p=5");
    } else {
        echo "Loại Đang Có Sản Phẩm, Không Thể Xóa";
    }
}
?>
<?php
if (isset($_GET["sualoai"])) {
    $txtml = $_GET["sualoai"];
    ?>
    <form method="POST" action="quanLy.php?p=5&sualoai=<?php echo $txtml ?>">
        Tên Loại: <input type="text" name="txtTL">
        <input class="button" type="submit" value="Sửa">
        <button><a href="quanLy.php">Quay Lại</a></button>
    </form>
    <?php
    if (isset($_POST["txtTL"])) {
        $txtTL=$_POST["txtTL"];
        $lbo->suaLoaiLinhKien($txtml, $txtTL);
        header("Location: quanLy.php?p=5");
    }
}
 else {?>
   <form method="POST" action="quanLy.php?p=5">
       Tên Loại: <input type="text" name="txtTL" required>
       <button type="submit" name="butThem">Thêm <span class="glyphicon">&#x2b;</span></button>
    </form>
<?php
 }
?>
<?php
    if(isset($_POST["butThem"]))
    {
        $tenllk=$_POST["txtTL"];
        $lbo->themLoaiLinhKien($tenllk);
        header("Location: quanLy.php?p=5");
        
    }
?>
<table class="table table-striped table-bordered">
    <tr>
        <th> Tên Loại Linh Kiện</th>
        <th> Chức Năng </th>
    </tr>
    <?php
    foreach ($listLK as $value) {
        ?>
        <tr>
            <td>
                <?php echo $value->tenLoaiLinhKien ?>
            </td>
            <td>
                <button><a href="quanLy.php?p=5&sualoai=<?php echo $value->maLoaiLinhKien ?>">Sửa <span class="glyphicon">&#xe136;</span></a></button>
                <button><a href="quanLy.php?p=5&xoaloai=<?php echo $value->maLoaiLinhKien ?>">Xóa <span class="glyphicon">&#xe020;</span></a></button>
            </td>
        </tr>
        <?php
    }
    ?>
</table>