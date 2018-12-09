<?php include './bean/khachHangbean.php';?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of khachHangdao
 *
 * @author dungt
 */
class khachHangdao {
    //put your code here
    public function getKhachHang(){
        $arr= array();
        //$conn=basicdao::getConnection();
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="select * from khachhang";
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
                $khachHang= new khachHangbean($row["MaKhachHang"], $row["MatKhau"], $row["HoTen"], $row["Quyen"], $row["DiaChi"], $row["SoDienThoai"],$row["Email"] );
                $arr[]=$khachHang;   
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $arr;
    }
    public function dangKy($maKhachHang, $matKhau, $hoTen, $diaChi, $soDienThoai, $email)
    {
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="INSERT INTO `khachhang`(`MaKhachHang`, `MatKhau`, `HoTen`, `Quyen`, `DiaChi`, `SoDienThoai`, `Email`) VALUES ('$maKhachHang', '$matKhau', '$hoTen',"."0".", '$diaChi', '$soDienThoai', '$email')";
        $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }
        mysqli_close($conn);
        
    }
    public function capNhat($maKhachHang, $hoTen, $diaChi, $soDienThoai, $email)
    {
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="UPDATE `khachhang` SET `HoTen`='$hoTen',`DiaChi`='$diaChi',`SoDienThoai`='$soDienThoai',`Email`='$email' WHERE MaKhachHang='$maKhachHang'";
        $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }
        mysqli_close($conn);
    }
    public function doiMatKhau($maKhachHang,$matKhauMoi){
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="UPDATE `khachhang` SET `MatKhau`='$matKhauMoi'WHERE MaKhachHang='$maKhachHang'";
        $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }
        mysqli_close($conn);
    }
}
