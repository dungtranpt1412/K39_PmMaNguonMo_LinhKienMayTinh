<?php
$maKhachHang = $_SESSION["user"];
$khbo = new khachHangbo();
$khbo->getKhachHang();
$kh = $khbo->getKH($maKhachHang);
?>
<?php
if (isset($_POST["butCapNhat"])) {
    $maKhachHang = $_POST["txtMaTaiKhoan"];
    $hoTen = $_POST["txtHoTen"];
    $diaChi = $_POST["txtDiaChi"];
    $soDienThoai = $_POST["txtSDT"];
    $email = $_POST["txtEmail"];
    if (is_numeric($soDienThoai)) {
        $khbo = new khachHangbo();
        $khbo->capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email);
        header("Location: index.php?p=7&tb=1");
    } else {
        echo "Số Điện Thoại Không Đúng";
    }
}
?>
<?php
    if(isset($_GET["tb"]))
    {
        if($_GET["tb"]==1)
        {
            echo "Cập Nhật Thành Công";
        }
    }
?>
<form method="POST" action="index.php?p=7">
    Tài Khoản<input class="form-control" required type="text" readonly name="txtMaTaiKhoan" value="<?php echo $maKhachHang ?>"><br>
    Họ Tên<input class="form-control" required type="text" required  name="txtHoTen" value="<?php echo $kh->hoTen ?>"><br>
    Địa Chỉ<input class="form-control" required type="text" required name="txtDiaChi" value="<?php echo $kh->diaChi ?>"><br>
    Số Điện Thoại <input class="form-control" required type="text" required name="txtSDT" value="<?php echo $kh->soDienThoai ?>"><br>
    Email <input type="email" class="form-control" required name="txtEmail" value="<?php echo $kh->email ?>"><br>
    <input type="submit" name="butCapNhat" value="Cập Nhật">
    <button><a href="index.php?p=8">Đổi Mật Khẩu</a></button>
</form>

