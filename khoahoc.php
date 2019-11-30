<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/khoahoc.css">
<title>Code Club | Khóa Học</title>
</head>
<body>
		<?php 
			if (isset($_GET['id_kh'])) {
				$id_kh = $_GET['id_kh'];
			}
	  		$get_edit_khoahoc = $kh->get_edit_khoahoc($id_kh);
				if (isset($get_edit_khoahoc)) {
					while ($result = $get_edit_khoahoc->fetch_assoc()) {
	  	?>
	<header style="background-color: <?php echo $result['mamau']; ?>;">
		<div class="container">
			<div class="row">
				<?php include 'inc/nav.php'; ?>
				<li class="nav-item khungsearch">
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
	
	<div class="row">
		<div class="col-sm-5 daidien">
			<img src="image/journey-laravel.svg">
		</div>
		<div class="col-sm-7 gioithieu">
			<h3>Hành trình của xuyên qua Code Club</h3>
			<p>Hành trình là một hướng dẫn được đề xuất thông qua Code Club cho một kỹ năng nhất định. Mỗi phần cung cấp các mẹo và kỹ thuật mới dựa trên những gì bạn đã học. Điều đó nói rằng, hãy thoải mái để nhảy xung quanh khi bạn thấy phù hợp.</p>
		</div>
	</div>
</div>
</header>

<article>
	<div class="container">
		<div class="row">
				<div class="col-sm-4 skill">
					<img src="image/series-available-icon.svg" align="left">
					<h5><?php echo $result['name_kh']; ?> SKILL</h5>
					<p><?php echo $result['skill']; ?></p>
				</div>
			<?php }} ?>
			<div class="col-sm-8 cot2">
				<?php 
					$get_chude_FE = $cd->get_chude_FE($id_kh);
						if (isset($get_chude_FE)) {
							while ($resultcd = $get_chude_FE->fetch_assoc()) {
								$id_cd = $resultcd['id_cd'];
				 ?>
				<div class="text-center">
					<p class="alert-secondary title"><?php echo $resultcd['name_cd']; ?></p>
				</div>
				<div class="row allkhoahoc">
					<?php 
						$get_baihoc_cd = $bh->get_baihoc_cd($id_cd);
						if (isset($get_baihoc_cd)) {
							while ($resultbh = $get_baihoc_cd->fetch_assoc()) {
								$id_bh = $resultbh['id_bh'];
					 ?>
					<div class="col-sm-5 motkhoahoc" style="margin: 20px;">
						<div class="text-center khoahoc" style="background-color: <?php echo $resultbh['mamau']; ?>">
							<img src="admin/uploads/<?php echo $resultbh['image']; ?>">
							<h5><?php echo $resultbh['name_bh']; ?></h5>
							<div class="play text-center">
								<a href="series.php?id_bh=<?php echo $resultbh['id_bh']; ?>">
									<i class="fa fa-play-circle-o"> Play</i>
								</a>
							</div>
						</div>
						<div class="danhmuc">
							<div class="thongbao">
								<?php 
									$tong_video = $vd->tong_video($id_bh);
									if (isset($tong_video)) {
										while ($resulttotal = $tong_video->fetch_assoc()) {
											Session::set('soluong',$resulttotal['soluong']);
											?>
								<p><i class="fa fa-code"></i> <?php echo $resulttotal['soluong']; ?> Lession</p>
									<?php }} ?>
								<p><i class="fa fa-clock-o"></i> <?php echo $resultbh['ngaytao']; ?></p>
							</div>
							<div class="lar">
								<p align="right"><?php echo $resultbh['name_kh']; ?></p>
							</div>
						</div>
					</div>
					<?php }} ?>
				</div>
			<?php }} ?>
			</div>
		</div>
	</div>
</article>

<?php include 'inc/footer.php'; ?>

