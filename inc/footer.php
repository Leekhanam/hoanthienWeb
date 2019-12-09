<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				<div class="email text-center">
					<img width="25%" src="image/flash.png" class="rounded-circle" align="left">
					<div class="form">
						<p class="col-sm-9"> Nếu bạn muốn đóng góp cho cộng đồng tại <br /><strong>Code Club</strong> hãy gửi email cho tôi hoặc liên hệ trực tiếp với địa chỉ bên dưới!</p>
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
						<span style="margin-right: 40px;">ĐC: <?php echo Session::get('diachi'); ?></span> <span style="margin-right: 40px;">SĐT liên hệ: <?php echo Session::get('sdt'); ?></span>
						<span>Email: <?php echo Session::get('email'); ?></span>
						<p><?php echo Session::get('copyright'); ?></p>
						<p>Được thiết kế <i class="fa fa-heart"></i> Anh Tú . Tự hào được giúp đỡ các bạn với cộng đồng Github .</p>
					</div>
				</div>
			</div>
			</div>
	</footer>
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
		$(".khoahoc").mouseenter(function(){
    	$(".play").addClass('animated heartBeat fast');
	});

		$("#logo").mouseenter(function(){
    	$(this).addClass('animated tada');
	});
		$("#logo").mouseleave(function(){
			$(this).removeClass('animated tada');
	  });

	$(".PhaiDN").click(function(){
			$("#phaiDN").modal();
	  });

        $("#myBtn").click(function(){
            $("#dangki").modal();
        });

        $("#myBtn").click(function(){
            $("#dangnhap").modal();
        });

        $("#chuyenForm").click(function(){
            $("#Sign").show(1000);
            $("#signAuth").hide(1000);
        });

        $.ajax({
            url: './admin/data/cmt.php',
            type: 'POST',
            data: {
            kh: 1,
            },
            success: function(data){
			// Tạo thành mảng với mỗi phần tử ngăn bởi khoảng trắng
			// kết quả là mảng có hai phần tử gồm: welcome và feetuts.net
			var data = data.split(" ");
			data.shift();
			data.pop();
			  $('#keywords').placeholderTypewriter({text: data});
            }
 		});
});
</script>
<script src="./js/search.js" type="text/javascript"></script>
</body>
</html>