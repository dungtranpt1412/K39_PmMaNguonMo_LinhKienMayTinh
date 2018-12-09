<script language="javascript">
    function dangxuat() {
        if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
            window.location.href = "index.php?dx=1";
        } else {

        }
    }
</script>
<?php
    if(isset($_SESSION["sl"]))
    {
        $count= $_SESSION["sl"];
    }
    else
        $count=0;
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Cửa Hàng Linh Kiện Máy Tính</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Trang Chủ</a></li>
            <?php if (!isset($_SESSION["user"])) {
                ?>
                <li><a href="index.php?p=2">Đăng Nhập</a></li> 
                <?php
            } else {
                ?>
                <li><a>Xin Chào: <?php echo $_SESSION["userName"] ?></a></li>
                <?php
                if ($_SESSION["quyen"] === "1") {
                    ?>
                    <li><a href="quanLy.php">Quản Lý</a></li>
                    <?php
                }
                ?>
                <li><a href="index.php?p=7">Cập Nhật Thông Tin</a></li>
                <li><a onclick="dangxuat()" >Đăng Xuất</a></li>

    <?php
}
?>
            <li><a href="index.php?p=10"><img width="30"src="./image/cart.png">Giỏ hàng(<?php echo $count ?>)</a></li>

        </ul>
        <form class="navbar-form navbar-left" method="POST" action="index.php?p=1">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="txtSearch">
            </div>
            <button type="submit" class="btn btn-default" name="butSearch">Search</button>
        </form>

    </div>
</nav>
