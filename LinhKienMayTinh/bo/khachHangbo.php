<?php

include './dao/khachHangdao.php';
class khachHangbo {
    var $listKH;
    public function __construct() {
        $this->listKH=array();
    }
    public function getKhachHang(){
        $khdao= new khachHangdao();
        $this->listKH=$khdao->getKhachHang();
    }
    public function kiemTraDN($tk,$mk)
    {
        foreach($this->listKH as $value)
        {
            if($value->maKhachHang===$tk&&$value->matKhau==$mk)
            {
                return $value;
            }
        }
        return null;
    }
    public function getKH($maKhachHang) {
        foreach($this->listKH as $value)
        {
            if($value->maKhachHang===$maKhachHang)
            {
                return $value;
            }
        }
        return null;
    }
    public function dangKy($maKhachHang, $matKhau, $hoTen, $diaChi, $soDienThoai, $email)
    {
        $khdao= new khachHangdao();
        $khdao->dangKy($maKhachHang, $matKhau, $hoTen, $diaChi, $soDienThoai, $email);
    }
    public function capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email)
    {
         $khdao= new khachHangdao();
         $khdao->capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email);
    }
        public function doiMatKhau($maKhachHang,$matKhauMoi){
             $khdao= new khachHangdao();
             $khdao->doiMatKhau($maKhachHang, $matKhauMoi);
        }
}
