<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/lichsu.css">
<title>Code Club | Thông tin</title>
</head>
<body>
  <?php 
  Session::checkLogin();
  $id_tk = Session::get("id_tk");
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
          <input class="form-control search" id="keywords" required="" name="keywords" type="text" placeholder="Enter For Search" aria-label="Search">
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
<div id="article">
  <div class="container">
  <div class="row">
    <div class="col-sm-3 border">
        <div id="image-user">
          <img width="100%" class="img" src="admin/uploads/<?php echo $result['image']; ?>">
        </div>
        <div id="thongtin">
          <h3><?php echo $result['name']; ?></h3>
        <p>Thông tin học tập</p>
        <a href="thongtin.php">Edit</a>
        </div>
        <div>
          <h3>Thành Tựu</h3>
          <ul style="list-style-type: circle; padding-left: 20px;">
            <li>Số lượng khóa học: <span id="slkh"></span></li>
            <li>Số lượng bài học: <span id="slbh"></span></li>
          </ul>
        </div>
   </div>
   <?php }} ?>
   <div class="col-sm-9" id="lichsu">
      <h1>Lịch sử các bài học</h1>  
      <br>
      <?php 
          $get_lichsu = $ls->get_lichsu($id_tk);
          if (isset($get_lichsu)) {
            $i = 0;
            while ($resultls = $get_lichsu->fetch_assoc()) {
              $i++;
       ?>
      <button class="accordion slkh" style="background-color: <?php echo $resultls['mamau']; ?>;">
        <h3><?php echo $resultls['name_kh']; ?><span class="pheptinh">+</span></h3>
      </button>
        <div class="panel slbh">
            <div class="row allkhoahoc">
          <div class="col-sm-4 motkhoahoc">
        <div class="text-center khoahoc" style="background-color: <?php echo $resultls['mamau']; ?>;">
          <img width="60%" src="admin/uploads/<?php echo $resultls['image']; ?>">
          <h5> <?php echo $resultls['name_bh']; ?></h5>
          <div class="play text-center"><a href="<?php echo $resultls['linkls']; ?>"><i class="fa fa-play-circle-o"> Tiếp tục</i></a></div>
        </div>
        <div class="danhmuc">
          <div class="col-sm-12 thongbao">
            <div class="text-center"><?php echo $resultls['name_vd']; ?></div>
            <p><i class="fa fa-code"></i> Lession  <?php echo $resultls['lession']; ?>
            <span style="float: right;"><i class="fa fa-clock-o"></i> <?php echo $resultls['ngayluu']; ?></span>
          </p>  
          </div>
        </div>
          </div>
        </div>
        </div>
      <?php }} ?>  
    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>
<script>
  $(document).ready(function(){
    var i;
var acc = document.getElementsByClassName("accordion");
    var slkh = $(".slkh").length;
    if (slkh === 0) {
      $("#slkh").html(0);
    }else {
      $("#slkh").html(slkh);
    }
     
    var slbh = $(".slbh").length;
    if (slkh === 0) {
      $("#slbh").html(0);
    }else {
      $("#slbh").html(slbh);
    } 
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
});
</script>