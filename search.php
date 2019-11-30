<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/home.css">
<title>Code Club | Search</title>
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
		if (isset($_GET['keywords'])) {
			$keywords = $_GET['keywords'];
			$search = $bh->search($keywords);
			if (isset($search)) {
				while ($result = $search->fetch_assoc()) {
					?>
					<div class="col-sm-3 motkhoahoc">
						<div class="text-center khoahoc" style="background-color: <?php echo $result['mamau']; ?>;">
							<img width="50%" src="admin/uploads/<?php echo $result['image']; ?>">
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
						<?php }}} ?>
					</div>
				</div>
				<!-- Kết thúc container -->
			</div>
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="email text-center">
								<img width="25%" src="image/flash.png" class="rounded-circle" align="left">
								<div class="form">
									<p class="col-sm-9"> Nếu bạn muốn đóng góp cho cộng đồng tại <br /><strong>Code Club</strong> hãy gửi email cho tôi!</p>
									<form role="form" action="" method="" class="form-group">
										<input type="email" class="input" name="email" placeholder="Điền Email bạn ở đây" required="" />
										<input type="submit" class="submit" name="" value="Đăng kí" />
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row cc">
						<div class="col-sm-5 code">
							<img width="25%" src="image/logo.png" align="left">
							<p class="name">Code Club</p>
							<p class="desc-footer">Mọi người luôn tin dùng <strong>Code Club</strong> so với các nhãn hiệu cạnh tranh vì nó Free. Hãy vào trong, tự mình xem và nâng cao kỹ năng phát triển của bạn trong quá trình học lập trình tại nơi này.</p>
							<div class="iconsweb">
								<i class="fa fa-facebook-square"></i>
								<i class="fa fa-youtube-play"></i>
								<i class="fa fa-twitter"></i>
								<i class="fa fa-github"></i>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="lienquan">
								<div>
									<h4>Học hỏi</h4>
									<p><a href="">Đăng kí</a></p>
									<p><a href="">Đăng nhập</a></p>
									<p><a href="">Duyệt</a></p>
									<p><a href="">Chỉ số bài học</a></p>
								</div>
								<div>
									<h4>Bàn luận</h4>
									<p><a href="">Diễn đàn</a></p>
									<p><a href="">Doanh nghiệp</a></p>
									<p><a href="">Ủng hộ</a></p>
								</div>
								<div>
									<h4>Ngoài Ra</h4>
									<p><a href="">Chứng thực</a></p>
									<p><a href="">Câu hỏi thường gặp</a></p>
									<p><a href="">Công việc</a></p>
									<p><a href="">Riêng tư</a></p>
									<p><a href="">Điêu khỏan</a></p>
								</div>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-sm-12">
							<div class="col-sm-12 text-center end">
								<p>Copyright © Code Club 2019. Bảo lưu mọi quyền. Chính xác, bao gồm tất cả trong số thành viên. Điều đó có nghĩa là cả bạn, Happy! .</p>
								<p>Được thiết kế <i class="fa fa-heart"></i> Anh Tú . Tự hào được giúp đỡ các bạn với cộng đồng Github .</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</body>
		</html>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.ccc').click(function(){
					$('.sub-menu').show(1000);
				});
				$('.khoahoc').hover(function(){
					$(this).addClass("important");
				});
				$('.khoahoc').mouseleave(function(){
					$(this).removeClass("important");
				});
			});
		</script>