<?php 
	$filepath = realpath(dirname(__FILE__));
	include 'db.php'; 
	Session::init();
            if (isset($_POST['limit']) && isset($_POST['start']) && isset($_POST['id_video'])) {
                    $limit = $_POST['limit']; 
                    $start = $_POST['start'];
                	$id_video = $_POST['id_video'];
?>
		<input type="hidden" id="click" name="" value="<?php echo $limit; ?>">
		<input type="hidden" id="id_cmt" name="">
<?php
                $cmt = "SELECT * FROM comment
                    INNER JOIN taikhoan ON comment.id_tk = taikhoan.id_tk
                    WHERE id_video = '$id_video' AND parent_cmt=0 
                    ORDER BY id_cmt DESC LIMIT $start,$limit";
                    $kqcmt = $connect->query($cmt);
                        foreach ($kqcmt as $key => $cmts) {
            
?>				

					<li class="media">								
								<a class="pull-left" href="#">
									<img class="media-object" src="admin/uploads/<?php echo $cmts['image']; ?>" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?php echo $cmts['name']; ?></li>
										<li><i class="fa fa-clock-o"></i> <?php echo $cmts['house']; ?></li>
										<li><i class="fa fa-calendar"></i> <?php echo $cmts['date']; ?></li>    
									</ul>
									<div id="<?php if (Session::get("id_tk") == $cmts['id_tk']) {
										echo 'loadcomment'.$cmts['id_cmt'];
										}
									?>" class="actbinhluan">
									<?php echo $cmts['comment']; ?> 
									<?php if (Session::get("id_tk") == $cmts['id_tk']) {
									?>
						<button type="button" id="<?php echo 'suacmt'.$cmts['id_cmt'] ?>" value="<?php echo $cmts['id_cmt']; ?>" class="act"><i class="fa fa-cog"> </i>
							</button>
						<button type="button" id="<?php echo 'xoacmt'.$cmts['id_cmt'] ?>" value="<?php echo $cmts['id_cmt']; ?>" class="act"><i class="fa fa-trash"> </i>
							</button>
									<?php } ?>	
                              		</div>
                              		<div style="display: none;" id="<?php echo 'chosua'.$cmts['id_cmt'] ?>">
                            <textarea name="suabinhluan<?php echo $cmts['id_cmt'] ?>" id="suabinhluan<?php echo $cmts['id_cmt'] ?>">
                              				<?php echo $cmts['comment']; ?></textarea>
                              			<button class="btn btn-primary" id="<?php echo 'sua'.$cmts['id_cmt'] ?>" style="float: right;" value="<?php echo $cmts['id_cmt']; ?>"><i class="fa fa-reply">Sửa</i></button>
                              		</div>
								<button class="btn btn-primary replay" value="<?php echo $cmts['id_cmt']; ?>"><i class="fa fa-reply"></i>Replay</button>
								</div>
							</li>
						<?php 
							$recmt = "SELECT * FROM comment
			                    INNER JOIN taikhoan ON comment.id_tk = taikhoan.id_tk
			                    WHERE id_video = '$id_video' 
			                    ORDER BY id_cmt DESC";
			                    $kqrecmt = $connect->query($recmt);
			                        foreach ($kqrecmt as $key => $recmts) {
			                        	if ($cmts['id_cmt'] == $recmts['parent_cmt']) {
						 ?>
							<li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="admin/uploads/<?php echo $recmts['image']; ?>" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i><?php echo $recmts['name']; ?></li>
										<li><i class="fa fa-clock-o"></i> <?php echo $recmts['house']; ?></li>
										<li><i class="fa fa-calendar"></i> <?php echo $recmts['date']; ?></li>
									</ul>
									<div id="<?php if (Session::get("id_tk") == $recmts['id_tk']) {
										echo 'loadrecmt'.$recmts['id_cmt'];
										}
									?>" class="actbinhluan">
										<?php echo $recmts['comment']; ?> 
									<?php if (Session::get("id_tk") == $recmts['id_tk']) {
									?>
								<button type="button" id="<?php echo 'suarecmt'.$recmts['id_cmt'] ?>" value="<?php echo $recmts['id_cmt']; ?>" class="act"><i class="fa fa-cog"> </i></button>
								<button type="button" id="<?php echo 'xoarecmt'.$recmts['id_cmt'] ?>" value="<?php echo $recmts['id_cmt']; ?>" class="act"><i class="fa fa-trash"> </i></button>
	                                <?php } ?>
                              		</div>
                              		<div style="display: none;" id="<?php echo 'chosuare'.$recmts['id_cmt'] ?>">
                              			<textarea name="editre<?php echo $recmts['id_cmt'] ?>" id="editre<?php echo $recmts['id_cmt'] ?>">
                              				<?php echo $recmts['comment']; ?></textarea>
                              			<button class="btn btn-primary" id="<?php echo 'suare'.$recmts['id_cmt'] ?>" style="float: right;" value="<?php echo $recmts['id_cmt']; ?>"><i class="fa fa-reply">Sửa</i></button>
                              		</div>
								</div>
							</li>
						<script type="text/javascript">
							$(document).ready(function(){	
								CKEDITOR.replace( 'editre<?php echo $recmts['id_cmt'] ?>' );
								$('<?php echo "#loadrecmt".$recmts['id_cmt'] ?>').click(function(){
									$('<?php echo "#loadrecmt".$recmts['id_cmt'] ?> > button').show(500);
							  	});
								$('body').dblclick(function(){
									$('<?php echo "#loadrecmt".$recmts['id_cmt'] ?> > button').hide(500);
							  	});

							$('<?php echo "#xoarecmt".$recmts['id_cmt'] ?>').click(function(){
			                    var id_cmt = $(this).val();
			                    $("#id_cmt").val(id_cmt);
			                    $("#dangnhap").modal();
	               		 	});

							$('<?php echo "#suarecmt".$recmts['id_cmt'] ?>').click(function(){
		                    	$('<?php echo "#loadrecmt".$recmts['id_cmt'] ?>').hide(500);
		                    	$('<?php echo '#chosuare'.$recmts['id_cmt'] ?>').show(500);
		                    	$('.replay').hide();
		               		 });

							$('<?php echo "#suare".$recmts['id_cmt'] ?>').click(function(){
	                		var id_cmt = $(this).val();
	                    if(CKEDITOR.instances['editre<?php echo $recmts['id_cmt'] ?>'].getData() == ""){
	                    	$("#id_cmt").val(id_cmt);
	                        $("#dangnhap").modal();
	                    }else{                   	
						var comment = CKEDITOR.instances['editre<?php echo $recmts['id_cmt'] ?>'].getData();

							$.ajax({
		                        url: 'admin/data/cmt.php',
		                        type: 'POST',
		                        data: {
		                        	suarecmt: 1,
		                            id_cmt: id_cmt,
		                            comment: comment,        
		                        },
		                        success: function(response){
		                            TotalData();
	                            	DisplayData();
		                        }
	                    	});
							}
						});

							$("#delete").click(function(){               		
		                    	var id_cmt = $("#id_cmt").val();
		                        $.ajax({
		                            url: 'admin/data/cmt.php',
		                            type: 'POST',
		                            data: {
		                            	xoarecmt: 1,
		                                id_cmt: id_cmt,
		                            },
		                            success: function(data){
		                            	TotalData();
		                            	DisplayData();
		                            }
		                        });
		               		 });

							  	var limit = $('#click').val();;
					                var start = 0;
					                var id_video = <?php echo $id_video; ?>;
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

							});  	
							</script>
					<?php }}
				?>
				<script type="text/javascript">
				$(document).ready(function(){
					CKEDITOR.replace( 'suabinhluan<?php echo $cmts['id_cmt'] ?>' );
					$('.act').hide();
						$('<?php echo "#loadcomment".$cmts['id_cmt'] ?>').click(function(){
							$('<?php echo "#loadcomment".$cmts['id_cmt'] ?> > button').show(500);
					  	});
						$('body').dblclick(function(){
							$('<?php echo "#loadcomment".$cmts['id_cmt'] ?> > button').hide(500);
					  	});

					$('.replay').click(function(){
	                	$("#formcmt").hide(2000);
	                	$("#formrecmt").show(2000);
	                	var id_cmt = $(this).val();
	                	$("#recmt").val(id_cmt);
                	});  

                	$('body').dblclick(function(){
						$("#formcmt").show(2000);
	                	$("#formrecmt").hide(2000);
					  });

                	$('<?php echo "#xoacmt".$cmts['id_cmt'] ?>').click(function(){
                    	var id_cmt = $(this).val();
                    	$("#id_cmt").val(id_cmt);
                    	$("#dangnhap").modal();
               		 });

                	$("#delete").click(function(){               		
                    	var id_cmt = $("#id_cmt").val();
                        $.ajax({
                            url: 'admin/data/cmt.php',
                            type: 'POST',
                            data: {
                            	xoacmt: 1,
                                id_cmt: id_cmt,
                            },
                            success: function(data){
                            	TotalData();
                            	DisplayData();
                            }
                        });
               		 });


                	$('<?php echo "#suacmt".$cmts['id_cmt'] ?>').click(function(){
                    	$('<?php echo "#loadcomment".$cmts['id_cmt'] ?>').hide(500);
                    	$('<?php echo '#chosua'.$cmts['id_cmt'] ?>').show(500);
                    	$('.replay').hide();
               		 });

                	$('<?php echo "#sua".$cmts['id_cmt'] ?>').click(function(){
                		var id_cmt = $(this).val();
                    if(CKEDITOR.instances['suabinhluan<?php echo $cmts['id_cmt'] ?>'].getData() == ""){
                    	$("#id_cmt").val(id_cmt);
                        $("#dangnhap").modal();
                    }else{                   	
						var comment = CKEDITOR.instances['suabinhluan<?php echo $cmts['id_cmt'] ?>'].getData();

						$.ajax({
	                        url: 'admin/data/cmt.php',
	                        type: 'POST',
	                        data: {
	                        	suacmt: 1,
	                            id_cmt: id_cmt,
	                            comment: comment,        
	                        },
	                        success: function(response){
	                            TotalData();
                            	DisplayData();
	                        }
                    	});
						}
					});


                	var limit = $('#click').val();;
	                var start = 0;
	                var id_video = <?php echo $id_video; ?>;
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

				});	

				</script>

			<?php
				}} 
			?>