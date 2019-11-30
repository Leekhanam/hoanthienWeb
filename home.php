<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/home.css">
<title>Home</title>
</head>
<body>
    <div class="container">
      <div class="row">
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
				<div class="col-sm-12">
					<div class="text-right">
						<a href="home.php"><i class="fa fa-navicon"></i></a>
						<a href="home-sp.php"><i class="fa fa-th"></i></a>
					</div>
					<hr />
				</div>
      	</div>

      <div class="moinhat">	
      <div class="row curr">
      		<div class="col-sm-12 text-center">
      			<p class="title">Hiện Đang Nổi Bật</p>
      			<p class="desc">Đây là những gì chúng tôi hiện vừa làm xong tại <a href="" class="align-content-stretch">Code Club</a>.</p>
      		</div>
      </div>
	  <div class="row allkhoahoc">
	  	<?php 
	  			$show_baihoc_hoanthanh = $bh->show_baihoc_hoanthanh();
					if (isset($show_baihoc_hoanthanh)) {
						while ($result = $show_baihoc_hoanthanh->fetch_assoc()) {
	  		 ?>
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc" style="background-color: <?php echo $result['mamau']; ?>">
		    	<img width="60%" src="admin/uploads/<?php echo $result['image']; ?>">
		      <h5><?php echo $result['name_bh']; ?></h5>
		      <div class="play text-center"><a href="series.php?id_bh=<?php echo $result['id_bh']; ?>"><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
		    		<?php 
		    				$id_bh = $result['id_bh'];
					  		$tong_video = $vd->tong_video($id_bh);
								if (isset($tong_video)) {
									while ($resulttotal = $tong_video->fetch_assoc()) {
										Session::set('soluong',$resulttotal['soluong']);
					  		 ?>
			    	<p><i class="fa fa-code"></i> <?php echo $resulttotal['soluong']; ?> Lession</p>
			    <?php }} ?>
			    	<p><i class="fa fa-clock-o"></i> <?php echo $result['ngaytao']; ?></p>
		    	</div>
		    	<div class="lar">
		    		<p><?php echo $result['name_kh']; ?></p>
		    	</div>
		    </div>
		</div>
	<?php }} ?>
	  </div>
	</div>

	<div class="moiupdate">	
      <div class="row curr">
      		<div class="col-sm-12 text-center">
      			<p class="title">Cập Nhật Gần Đây</p>
      			<p class="desc">Tò mò có gì mới ở <a href="" class="align-content-stretch">Code Club</a>? Các loạt sau đây đã được cập nhật gần đây.</p>
      		</div>
      </div>
      <!-- Hàng 1 -->
	  <div class="row allkhoahoc">
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc php">
		    	<img src="image/spotlight.svg">
		      <h5>Guest Spotlight</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>PHP</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc php">
		    	<img src="image/building.svg">
		      <h5>Building Code Club</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>PHP</p>
		    	</div>
		    </div>
		</div>
		
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc laravel">
		    	<img src="image/laravel6.svg">
		      <h5>Laravel 6 From Scratch</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>LARAVEL</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc php">
		    	<img src="image/howdoi.svg">
		      <h5>How Do I</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>PHP</p>
		    	</div>
		    </div>
		</div>
	 
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc laravel">
		    	<img src="image/laravel-exp.svg">
		      <h5>Laravel Explained</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>LARAVEL</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc laravel">
		    	<img src="image/whats-new-in-laravel-6.svg">
		      <h5>What's New in Laravel 6</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>LARAVEL</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc php">
		    	<img src="image/php-bits.svg">
		      <h5>PHP Bits</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>PHP</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc mysql">
		    	<img src="image/mysql-database-design.svg">
		      <h5>MySQL Database Design</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>TOOLING</p>
		    	</div>
		    </div>
		</div>
	  </div>
	</div>

	<div class="xuhuong">	
      <div class="row curr">
      		<div class="col-sm-12 text-center">
      			<p class="title">Theo Dòng Xu Hướng</p>
      			<p class="desc">Đây là những gì đồng nghiệp của bạn đang tập trung vào.</p>
      		</div>
      </div>
      <!-- Hàng 1 -->
	  <div class="row allkhoahoc">
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc fw-js">
		    	<img src="image/learning-vue-step-by-step.svg">
		      <h5>Learn Vue 2: Step By Step</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>VUE</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc php">
		    	<img src="image/the-php-practitioner.svg">
		      <h5>The PHP Practitioner</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>PHP</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc tooling">
		    	<img src="image/be-awesome-in-phpstorm.svg">
		      <h5>Be Awesome in PHPStorm</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>TOOLING</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc php">
		    	<img src="image/object-oriented-bootcamp.svg">
		      <h5>Object-Oriented Bootcamp</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>PHP</p>
		    	</div>
		    </div>
		</div>
	  </div>
	  <!-- Hàng 2 -->
	  <div class="row allkhoahoc">
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc laravel">
		    	<img src="image/hands-on-community-contributions.svg">
		      <h5>Hands On: Community Contributions</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>LARAVEL</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc laravel">
		    	<img src="image/whats-new-in-laravel-6.svg">
		      <h5>What's New in Laravel 6</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>LARAVEL</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc tooling">
		    	<img src="image/visual-studio-code-for-php-developers.svg">
		      <h5>Visual Studio Code for PHP Developer...</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>TOOLING</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc tooling">
		    	<img src="image/mysql-database-design.svg">
		      <h5>Mongo Database Design</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>TOOLING</p>
		    	</div>
		    </div>
		</div>
	  </div>
	</div>

	<div class="khac">	
      <div class="row curr">
      		<div class="col-sm-12 text-center">
      			<p class="title">Những Thứ Khác Đáng Quan Tâm</p>
      			<p class="desc">Đây là những gì được sử dụng khá phổ biến ở các doanh nghiệp Việt Nam.</p>
      		</div>
      </div>
	  <div class="row allkhoahoc">
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc js">
		    	<img src="image/learn-flexbox-through-examples.svg">
		      <h5>Learning Angular 6</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>ANGULAR</p>
		    	</div>
		    </div>
		</div>
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc tooling">
		    	<img src="image/css-grids-for-everyone.svg">
		      <h5>CSS Grids for Everyone</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>TOOLING</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc tooling">
		    	<img width="60%" src="image/github.png">
		      <h5>Learning Git and Github</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>TOOLING</p>
		    	</div>
		    </div>
		</div>
		<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc java">
		    	<img width="60%" src="image/java.png">
		      <h5>Learning Java Basic And Advanced</h5>
		      <div class="play text-center"><a href=""><i class="fa fa-play-circle-o"> Play</i></a></div>
		    </div>
		    <div class="danhmuc">
		    	<div class="thongbao">
			    	<p><i class="fa fa-code"></i> 6 Lession</p>
			    	<p><i class="fa fa-clock-o"></i> 12-2-2019</p>
		    	</div>
		    	<div class="lar">
		    		<p>JAVA</p>
		    	</div>
		    </div>
		</div>
	  </div>
	</div>
		<!-- Kết thúc container -->
	</div>
	<?php include 'inc/footer.php'; ?>