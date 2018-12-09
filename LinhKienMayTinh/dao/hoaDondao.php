<?php include './bean/hoaDonbean.php';?>
<?php

class hoaDondao {
    public function getHoadon(){
        $arr= array();
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="select * from hoadon";
        $result = $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }

        if ($result == null) {

            echo " result: null";
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $hoadon = new hoaDonbean($row["MaHoaDon"], $row["MaKhachHang"], $row["MaLinhKien"], $row["SoLuongMua"], $row["ThanhTien"], $row["NgayMua"]);
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
    public function themHD($maKhachHang,$daMua,$date){
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="insert into hoadon(MaKhachHang,DaMua,NgayMua) values('$maKhachHang','$daMua','$date')";
        $result = $conn->query($sql);
        if ($conn == null) {
            echo " conn: null";
        }
        if ($result == null) {

            echo " result: null";
        }
    }
    public function getMHD($date){
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="select * from hoadon where NgayMua='$date'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row["MaHoaDon"];
    }
}
