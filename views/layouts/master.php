<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quan ly san pham MVC</title>
  <link rel="stylesheet" href="assets/stylesheets/style.css">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="menu">
   <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?controller=home">Trang quản trị </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?controller=product">Danh sách sản phẩm </a></li>
          <li><a href="#">Đăng xuất </a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
  
</div>
<div class="main">
  <?php require_once($path_file) ?>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>