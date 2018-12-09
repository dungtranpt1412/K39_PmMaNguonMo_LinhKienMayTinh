<?php
$listLK = array();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtSearch"])) {
    $ten = $_POST["txtSearch"];
    if (trim($ten) !== "") {
        $linhKienbo = new linhKienbo();
        $linhKienbo->getLinhKien();
        $listLK = $linhKienbo->getLinhKienTheoTen($ten);
    }
 else {
         $linhKienbo = new linhKienbo();
        $listLK = $linhKienbo->getLinhKien();
    }
} else {
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["ml"])) {
        $maLoai = $_GET["ml"];
        $linhKienbo = new linhKienbo();
        $linhKienbo->getLinhKien();
        $listLK = $linhKienbo->getLinhKienTheoMa($maLoai);
    } else {
        $linhKienbo = new linhKienbo();
        $listLK = $linhKienbo->getLinhKien();
    }
}
?>
<?php if ($listLK !== null) { ?>
    <div class="row">
        <?php
        foreach ($listLK as $value) {
            ?>
            <div class="col-lg-4" style="height: 500px">

                <img src="<?php echo $value->image ?>" width="200px" height="200px"><br>
                <div style="width: 300px">
                    <?php
                    echo ("<h3 style='color:red'><b>Tên Linh Kiện</b></h3>" . $value->tenLinhKien . "<br>");
                    ?></div><?php
                echo ("<b>Giá: $value->gia Đồng</b><br>");
                echo ("<b>Nhà Cung Cấp: </b>" . $value->nhaCungCap . "<br>");
                echo ("<b>Bảo Hành: </b>" . $value->baoHanh . "<br>");
                ?>
                <a href="index.php?p=3&mlk=<?php echo $value->maLinhKien ?>"><img src="image/buynow.jpg"><br></a>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>