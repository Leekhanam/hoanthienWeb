<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/thongtin.css">
<title>Code Club | Thông tin</title>
</head>
<body>
  <?php 
  Session::checkLogin();
  $id_tk = Session::get("id_tk");
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $update_taikhoan = $tk->update_taikhoan($id_tk,$_POST,$_FILES);
  }
  ?>
  <div class="container">
    <div class="row">
     <ul class="nav">
      <?php include 'inc/nav.php'; ?>
      <li class="nav-item">
        <!-- Search form -->
        <form action="search.php" method="get" class="sear" autocomplete="off" 
        id="hdTutoForm">
        <div class="md-form active-pink active-pink-2 mb-3 mt-0">
          <span class="icon"><i class="fa fa-search"></i></span>
          <input class="form-control search" id="keywords" name="keywords" type="text" placeholder="Enter For Search" aria-label="Search">
          <a id="spinner" href=""><i class="fa fa-spinner fa-spin"></i></a>
        </div>
        <div id="goiy">
          <ul class="list-gpfrm" id="hdTuto_search"></ul>
        </div>
      </form>
    </li>
  </ul>
</div>
<hr>
</div>
<?php
$get_taikhoan = $tk->get_taikhoan($id_tk);
if (isset($get_taikhoan)) {
  while ($result = $get_taikhoan->fetch_assoc()) {
   ?>
   <section>
    <article id="khung1">
     <div class="container">
      <div class="row gioithieu">
        <div class="col-sm-5 modau">
         <p id="title">THÔNG TIN</p>
         <h1>Name: <?php echo $result['name']; ?></h1>
         <p>Email: <?php echo $result['email']; ?></p>
         <img width="450" height="150" src="image\congnghe.png">
       </div>
       <div class="col-sm-7 img">
         <img width="50%" src="admin/uploads/<?php echo $result['image']; ?>" align="right">
       </div>
     </div>
   </div>
 </article>
 <article id="khung2" class="text-center alert-success">
   <div class="container">
    <div class="col-sm-12">
     <div class="phanmoi">
      <p>Thông tin cá nhân : <span>Bạn có thể sửa thông tin ở đây!</span></p>
    </div>
  </div>
</div>
</article>
</section>
<div class="container">
  <div class="row"> 
  <div class="col-sm-12 btn border">
    <h5 class="text-center">Thay Đổi Thông Tin Cá Nhân</h5>
    <hr class="alert-secondary">
    <div class="text-left card alert-success">
      <?php 
      if (isset($update_taikhoan)) {
        echo $update_taikhoan;
      }
      ?>
      <form action="" method="post" enctype="multipart/form-data" class="form-group">
        <div class="card btn-outline-dark">
         <input type="text" class="form-control" value="<?php echo $result['name']; ?>" placeholder="Name..."  name="name">
       </div>
       <div class="card btn-outline-dark">
         <input type="file" class="custom-file-input" name="image" >
         <label class="custom-file-label" for="customFile">Image...</label>
       </div>
       <div class="card btn-outline-dark">
         <input type="text" class="form-control" value="<?php echo $result['email']; ?>" placeholder="Email..."  name="email">
       </div>
       <div class="card btn-outline-dark">
         <input type="text" class="form-control" placeholder="Password..."  name="pass">
       </div>
       <div class="card btn-outline-dark text-right"> 
         <input type="submit" name="submit" class="form-control alert-success" value="Thay đổi" name="">
       </div>
     </form>
   </div>
 </div>
</div>
</div>
<?php }} ?>
<?php include 'inc/footer.php'; ?>