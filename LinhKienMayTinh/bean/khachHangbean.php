<?php

class khachHangbean {
    var $maKhachHang;
    var $matKhau;
    var $hoTen;
    var $quyen;
    var $diaChi;
    var $soDienThoai;
    var $email;
    
    function __construct($maKhachHang, $matKhau, $hoTen, $quyen, $diaChi, $soDienThoai, $email) {
        $this->maKhachHang = $maKhachHang;
        $this->matKhau = $matKhau;
        $this->hoTen = $hoTen;
        $this->quyen = $quyen;
        $this->diaChi = $diaChi;
        $this->soDienThoai = $soDienThoai;
        $this->email = $email;
    }

}
