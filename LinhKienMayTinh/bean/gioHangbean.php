<?php

class itemInCart {
    var $maLinhKien;
    var $tenLinhKien;
    var $donGia;
    var $soLuongMua;
    var $image;
    var $thanhTien;
    
    function __construct($maLinhKien, $tenLinhKien, $donGia, $soLuongMua, $image) {
        $this->maLinhKien = $maLinhKien;
        $this->tenLinhKien = $tenLinhKien;
        $this->donGia = $donGia;
        $this->soLuongMua = $soLuongMua;
        $this->image = $image;
        $this->thanhTien = $soLuongMua*$donGia;
    }
}
class Cart{
        var $lsItemInCart;
        public function __construct() {
            $this->lsItemInCart=array();
        }
        function addItemInCart($itemInCart){
            foreach ($this->lsItemInCart as $item){
                if($item->maLinhKien==$itemInCart->maLinhKien){
                    $item->soLuongMua+=$itemInCart->soLuongMua;
                    return;
                }
            }
            $this->lsItemInCart[]=$itemInCart;
        }
        function  deleteItemInCart($maLinhKien){
            foreach($this->lsItemInCart as $key=>$value){
                if($value->maLinhKien==$maLinhKien){
                    unset($this->lsItemInCart[$key]);
                    return;
                }
            }
        }
}
