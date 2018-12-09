<?php
$lbo = new loaiLinhKienbo();
$lsLoai = $lbo->getLoaiLinhKien();
$lkbo = new linhKienbo();
?>
<?php
// Ấn định  dung lượng file ảnh upload
define("MAX_SIZE", "100");

// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

//This variable is used as a flag. The value is initialized with 0 (meaning no
// error  found)
//and it will be changed to 1 if an errro occures.
//If the error occures the file will not be uploaded.
$errors = 0;
//checks if the form has been submitted
if (isset($_POST['butThem'])) {
// lấy tên file upload
    $image = $_FILES['image']['name'];
// Nếu nó không rỗng
    if ($image) {
// Lấy tên gốc của file
        $filename = stripslashes($_FILES['image']['name']);
//Lấy phần mở rộng của file
        $extension = getExtension($filename);
        $extension = strtolower($extension);
// Nếu nó không phải là file hình thì sẽ thông báo lỗi
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
// xuất lỗi ra màn hình
            echo '<h1>Đây không phải là file hình!</h1>';
            $errors = 1;
        } else {
//Lấy dung lượng của file upload
            $size = filesize($_FILES['image']['tmp_name']);
            if ($size > MAX_SIZE * 1024) {
                echo '<h1>Vượt quá dung lượng cho phép!</h1>';
                $errors = 1;
            }

// đặt tên mới cho file hình up lên
            $image_name = time() . '.' . $extension;
// gán thêm cho file này đường dẫn
            $newname = "image/" . $image_name;
            copy($_FILES['image']['tmp_name'], $newname);
        }
    }
}

if (isset($_POST['butThem']) && !$errors) {
    $tenLinhKien = $_POST["txtTenLK"];
    $maLoaiLinhKien = $_POST["txtLoaiLinhKien"];
    $soLuong = $_POST["txtSL"];
    if($soLuong<0)
    {
        $soLuong=0;
    }
    $gia = $_POST["txtGia"];
    if($gia<0)
    {
        $gia=0;
    }
    $nhaCungCap = $_POST["txtNCC"];
    $baoHanh = $_POST["txtBH"];
    $lkbo->themLinhKien($tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh, $newname);
    echo "<h1>File hình đã được Upload thành công </h1>";
}
?>
<form method="POST" action="quanLy.php?p=9" enctype="multipart/form-data">
    <div class="form-group" style="width: 500px">
    Tên Linh Kiện<input type="text" class="form-control" name="txtTenLK" required><br>
    Số Lượng <input type="number" class="form-control" name="txtSL" required value="0"><br>
    Giá <input type="number" class="form-control" name="txtGia" required value="0"><br>
    Nhà Cung Cấp <input type="text" class="form-control" name="txtNCC" required><br>
    Bảo Hàng <input type="text" class="form-control" name="txtBH" required><br>
    Ảnh <input type="file" class="form-control-file" name="image"><br>
    Loại<select class="form-control"  name="txtLoaiLinhKien">
<?php foreach ($lsLoai as $value) { ?>
            <option value="<?php echo $value->maLoaiLinhKien ?>"><?php echo $value->tenLoaiLinhKien ?></option>
<?php } ?>
    </select>
    <input type="submit" class="btn btn-default"  name="butThem" value="Thêm">
    </div>
</form>