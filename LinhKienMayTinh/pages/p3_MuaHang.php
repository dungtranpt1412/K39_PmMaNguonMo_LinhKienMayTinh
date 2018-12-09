<?php
   $mlk=$_GET["mlk"];
   $linhKienbo = new linhKienbo();
   $linhKienbo->getLinhKien();
   $lk=$linhKienbo->getLinhKienTheoMaLinhKien($mlk);
?>
<table border="1" cellspacing="0" cellpading="0">
    <tr >
        <th style="text-align: center">Linh Kiện</th>
        <th style="text-align: center">Tên Linh Kiện</th>
        <th style="text-align: center">Giá</th>
        <th style="text-align: center">Số lượng</th>
        <th style="text-align: center">Thêm vào giỏ</th>
    </tr>
    <tr>
        <form action="index.php?action=1&mlk=<?php echo $lk->maLinhKien?>&tlk=<?php echo $lk->tenLinhKien?>&sl=<?php?>&gia=<?php echo $lk->gia?>&img=<?php echo $lk->image?>" method="POST">
        <td><img  width="200px" src="./<?php echo $lk->image?>"></td>
        <td><?php echo $lk->tenLinhKien?></td>
        <td><?php echo $lk->gia?> VNĐ</td>    
        <td><input type="number" value="1" name="txtSL"></td>
        <td><button type="submit" name="butThem"><image src="image/gh.png" width="200px"></button></td>
    </form>   
    </tr>
</table>