<style type="text/css">
.ccc:hover::after {
  content: "▼";
  position: absolute;
  top: 60px;
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
  z-index: -1;
}

.li:hover:before {
  width: 100%;
  left: 0;/*change here*/
  right: auto;/*change here*/
}
</style>
<ul class="nav">
      				<img style="cursor: pointer;" class="nav-link" id="logo" width="20%" src="./admin/uploads/<?php echo Session::get("logo"); ?>">
      				
      				<li class="li nav-item">
      					<a class="nav-link <?php if (empty($_GET['id_bh']) && empty($_GET['name'])) {
      					echo "btn border";
      					}
      				 ?>" href="home.php">HOME</a>
      				</li>
				    <li class="li nav-item ccc">				
				      <a class="nav-link <?php if (isset($_GET['id_bh'])) {
      					echo "btn border";
      					}
      				 ?>" href="home.php">SERIES</a>
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
      				 ?>" href="thongtin.php?name=<?php echo Session::get("name"); ?>">THÔNG TIN</a>
				    </li>
				    <li class="li nav-item">
				    	<?php
				    	$login_check = Session::get("id_tk");
				    	$name = Session::get("name");
					   		if ($login_check == true) {
					   	 ?>
				      <a class="nav-link" href='?id_tk=<?php echo $login_check; ?>'>ĐĂNG XUẤT
				      	(<?php echo $name; ?>)</a>
				      <?php } ?>
				    </li>
				    <script type="text/javascript">
				    	$(document).ready(function(){
							$('#logo').click(function(){
								window.location = 'home.php';
						  });
						});
				    </script>