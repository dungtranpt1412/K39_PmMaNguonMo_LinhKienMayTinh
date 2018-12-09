<?php include './bean/loaiLinhKienbean.php';?>
<?php
class loaiLinhKiendao {
    public function getLoaiLinhKien(){
        $arr= array();
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="select * from loailinhkien";
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
                $loaiLinhKien= new loaiLinhKienbean($row["MaLoaiLinhKien"], $row["TenLoaiLinhKien"]);
                $arr[]=$loaiLinhKien;   
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $arr;
    }
    public function themLoaiLinhKien($tenLoaiLinhKien) {
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="INSERT INTO `loailinhkien`(`TenLoaiLinhKien`) VALUES ('$tenLoaiLinhKien')";
        $conn->query($sql);
        mysqli_close($conn);
    }
    public function xoaLoaiLinhKien($maLoaiLinhKien)
    {
        $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="DELETE FROM `loailinhkien` WHERE MaLoaiLinhKien='$maLoaiLinhKien'";
        $conn->query($sql);
        mysqli_close($conn);
    }
    public function suaLoaiLinhKien ($maLoaiLinhKien,$tenLoaiLinhKien)
    {
         $conn= mysqli_connect("localhost", "root", "", "lkmt");
        mysqli_set_charset($conn, 'UTF8');
        $sql="UPDATE `loailinhkien` SET `TenLoaiLinhKien`='$tenLoaiLinhKien' WHERE MaLoaiLinhKien='$maLoaiLinhKien'";
        $conn->query($sql);
        mysqli_close($conn);
    }
}
?>