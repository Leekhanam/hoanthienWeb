<?php include 'inc/header.php'; ?>
<link rel="stylesheet" type="text/css" href="./css/series.css">
<title>Code Club | Series</title>
<?php 
	if (isset($_GET['id_bh'])) {
	    $id_bh = $_GET['id_bh'];
	    Session::set('id_bh',$id_bh);
	}
	if (isset($_GET['id_bh']) && isset($_GET['id_video']) && isset($_GET['lession'])) {
		$link = $fm->curPageURL();
		$id_tk = Session::get("id_tk");
		$ls->add_lichsu($link,$id_tk,$id_bh);
	}
 ?>
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
				</div>
      	</div>
      		<?php 	
	    			if (Session::get('id_bh')) {
	    				$id_bh = Session::get("id_bh");
	    				$get_edit_baihoc = $bh->get_edit_baihoc($id_bh);
						if (isset($get_edit_baihoc)) {
						while ($resultbh = $get_edit_baihoc->fetch_assoc()) {
      		 ?>
      	<div class="link">
      		<div>HOME / SERIES / <?php echo $resultbh['name_bh']; ?> / 
      			<?php if (isset($_GET['lession'])) {
      				echo 'LESSION '.$_GET['lession'];
      			} ?></div>
      	</div>
      	<section class="alert-primary">
      		<aside>
	      		<div id="thediv_scroll">
	      			<div class="text-center">
	      				<img width="30%" src="image/logo.png">
	      			</div>
	      			<div id="tieude">
	      				<img width="20%" src="image/rela.svg" align="left">
	      				<h5 align="right"><?php echo $resultbh['name_bh']; ?></h5>
	      				<i class="fa fa-code"> 6 Lession</i> <i class="fa fa-bullhorn"><?php echo $resultbh['ngaytao']; ?></i>
	      			</div>
	      			<hr />
	      		
	    	<?php 
	    		if (isset($_GET['id_bh'])) {
	    			$id_bh = $_GET['id_bh'];
	    		}
				$get_video = $vd->get_video($id_bh);
					if (isset($get_video)) {
						$i = 0;
						while ($result = $get_video->fetch_assoc()) {
						$i++;
				?>
	    	
	    		<div <?php if (isset($_GET['id_video'])) {
	    			$id_video = $_GET['id_video'];
	    			if ($id_video == $result['id_video'] ) {
	    				echo "class='alert-success'";
	    			}
	    		}else {
	    			$id_video = $result['id_video'];
	    		} ?>><a href="series.php?id_bh=<?php echo Session::get("id_bh"); ?>&id_video=<?php echo $result['id_video']; ?>&lession=<?php echo $i; ?>"><i class="number"><?php echo $i; ?></i> <?php echo $result['name_vd']; ?></a></div><br><br>
	    			<?php }} ?>
	    			<div class="text-center alert-success">
	    				<a href="ask.php?id_bh=<?php echo Session::get("id_bh"); ?>">Ask Series? <i class="fa fa-arrow-circle-right"></i></a>
	    			</div>
      		</div>
      		</aside>
	      	<div class="phongto">
	      		<button>Full screen</button>
	      	</div>
	      	<article>
	      		<div id="demo" class="carousel slide">
					  
					  <!-- The slideshow -->
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					    	<?php 
					    		$get_link = $vd->get_link($id_video);
									if (isset($get_link)) {
										while ($result = $get_link->fetch_assoc()) {
					    	 ?>
					      <iframe width="820" height="500" src="<?php echo $result['link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					  <?php }} ?>
					    </div>
					  </div>
					  
					  <!-- Left and right controls -->
					  	<!-- Prev -->
					  	<?php 
					  	if (isset($_GET['id_bh']) && isset($_GET['id_video']) && isset($_GET['lession'])) {
					  			$id_bh = $_GET['id_bh'];
					  			$id_video = $_GET['id_video'];
					  			$link_prev = $vd->link_prev($id_bh,$id_video);
									if (isset($link_prev)) {
									while ($resultpr = $link_prev->fetch_assoc()) {
						?>
					  <a class="carousel-control-prev prev" href="series.php?id_bh=<?php echo Session::get("id_bh"); ?>&id_video=<?php echo $resultpr['id_video']; ?>&lession=<?php echo $_GET['lession']-1; ?>" data-slide="prev">
					    <span class="carousel-control-prev-icon"></span>
					  </a>
					<?php 
							}}
						}else { 
							$link_prev2 = $vd->link_prev2($id_bh);
									if (isset($link_prev2)) {
									while ($resultpr2 = $link_prev2->fetch_assoc()) {
						?>	
						<a class="carousel-control-prev prev" href="series.php?id_bh=<?php echo Session::get("id_bh"); ?>&id_video=<?php echo $resultpr2['id_video']; ?>&lession=<?php echo Session::get("soluong"); ?>>" data-slide="prev">
					    <span class="carousel-control-prev-icon"></span>
					  </a>
					<?php	
						}}}
					 ?>

						<!-- Next -->
					  <?php 
					  	if (isset($_GET['id_bh']) && isset($_GET['id_video']) && isset($_GET['lession'])) {
					  			$id_bh = $_GET['id_bh'];
					  			$id_video = $_GET['id_video'];
					  			$link_next = $vd->link_next($id_bh,$id_video);
									if (isset($link_next)) {
									while ($resultne = $link_next->fetch_assoc()) {
						?>
					  <a class="carousel-control-next next" href="series.php?id_bh=<?php echo Session::get("id_bh"); ?>&id_video=<?php echo $resultne['id_video']; ?>&lession=<?php echo $_GET['lession']+1; ?>" data-slide="next">
					    <span class="carousel-control-next-icon"></span>
					  </a>
					  <?php 					
							}}
					  	}else {
					  		$link_next2 = $vd->link_next2($id_bh);
									if (isset($link_next2)) {
									while ($resultne2 = $link_next2->fetch_assoc()) {
					  	?>	
					  <a class="carousel-control-next next" href="series.php?id_bh=<?php echo Session::get("id_bh"); ?>&id_video=<?php echo $resultne2['id_video']; ?>&lession=1" data-slide="next">
					    <span class="carousel-control-next-icon"></span>
					  </a>
					  <?php 	
					  	}}}
					   ?>
					</div>
	      	</article>
	      	<div style="clear: both;"></div>
	      	<div class="text-center alert-success ad">
	      		<img src="admin/uploads/<?php echo Session::get("logoWSQC"); ?>">
	      		<a href="<?php echo Session::get("link"); ?>"><?php echo Session::get("chuthich"); ?> </a>
	      		<a style="margin-left: 20px;" href="<?php echo Session::get("link"); ?>"> AD</a>
	      	</div>
      	</section>
      	<div style="margin: 120px;"></div>
      	<div class="container commit">
      		<div class="row">
      			<div class="col-sm-12">
	      			<p class="alert-primary tacgia">Về chủ đề này</p>
	      			<div class="col-sm-11 text-left tuthuat">
	      				<img width="140" height="100" src="image/logo.png" align="left"><p><?php echo $resultbh['chuthich']; ?></p>
	      				<p class="xuatban"><i>Xuất bản vào ngày <?php echo $resultbh['ngaytao']; ?>.</i></p>
	      			</div>
      			</div>
      		</div>
      		<?php }}} ?>
      		<!--Comments-->
      		<?php 
      			if (isset($_GET['id_video']) && isset($_GET['lession'])) {
      		 ?>
      		<div class="row Comments">
      			<div class="col-sm-12">
      				<p class="alert-primary tacgia">Thảo luận</p>
					<div class="response-area">
						<h2>(<span id="total_cmt"></span> ) Bình luận <a id="binhluan"></a></h2>
						<ul class="media-list" id="data">
							
						</ul>	
						<div class="row">
							<div class="col-sm-12 dangnhap">
							  <!-- The Modal -->
							  <div class="modal fade" id="dangnhap">
							    <div class="modal-dialog">
							      <div class="modal-content">				      	
							      	<div class="modal-header">
							          <h3 class="text-left btn border">Xóa</h3>
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							        </div>
					                <div class="container-content">
					                    <h6 class="text-primary text-center">Bạn có chắc chắn muốn xóa bình luận này không?</h6>
					                </div>

							        <!-- Modal footer -->
							        <button type="button" id="delete" class="btn btn-success" data-dismiss="modal">Delete</button>
							      </div>
							    </div>
							  </div>
					      </div>
							 	<div class="col-sm-12">
                            <div class="active in" id="reviews">
                                    <p id="loadcmt">Xem thêm <a id="themcmt"></a></p>                                
                                <div id="data" class="col-sm-12">
                                           
                                </div>
                            <div id="formcmt">
                                    <p><b>Viết bình luận của bạn</b></p>
                                <form action="" method="POST">
                                    <textarea name="comment" id="comment"></textarea>
                                    <button type="button" id="cmt" class="btn btn-default alert-success pull-right">
                                            Bình luận
                                    </button>
                                </form>
                            </div>
                            <div id="formrecmt">
                            		<p><b>Viết replay của bạn</b></p>
                            	<form action="" method="POST">
                                    <textarea name="recomment" id="recomment"></textarea>
                                    <button type="button" id="recmt" class="btn btn-default alert-success pull-right">
                                            REPLAY
                                    </button>
                                </form>
                            </div>
                                </div>
                            </div>
							 </div>				
					</div>
      			</div>
      		</div>
      	<?php } ?>
      	</div>

      	<?php include 'inc/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.phongto').click(function(){
			$('aside').hide(200);
			$('article').animate({width: '100%'}, "slow");
			$('iframe').animate({width: '100%'}, "slow").addClass('animated slideInDown slow');
	  });
		$('.phongto').dblclick(function(){
			$('aside').show(200);
			$('article').animate({width: '65%'});
			$('iframe').animate({width: '820px'});
			$('article').hide();
			$('article').show(200);
	  });
	
                <?php 
                	if (isset($_GET['id_video'])) {
                ?>		
                	
                CKEDITOR.replace( 'comment' );
                CKEDITOR.replace( 'recomment' );
                
                $('#cmt').on('click', function(){

                    if(CKEDITOR.instances['comment'].getData() == ""){
                        $("#comment").focus();
                    }else{
                    	
						var comment = CKEDITOR.instances['comment'].getData();
                        var id_video = <?php echo $_GET['id_video']; ?>;
                        var id_tk = <?php echo Session::get("id_tk"); ?>;
                        $.ajax({
                            url: 'admin/data/cmt.php',
                            type: 'POST',
                            data: {
                            	id_tk: id_tk,
                            	id_video: id_video,
                                comment: comment,
                            },
                            success: function(data){
                            	$('#binhluan').html('<i class="fa fa-spinner fa-spin"></i>');
					            setTimeout(function(){
					            	$('#binhluan').html('');
					                DisplayData();
					                TotalData();
                                	CKEDITOR.instances['comment'].setData() = null;                
					            }, 1500);

                            }
                        });

                    }
                }); 

                $('#xoacmt').on('click', function(){
                    	var id_cmt = $(this).val();
                    	alert(id_cmt);
						var comment = CKEDITOR.instances['comment'].getData();
                        var id_video = <?php echo $_GET['id_video']; ?>;
                        var id_tk = <?php echo Session::get("id_tk"); ?>;
                        $.ajax({
                            url: 'admin/data/cmt.php',
                            type: 'POST',
                            data: {
                            	id_tk: id_tk,
                            	id_video: id_video,
                                comment: comment,
                            },
                            success: function(data){
                            	$('#binhluan').html('<i class="fa fa-spinner fa-spin"></i>');
					            setTimeout(function(){
					            	$('#binhluan').html('');
					                DisplayData();
					                TotalData();
                                	CKEDITOR.instances['comment'].setData() = null;                
					            }, 1500);

                            }
                        });
                });    

                $('#recmt').on('click', function(){
                	var id_cmt = $(this).val();
                	if(CKEDITOR.instances['recomment'].getData() == ""){
                        $("#recomment").focus();
                    }else{
 
						var recomment = CKEDITOR.instances['recomment'].getData();
                        var id_video = <?php echo $_GET['id_video']; ?>;
                        var id_tk = <?php echo Session::get("id_tk"); ?>;
                        $.ajax({
                            url: 'admin/data/cmt.php',
                            type: 'POST',
                            data: {
                            	id_cmt: id_cmt,
                            	id_tk: id_tk,
                            	id_video: id_video,
                                recomment: recomment,
                            },
                            success: function(data){
                            	DisplayData();
                                CKEDITOR.instances['recomment'].setData() = null;
                            }
                        });
                    }
                	                
                });

                	var limit = 2;
	                var start = 0;
	                var id_video = <?php echo $_GET['id_video']; ?>;
                function DisplayData(){
               
                    $.ajax({
                        url: 'admin/data/comment.php',
                        type: 'POST',
                        data: {
                            limit: limit,
                            start: start,
                            id_video: id_video,         
                        },
                        success: function(response){
                            $('#data').html(response);
                        }
                    });
                }


                var action = 'inactive';
            function load_country_data(limit, start, id_video)
             	{
	              $.ajax({
	               	url:"admin/data/comment.php",
	               	method:"POST",
	               	data:{
	               		limit: limit,
                        start: start,
                        id_video: id_video,
	                },
	               cache:false,
	               success:function(data)
	               {
	                	$('#data').html(data);
	               }
	              });
             	}

             	if(action == 'inactive')
		            {
		              action = 'active';
		              load_country_data(limit, start, id_video);
		            }
		             
		            $('#loadcmt').on('click', function(){
		               action = 'active';
		               limit += 2;
		               $('#themcmt').html('<i class="fa fa-spinner fa-spin"></i>');
		            setTimeout(function(){
		                load_country_data(limit, start, id_video);
		                $('#themcmt').html('');
		            }, 1000);
		              
		             });

		        function TotalData(){
               
                    $.ajax({
                        url: 'admin/data/cmt.php',
                        type: 'POST',
                        data: {
                            id_video: id_video,         
                        },
                        success: function(response){
                            $('#total_cmt').html(response);
                            if (response <= 2) {
                            	$('#loadcmt').hide();
                            }else {
				                $('#loadcmt').show(500);
				            }
                        }
                    });
                }
		            TotalData();
                <?php
           		 }
                 ?>
	});
</script>