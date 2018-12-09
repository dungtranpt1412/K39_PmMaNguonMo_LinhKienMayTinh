<?php

class linhKienbean {
    var $maLinhKien;
    var $tenLinhKien;
    var $maLoaiLinhKien;
    var $soLuong;
    var $gia;
    var $nhaCungCap;
    var $baoHanh;
    var $image;
    
    function __construct($maLinhKien, $tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh, $image) {
        $this->maLinhKien = $maLinhKien;
        $this->tenLinhKien = $tenLinhKien;
        $this->maLoaiLinhKien = $maLoaiLinhKien;
        $this->soLuong = $soLuong;
        $this->gia = $gia;
        $this->nhaCungCap = $nhaCungCap;
        $this->baoHanh = $baoHanh;
        $this->image = $image;
    }
}
