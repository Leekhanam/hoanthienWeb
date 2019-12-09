<style type="text/css">
.ccc:hover::after {
  content: "▼";
  position: absolute;
  top: 60px;
  z-index: 999999;
  left: 30px;
}
.li:before {
  content: "";
  position: absolute;
  left: auto; /*change here*/
  right: 0;/*change here*/
  width: 0;
  bottom: 70px;
  height: 5px;
  background-color: lightblue;
  transition: 0.5s;
  z-index: 1;
}

.li:hover:before {
  width: 100%;
  left: 0;/*change here*/
  right: auto;/*change here*/
}
.img {
	border-radius: 50%;
}
</style>
<div class="container">
	<div class="row">
	<div class="col-sm-12 share-btn">
		<div class="text-right">
			<?php 
				if (empty(Session::get("id_tk")) && empty(Session::get("name"))) {
			 ?>
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dangnhap">Đăng Nhập</button>
			 |
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#dangki">Đăng Kí</button>
			<?php }else {
			 ?>
			<div class="dropdown">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <div style="width: 200px;"><img width="25%" align="left" class="img" src="admin/uploads/<?php echo Session::get("image"); ?>" alt="Profile Pic" /> | Hello <?php echo Session::get("name"); ?></div>
						
			    </button>
			    <div class="dropdown-menu">
			    	<?php 
			    		if (Session::get("quyen") == 1 || Session::get("quyen") == 2) {
			    	 ?>
			      <a style="font-size: 16px;" class="dropdown-item" href="admin/dashboard.php">Quản Trị</a>
			      <div class="dropdown-divider"></div>
			  	<?php }else { ?>
			  	  <a style="font-size: 16px;" class="dropdown-item" href="lichsu.php">Lịch sử học</a>
			      <div class="dropdown-divider"></div>
			  	<?php } ?>
			      <a style="font-size: 16px;" class="dropdown-item" href="thongtin.php">My Profile</a>
			      <div class="dropdown-divider"></div>
			      <a style="font-size: 16px;" class="dropdown-item" href="?id_tk=<?php echo Session::get("id_tk"); ?>">Đăng Xuất</a>
			    </div>
			  </div>
			<?php 	
			} ?>
		</div>
	</div>
</div>
</div>
<ul class="nav">
      				<img style="cursor: pointer;" class="nav-link" id="logo" width="20%" src="./admin/uploads/<?php echo Session::get("logo"); ?>">
      				
      				<li class="li nav-item">
      					<a class="nav-link <?php if (empty($_GET['id_bh']) && empty($_GET['name']) && empty($_GET['id_kh'])) {
      					echo "btn border";
      					}
      				 ?>" href="index.php">HOME</a>
      				</li>
				    <li class="li nav-item ccc">				
				      <a class="nav-link <?php if (isset($_GET['id_bh']) || isset($_GET['id_kh'])) {
      					echo "btn border";
      					}
      				 ?>" href="index.php">SERIES</a>
				      <div class="row sub-menu">	      	
						    <?php 
							$show_khoahoc_FE= $kh->show_khoahoc_FE();
							if (isset($show_khoahoc_FE)) {
								while ($result = $show_khoahoc_FE->fetch_assoc()) {
						 	?>  	
						      	<a class="nav-link" href="khoahoc.php?id_kh=<?php echo $result['id_kh']; ?>">
						      		<?php echo $result['name_kh']; ?>
						      	</a>
						    <?php 
						    	}}
						     ?>
						</div>
				    </li>
				    <li class="li nav-item">
				      <a class="nav-link" href="#">BLOG</a>
				    </li>
				    <li class="li nav-item">
				      <a class="nav-link <?php if (isset($_GET['name']) && empty($_GET['id_bh'])) {
      					echo "btn border";
      					}
      				 ?>" href="gioithieu.php">GIỚI THIỆU</a>
				    </li>
				    <script type="text/javascript">
				    	$(document).ready(function(){
							$('#logo').click(function(){
								window.location = 'index.php';
						  });
						});
				    </script>