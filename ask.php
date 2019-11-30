<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/ask.css">
<title>Code Club | Câu hỏi</title>
</head>
<body>
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
				<div class="col-sm-12">
					<div class="text-right">
						<a href="series.php?id_bh=<?php echo Session::get("id_bh"); ?>"><i class="fa fa-arrow-circle-left"></i> BACK TO MAIN</a>
					</div>
					<hr />
				</div>
				</div>
      	</div>
		      	<?php
		      	$id_bh = Session::get("id_bh");
		      	$get_baihoc_FE = $bh->get_baihoc_FE($id_bh);
					if (isset($get_baihoc_FE)) {
						while ($resultbh = $get_baihoc_FE->fetch_assoc()) {
      		 ?>
      	<div class="link">
      		<div>HOME / SERIES / <?php echo $resultbh['name_bh']; ?> / Ask Series</div>
      	</div>

      	<section>
      		<article id="khung1" style="background-color: ;">
      			<div class="container">
      				<div class="row gioithieu">
		      				<div class="col-sm-7 modau">
		      					<p id="title"><a href="khoahoc.php"><?php echo $resultbh['name_kh']; ?></a></p>
				      			<h1><?php echo $resultbh['name_bh']; ?></h1>
				      			<p><?php echo $resultbh['chuthich']; ?></p>
				      			<div class="chitiet">
				      				<i class="fa fa-thermometer-empty"> <?php echo $resultbh['name_cd']; ?></i>
				      				<i class="fa fa-code"> <?php echo Session::get("soluong")." Lession"; ?></i>
				      				<i class="fa fa-clock-o"> <?php echo $resultbh['ngaytao']; ?></i>
				      			</div>
			      					<img width="450" height="150" src="image\congnghe.png">
		      					</div>
		      				<div class="col-sm-5 img">
		      					<img width="50%" src="admin/uploads/<?php echo $resultbh['image']; ?>" align="right">
		      				</div>
      				</div>
      			</div>
      	</article>
      <?php }} ?>
      	<article id="khung2" class="text-center alert-success">
      			<div class="container">
      				<div class="col-sm-12">
      					<div class="phanmoi">
			      			<p>Tổng kết : <span>Những câu hỏi của bài học này sẽ giúp bạn lắm chắc kiến thức hơn!</span></p>
			      		</div>
      				</div>
      			</div>
      	</article>
      	<article id="khung3" class="text-center">
   			<form>
      			<div class="container">
      				<div class="row cauhoi">
      					<?php 
      						$show_cauhoi = $ch->show_cauhoi($id_bh);
							if (isset($show_cauhoi)) {
									$i = 0;
								while ($result = $show_cauhoi->fetch_assoc()) {
									$i++;
      					 ?>
      					<div class="col-sm-6">
				      		<p><strong>Câu hỏi <?php echo $i; ?>:</strong> <span><?php echo $result['cauhoi']; ?></span></p>
				      		<div class="ask text-left">
				      			<input type="hidden" id="<?php echo 'cauhoi'.$i ?>" value="<?php echo $result['dapan']; ?>">
				      			<label class="containerradio"><?php echo $result['dapan_1']; ?>  
									 <input type="radio" value="1" required="" class="<?php echo 'cauhoi'.$i ?>" name="<?php echo 'cauhoi'.$i ?>">
									 <span class="checkmark"></span>
								</label>
								<label class="containerradio"><?php echo $result['dapan_2']; ?> 
									<input type="radio" value="2" required="" class="<?php echo 'cauhoi'.$i ?>" name="<?php echo 'cauhoi'.$i ?>">
									<span class="checkmark"></span>
								</label>
								<label class="containerradio"><?php echo $result['dapan_3']; ?>
									<input type="radio" value="3" required="" class="<?php echo 'cauhoi'.$i ?>" name="<?php echo 'cauhoi'.$i ?>">
									<span class="checkmark"></span>
								</label>
			      			</div>
			      		</div>
			      	<?php }} ?>
      				</div>
      			</div>
      			<div class="container">
      			<div class="row">
					<div id="hoanthanh" class="alert-info badge-secondary"></div>
      			</div>
      		</div>
      			<div class="col-sm-12 lamlai">
				   		<input type="reset" class="btn btn-default border showing" value="Làm Lại">
					</div>
      		</form>
      		<?php if (isset($show_cauhoi)) {
      		?>
      			<div class="col-sm-12 button">
				   	<button id="submit" class="btn-primary form-control">Hoàn Thành</button>
				</div>
			<?php }else { ?>	
				<div class="col-sm-12 button">
				   	<button id="submit" class="btn-primary form-control">Chưa có câu hỏi nào 😁</button>
				</div>
			<?php } ?>	
      	</article>
      	</section>
      	<?php include 'inc/footer.php'; ?>
      	<script type="text/javascript">
      		$(document).ready(function(){
      			$('#submit').click(function(){	
					var length = <?php echo $i; ?>;
					var diem = 0;	
						for (var i = 1; i <= length; i++) {
							var check = $(".cauhoi"+i+":checked").val();
							var dapan = $("#cauhoi"+i).val();
							if (check == dapan) {
								diem++;
							}else{
								$(".cauhoi"+i+":checked").css("background-color", "red");
							}						
						}
					if (diem <= 2) {
						$('#hoanthanh').show().html('Số câu trả lời đúng '+diem+"/"+length+" (Tệ quá làm lại đi 😤)").addClass('animated tada');
					}else if (diem >= 3 & diem <= 6) {
						$('#hoanthanh').show().html('Số câu trả lời đúng '+diem+"/"+length+" (Cố gắng hơn chút nữa nào 😁)").addClass('animated tada');
					}else {
						$('#hoanthanh').show().html('Số câu trả lời đúng '+diem+"/"+length+" (Tuyệt vời quá điii 😁)").addClass('animated tada');
					}
					$('.lamlai').removeClass('animated hinge').show(1000);
					$(this).addClass('animated hinge').hide(1000);
			 	 });
      			$('.lamlai').click(function(){	
					$('#submit').removeClass('animated hinge').addClass('animated tada').show(1000);
					$('#hoanthanh').hide(1000);
					$(this).addClass('animated hinge').hide(1000);
			 	 });
			});
      	</script>