<?php

include './dao/linhKiendao.php';
?>
<?php

class linhKienbo {

    var $listLK;

    public function __construct() {
        $this->listLK = array();
    }

    public function getLinhKien() {
        $lkdao = new linhKiendao();
        $this->listLK = $lkdao->getLinhKien();
        return $this->listLK;
    }

    public function getLinhKienTheoMa($maLoai) {
        $listLKTam = array();
        foreach ($this->listLK as $value) {
            if ($value->maLoaiLinhKien === $maLoai) {
                $listLKTam[] = $value;
            }
        }
        return $listLKTam;
    }

    public function getLinhKienTheoMaLinhKien($mlk) {
        foreach ($this->listLK as $value) {
            if ($value->maLinhKien === $mlk) {
                return $value;
            }
        }
        return null;
    }

    public function getLinhKienTheoTen($ten) {
        $listTam = array();
        foreach ($this->listLK as $value) {
            if (strpos($value->tenLinhKien, $ten) !== false) {
                $listTam[]=$value;
            }
        }
        return  $listTam;
    }
    public function suaLinhKien($maLinhKien,$tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh){
        $lkdao = new linhKiendao();
        $lkdao->suaLinhKien($maLinhKien, $tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh);
    }
    public function xoaLinhKien($maLinhKien) {
        $lkdao = new linhKiendao();
        return $lkdao->xoaLinhKien($maLinhKien);
    }
    public function themLinhKien($tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh,$image)
    {
        $lkdao = new linhKiendao();
        $lkdao->themLinhKien($tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh, $image);
    }
}
