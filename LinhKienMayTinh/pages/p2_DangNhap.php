<?php if (!isset($_SESSION["user"])) { ?>
    <form method="POST" action="#">
        <div class="form-group" style="width: 300px">
            <label>Tài Khoản:</label>
            <input type="text" class="form-control" name="txtTK">
            <label>Mật Khẩu:</label>
            <input type="password" class="form-control" name="txtMK">
            <input type="submit" name="butDN" value="Đăng Nhập">        
            <button><a href="index.php?p=4">Đăng Ký</a></button>
        </div>
    </form>
<?php
} else {
    header("Location: index.php");
}
?>
<?php
if (isset($_POST["txtTK"]) && isset($_POST["txtMK"])) {
    $tk = $_POST["txtTK"];
    $mk = $_POST["txtMK"];
    $khbo = new khachHangbo();
    $khbo->getKhachHang();
    $kh = $khbo->kiemTraDN($tk, $mk);
    if ($kh == null) {
        echo("Tài Khoản Hoặc Mật Khẩu Không Đúng!");
    } else {
        $_SESSION["user"] = $tk;
        $_SESSION["userName"] = $kh->hoTen;
        $_SESSION["quyen"] = $kh->quyen;
        header("Location: index.php");
    }
}
?>
