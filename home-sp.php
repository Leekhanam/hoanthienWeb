<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/home.css">
<title>Code Club | Home-2</title>
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
	  <div class="row allkhoahoc">
	  		<?php 
	  			$show_baihoc_FE = $bh->show_baihoc_FE();
					if (isset($show_baihoc_FE)) {
						while ($result = $show_baihoc_FE->fetch_assoc()) {
	  		 ?>
	  	<div class="col-sm-3 motkhoahoc">
		    <div class="text-center khoahoc" style="background-color: <?php echo $result['mamau']; ?>;">
		    	<img width="60%" src="admin/uploads/<?php echo $result['image']; ?>">
		      <h5><?php echo $result['name_bh']; ?></h5>
		      <div class="play text-center"><a href="series.php?id_bh=<?php echo $result['id_bh']; ?>">
		      	<i class="fa fa-play-circle-o"> Play</i></a></div>
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
			    	<p><i class="fa fa-bullhorn"></i> <?php echo $result['ngaytao']; ?></p>
		    	</div>
		    	<div class="lar">
		    		<p><?php echo $result['name_kh']; ?></p>
		    	</div>
		    </div>
		</div>
		<?php }} ?>
	  </div>
	</div>
		<!-- Kết thúc container -->
	</div>
	<?php include 'inc/footer.php'; ?>
