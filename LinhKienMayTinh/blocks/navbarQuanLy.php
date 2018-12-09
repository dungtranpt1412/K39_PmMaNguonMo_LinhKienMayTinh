<script language="javascript">
    function dangxuat() {
        if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
            window.location.href = "index.php?dx=1";
        } else {

        }
    }
</script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Cửa Hàng Linh Kiện Máy Tính</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Trang Chủ</a></li>
      <?php if(!isset($_SESSION["user"]))
      {?>
      <li><a href="index.php?p=2">Đăng Nhập</a></li> 
      <?php
      } 
      else 
      {
          ?>
      <li><a>Xin Chào: <?php echo $_SESSION["userName"]?></a></li>
      <li><a onclick="dangxuat()">Đăng Xuất</a></li>
      <?php
      
      }
      ?>
      
      <li><a href="#">Page 3</a></li>
    </ul>
      <form class="navbar-form navbar-left" method="POST" action="quanLy.php?p=6">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="txtSearch">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
      
  </div>
</nav>
