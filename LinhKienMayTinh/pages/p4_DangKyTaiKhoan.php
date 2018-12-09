<form method="POST" action="index.php?p=4">
    <div class="form-group" style="width: 500px">
        <label><b>Tài Khoản</b></label>
        <input type="text" class="form-control" placeholder="Enter Username" name="txtTK" required>

        <label><b>Mật Khẩu</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="txtMK" required>
        <label><b>Họ Tên</b></label>
        <input type="text" class="form-control" placeholder="Enter Name" name="txtName" required>
        <label><b>Địa Chỉ</b></label>
        <input type="text" class="form-control" placeholder="Enter Address" name="txtDC" required>
        <label><b>Số Điện Thoại</b></label>
        <input type="text" class="form-control" placeholder="Enter NumberPhone" name="txtSDT" required>
        <label><b>Email</b></label>
        <input type="email" class="form-control" placeholder="Enter Email" name="txtEmail" required>
        <input type="submit" value="Đăng Ký" name="butDK">
    </div>
</form>
<?php
if (isset($_POST["butDK"])) {
    $maTK = $_POST["txtTK"];
    $khbo = new khachHangbo();
    $khbo->getKhachHang();
    if ($khbo->getKH($maTK) == NULL) {
        $matKhau = $_POST["txtMK"];
        $hoTen = $_POST["txtName"];
        $diaChi = $_POST["txtDC"];
        $soDienThoai = $_POST["txtSDT"];
        $email = $_POST["txtEmail"];
        $khbo->dangKy($maTK, $matKhau, $hoTen, $diaChi, $soDienThoai, $email);
        echo 'Đăng Ký Thành Công';
    } else {
        echo "Tài Khoản Đã Trùng";
    }
}
?>
