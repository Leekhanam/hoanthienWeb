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
					while ($resultkh = $get_edit_khoahoc->fetch_assoc()) {
	  	?>
	<header style="background-color: <?php echo $resultkh['mamau']; ?>;">
		<div class="container">
			<div class="row">
				<?php include 'inc/nav.php'; ?>
				<li class="nav-item khungsearch">
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
	
	<div class="row">
		<div class="col-sm-12 dangnhap">
        <!-- The Modal -->
        <div class="modal fade" id="dangnhap">
          <div class="modal-dialog">
            <div class="modal-content">
                
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                <?php 
                if (isset($login_Check)) {
                    ?>            
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo $login_Check; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <?php
                }
                ?>

                <div class="container-content">
                  <form style="display: none;" id="Sign" class="margin-t was-validated" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="******" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <button type="submit" name="signin" class="form-button button-l margin-b">Đăng nhập</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                      </label>
                      <br />
                      <a class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
                      <a class="text-darkyellow" href="#"><p class="text-whitesmoke text-center"><small>Bạn chưa có tài khoản?</small></p></a>
                  </form>
                  <?php 
                      if (empty($_COOKIE['siteAuth'])) {
                   ?>
                  <form class="margin-t was-validated" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="******" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <button type="submit" name="signin" class="form-button button-l margin-b">Đăng nhập</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                      </label>
                      <br />
                      <a class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
                      <a class="text-darkyellow" href="#"><p class="text-whitesmoke text-center"><small>Bạn chưa có tài khoản?</small></p></a>
                  </form>

                  <?php }else { ?>
                    <form id="signAuth" class="margin-t was-validated" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" disabled="" name="email" value="<?php 
                              if(isset($_COOKIE['siteAuth'])){ 
                                 parse_str($_COOKIE['siteAuth']); 
                                 echo $email;
                                 // $login_Re = $login->login_Re($email,$pass);                
                               }
                             ?>" placeholder="Email" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" value="<?php 
                              if(isset($_COOKIE['siteAuth'])){ 
                                 parse_str($_COOKIE['siteAuth']); 
                                 echo $email;
                                 // $login_Re = $login->login_Re($email,$pass);                
                               }
                             ?>" name="pass" placeholder="******" required="">
                            <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                        </div>
                        <button type="submit" name="signinCookie" class="form-button button-l margin-b">Đăng nhập</button>
                        <button type="button" id="chuyenForm" name="chuyenForm" class="form-button button-l margin-b">Đăng nhập tài khoản khác</button>
                        <label>
                          <input type="checkbox" checked="checked" name="remember" value="1"> Remember me
                      </label>
                      <br />
                      <a class="text-darkyellow" href="#"><small>Quên mật khẩu?</small></a>
                      <a class="text-darkyellow" href="#"><p class="text-whitesmoke text-center"><small>Bạn chưa có tài khoản?</small></p></a>
                  </form>
                <?php } ?>
                  <p class="margin-t text-whitesmoke"><small> Anh Tú  Copyright &copy; 2019</small> </p>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>
</div>
<div class="col-sm-12 dangki">
    <!-- The Modal -->
    <div class="modal fade" id="dangki">
      <div class="modal-dialog">
        <div class="modal-content">
            
            <div>
                <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
            </div>
            <div class="container-content">
                <?php 
                if (isset($dangki)) {
                    ?>            
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo $dangki; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <form class="margin-t was-validated" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Họ và tên" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="image" required="">
                        <label class="custom-file-label" for="customFile">Vui lòng chọn ảnh đại diện.</label>
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="repassword" class="form-control" placeholder="Nhập lại Password" required="">
                        <div class="valid-feedback"><i class="fa fa-check-circle-o"></i></div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <button type="submit" name="dangki" class="form-button button-l margin-b">Đăng Kí</button>
                </form>
                <p class="margin-t text-whitesmoke"><small> Anh Tú  Copyright &copy; 2019</small> </p>
            </div>

            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>
</div>
		<div class="col-sm-5 daidien">
			<img width="80%" src="admin/uploads/<?php echo $resultkh['image_kh']; ?>">
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
      <div class="col-sm-12 dangnhap">
      <!-- The Modal -->
      <div class="modal fade" id="phaiDN">
        <div class="modal-dialog">
          <div class="modal-content">               
            <div class="modal-header">
              <h3 class="text-left btn border">Thông Báo!</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          <div class="container-content">
              <h6 class="text-primary text-center">Bạn cần đăng nhập để xem bài học nhé 😁</h6>
          </div>

          <!-- Modal footer -->
          <button type="button" id="delete" class="btn btn-success" data-dismiss="modal">OKE</button>
          </div>
        </div>
      </div>
    </div>
				<div class="col-sm-4 skill">
					<img src="image/series-available-icon.svg" align="left">
					<h5><?php echo $resultkh['name_kh']; ?> SKILL</h5>
					<p><?php echo $resultkh['skill']; ?></p>
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
							<img width="60%" src="admin/uploads/<?php echo $resultbh['image']; ?>">
							<h5><?php echo $resultbh['name_bh']; ?></h5>
							<?php 
              if (Session::get("id_tk")) {
           ?>
            <div class="play text-center">
              <a href="series.php?id_bh=<?php echo $resultbh['id_bh']; ?>"><i class="fa fa-play-circle-o"> Play</i>
              </a>
            </div>
            <?php }else { ?>
              <div class="play text-center PhaiDN">
                <button type="button"><i class="fa fa-play-circle-o"> Play</i></button>
              </div>
              <?php
              } ?>
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

