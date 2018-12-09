<?php

include './dao/hoaDondao.php';
class hoaDonbo {
    var $listhd;
    public function __construct() {
        $this->listhd=array();
    }
    public function getHoaDon(){
        $hddao= new hoaDondao();
        $this->listhd=$hddao->getHoadon();
    }
}
