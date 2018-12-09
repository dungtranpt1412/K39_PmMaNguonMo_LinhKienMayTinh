<?php
include './dao/loaiLinhKiendao.php';
class loaiLinhKienbo {
    var $listllk;
    public function __construct() {
        $this->listllk=array();
    }
    public function getLoaiLinhKien() {
        $llkdao = new loaiLinhKiendao();
        $this->listllk=$llkdao->getLoaiLinhKien();
        return $this->listllk;
    }
    public function xoaLoaiLinhKien($maLoaiLinhKien)
    {
         $llkdao = new loaiLinhKiendao();
         $llkdao->xoaLoaiLinhKien($maLoaiLinhKien);
    }
    public function suaLoaiLinhKien ($maLoaiLinhKien,$tenLoaiLinhKien)
    {
        $llkdao = new loaiLinhKiendao();
         $llkdao->suaLoaiLinhKien($maLoaiLinhKien, $tenLoaiLinhKien);
    }
    public function themLoaiLinhKien($tenLoaiLinhKien) {
         $llkdao = new loaiLinhKiendao();
         $llkdao->themLoaiLinhKien($tenLoaiLinhKien);
    }
}
