<?php
    $loaibo = new loaiLinhKienbo();
    $lis=$loaibo->getLoaiLinhKien();
    ?>
<ul class="list-group">
    <?php
    foreach ($lis as $key=>$value) {?>
    <li class="list-group-item"><a href=<?php echo("index.php?p=1&ml="."$value->maLoaiLinhKien")?>><?php echo $value->tenLoaiLinhKien?></a></li>
<?php    
}
?>
</ul>

