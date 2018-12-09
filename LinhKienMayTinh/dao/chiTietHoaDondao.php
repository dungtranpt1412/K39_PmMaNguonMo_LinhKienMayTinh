<?php

class chiTietHoaDondao {
    public function themCTHD($maLinhKien,$soLuongMua,$maHoaDon){
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="insert into chitiethoadon(MaLinhKien,SoLuongMua,MaHoaDon) values('$maLinhKien','$soLuongMua','$maHoaDon')";
        $result = $conn->query($sql);
        if ($conn == null) {
            echo " conn: null";
        }
        if ($result == null) {

            echo " result: null";
        }
    }
}
