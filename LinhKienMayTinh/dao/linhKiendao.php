<?php include './bean/linhKienbean.php'; ?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of linhKiendao
 *
 * @author dungt
 */
class linhKiendao {

    //put your code here
    public function getLinhKien() {
        $arr = array();
        //$conn=basicdao::getConnection();
        $conn = mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "select * from linhkien";
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
                $linhkien = new linhKienbean($row["MaLinhKien"], $row["TenLinhKien"], $row["MaLoaiLinhKien"], $row["SoLuong"], $row["Gia"], $row["NhaCungCap"], $row["BaoHanh"], $row["image"]);
                $arr[] = $linhkien;
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $arr;
    }

    public function suaLinhKien($maLinhKien, $tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh) {
        $conn = mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "UPDATE `linhkien` SET `TenLinhKien`='$tenLinhKien',`MaLoaiLinhKien`='$maLoaiLinhKien',`SoLuong`=$soLuong,`Gia`=$gia,`NhaCungCap`='$nhaCungCap',`BaoHanh`='$baoHanh' WHERE MaLinhKien='$maLinhKien'";
        $conn->query($sql);
        mysqli_close($conn);
    }

    public function xoaLinhKien($maLinhKien) {
        $conn = mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "select * from chitiethoadon where MaLinhKien='$maLinhKien'";
        $result = $conn->query($sql);
        if ($result == null) {

            echo " result: null";
        }

        if ($result->num_rows > 0) {
            mysqli_free_result($result);
            mysqli_close($conn);
            return -1;
        }
        $sql = "delete from linhkien where MaLinhKien='$maLinhKien'";
        $conn->query($sql);
        mysqli_free_result($result);
        mysqli_close($conn);
        return 1;
    }
    public function themLinhKien($tenLinhKien, $maLoaiLinhKien, $soLuong, $gia, $nhaCungCap, $baoHanh,$image)
    {
         $conn = mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql = "INSERT INTO `linhkien`(`TenLinhKien`, `MaLoaiLinhKien`, `SoLuong`, `Gia`, `NhaCungCap`, `BaoHanh`, `image`) VALUES ('$tenLinhKien', '$maLoaiLinhKien', $soLuong, $gia, '$nhaCungCap', '$baoHanh','$image')";
        $conn->query($sql);
        mysqli_close($conn);
    }

}
