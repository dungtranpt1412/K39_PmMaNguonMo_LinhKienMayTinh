<?php
if (isset($_POST["butDoiMK"])) {
    $khbo = new khachHangbo();
    $khbo->getKhachHang();
    $maKhachHang = $_SESSION["user"];
    $matKhauCu = $_POST["txtMKC"];
    $matKhauMoi = $_POST["txtMKM"];
    $xacNhanMatKhau = $_POST["txtXNMK"];
    if ($khbo->getKH($maKhachHang)->matKhau===$matKhauCu) {
        if ($matKhauMoi === $xacNhanMatKhau) {
            $khbo->doiMatKhau($maKhachHang, $matKhauMoi);
            echo 'Đổi Mật Khẩu Thành Công';
        } else {
            echo "Mật Khẩu Không Khớp";
        }
    } else {
        echo 'Mật Khẩu Cũ Không Đúng';
    }
}
?>
<div style="width: 300px">
<form method="POST" action="index.php?p=8">
    Mật Khẩu Cũ<input class="form-control" required type="password" name="txtMKC"><br>
    Mật Khẩu Mới<input class="form-control" required type="password" name="txtMKM"><br>
    Xác Nhận Mật Khẩu<input class="form-control" required type="password" name="txtXNMK"><br>
    <input type="submit" name="butDoiMK" value="Đổi Mật Khẩu">    
</form>
</div>
