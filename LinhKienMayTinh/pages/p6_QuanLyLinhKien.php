<?php
$lkbo = new linhKienbo();
$lkbo->getLinhKien();
$lsLK = array();
if (isset($_POST["txtSearch"])) {
    $ten = $_POST["txtSearch"];
    $lsLK = $lkbo->getLinhKienTheoTen($ten);
} else {
    $lsLK = $lkbo->getLinhKien();
}
?>
<?php
if (isset($_GET["xoalk"])) {
    $maLinhKien = $_GET["xoalk"];
    if ($lkbo->xoaLinhKien($maLinhKien) == 1) {
        unlink($_GET["filename"]);
        header("Location: quanLy.php?p=6");
    } else {
        echo "Không thể xóa linh kiện đã tồn tại trong các hóa đơn";
    }
}
?>
<?php
if (isset($_POST["butSua"])) {
    $maLinhKien = $_POST["txtMaLinhnKien"];
    $tenLinhKien = $_POST["txtTenLK"];
    $maLoaiLinhKien = $_POST["txtLoaiLinhKien"];
    $soLuong = $_POST["txtSoLuong"];
    $gia = $_POST["txtGia"];
    $nhaCungCap = $_POST["txtNCC"];
    $baoHanh = $_POST["txtBH"];
    $lkbo->suaLinhKien($maLinhKien, $tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh);
    header("Location: quanLy.php?p=6");
}
if (!isset($_GET["sualk"])) {
    ?>
    <button><a href="quanLy.php?p=9">Thêm <span class="glyphicon">&#x2b;</span></a></button><hr
    <?php
}
?>
<?php
if (isset($_GET["sualk"])) {
    $mlk = $_GET["sualk"];
    $linhKien = $lkbo->getLinhKienTheoMaLinhKien($mlk);
    $lbo = new loaiLinhKienbo();
    $lsLoai = $lbo->getLoaiLinhKien();
    ?>
        <div style="width: 500px">
        <form method="POST" action="quanLy.php?p=6">
            Mã Linh Kiện<input class="form-control" type="text" readonly name="txtMaLinhnKien" value="<?php echo $linhKien->maLinhKien; ?>"><br>
            Tên Linh Kiện<input class="form-control" type="text" name="txtTenLK" required value="<?php echo $linhKien->tenLinhKien; ?>"><br>    
            Số Lượng<input class="form-control" type="text" name="txtSoLuong" required value="<?php echo $linhKien->soLuong; ?>"><br>
            Giá<input class="form-control" type="text" name="txtGia" value="<?php echo $linhKien->gia; ?>"><br>
            Nhà Cung Cấp<input class="form-control" type="text" name="txtNCC" required value="<?php echo $linhKien->nhaCungCap; ?>"><br>
            Bảo Hành<input class="form-control" type="text" name="txtBH" required value="<?php echo $linhKien->baoHanh; ?>"><br>
            Loại Linh Kiện<select class="form-control" name="txtLoaiLinhKien">
    <?php
    foreach ($lsLoai as $value) {
        if ($linhKien->maLoaiLinhKien === $value->maLoaiLinhKien) {
            ?>
                        <option selected="<?php $value->maLoaiLinhKien ?>" value="<?php echo $value->maLoaiLinhKien ?>"><?php echo $value->tenLoaiLinhKien ?></option>
                        <?php
                        continue;
                    }
                    ?>
                    <option value="<?php echo $value->maLoaiLinhKien ?>"><?php echo $value->tenLoaiLinhKien ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="butSua">Sửa <span class="glyphicon">&#xe136;</span></button>
        </form>
    </div>
    <?php
} else {
    ?>
    <div class="row">
    <?php
    foreach ($lsLK as $value) {
        ?>
            <div class="col-lg-4" style="height: 500px">

                <img src="<?php echo $value->image ?>" width="200px" height="200px"><br>
        <div style="width: 300px">
        <?php
        echo ("<h3 style='color:red'><b>Tên Linh Kiện</b></h3>" . $value->tenLinhKien . "<br>");
        ?></div><?php
        ?><b>Số Lượng: </b><?php echo $value->soLuong . "<br>";
        ?><b>Giá: </b><?php echo $value->gia . "<br>";
        ?><b>Nhà Cung Cấp:</b><?php echo $value->nhaCungCap . "<br>";
        ?><b>Bảo Hành: </b><?php echo $value->baoHanh . "<br>";
        ?>
                <button><a href="quanLy.php?p=6&sualk=<?php echo $value->maLinhKien ?>">Sửa <span class="glyphicon">&#xe136;</span></a></button>
                <button><a href="quanLy.php?p=6&xoalk=<?php echo $value->maLinhKien ?>&filename=<?php echo $value->image ?>">Xóa <span class="glyphicon">&#xe020;</span></a></button>
            </div>
        <?php
    }
    ?>
    </div>
    <?php } ?>