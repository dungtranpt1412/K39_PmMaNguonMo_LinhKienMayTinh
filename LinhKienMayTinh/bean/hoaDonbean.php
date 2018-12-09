<?php

class hoaDonbean {
    var $maHoaDon;
    var $maKhachHang;
    var $maLinhKien;
    var $soLuongMua;
    var $thanhTien;
    var $ngayMua;
    
    function __construct($maHoaDon, $maKhachHang, $maLinhKien, $soLuongMua, $ngayMua) {
        $this->maHoaDon = $maHoaDon;
        $this->maKhachHang = $maKhachHang;
        $this->maLinhKien = $maLinhKien;
        $this->soLuongMua = $soLuongMua;
        $this->thanhTien = $thanhTien;
        $this->ngayMua = $ngayMua;
    }
}
