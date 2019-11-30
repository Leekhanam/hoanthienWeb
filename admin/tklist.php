<?php 
	include 'inc/header.php';
 	include 'inc/sidebar.php';
	include '../classes/taikhoan.php';
	$taikhoan = new taikhoan();
	if (isset($_GET['id_tk'])) {
    $id_tk = $_GET['id_tk'];
    $nangcap = $taikhoan->nangcap($id_tk);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Tất cả tài khoản</h2>
                <div class="block">     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Image</th>
							<th>Phone</th>
							<th>Quyền</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_tk = $taikhoan->show_tk();
							if (isset($show_tk)) {
								$i = 0;
								while ($result = $show_tk->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><img width="50" src="uploads/<?php echo $result['image']; ?>"></td>
							<td><?php echo $result['phone']; ?></td>
							<td><?php 
								if ($result['quyen'] == 1) {
									?>
								<i style="color: red;" class="fa fa-star"></i>
								<?php
								}else if ($result['quyen'] == 2){
									?>
									<i style="color: yellow;" class="fa fa-star"></i>
								<?php
								}else{
								?>
									<i style="color: blue;" class="fa fa-star"></i>
								<?php			
								}	
							 ?></td>
							<td><?php if ($result['quyen'] == 3) {
									?> 
								<form>
								  <div class="custom-control custom-switch">
								    <input type="checkbox" class="custom-control-input" 
								    value="<?php echo $result['id_tk']; ?>"
								    id="<?php echo $result['email']; ?>">
								    <label class="custom-control-label" for="<?php echo $result['email']; ?>">(Nâng lên Admin cấp 2!)</label>
								  </div>
								</form> 
							<?php }else if ($result['quyen'] == 2){
								?>
								<form>
								  <div class="custom-control custom-switch">
								    <input type="checkbox" checked value="<?php echo $result['id_tk']; ?>"
								    class="custom-control-input" id="<?php echo $result['name']; ?>">
								    <label class="custom-control-label" for="<?php echo $result['name']; ?>">(Hạ xuống thành viên!)</label>
								  </div>
								</form>
							<?php	
							}else {
								?>
								Miễn!
							<?php
							} 
							?>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();

	    $('.custom-control-input').click(function(){
							if (this.checked == true) {	
						            var id_tk = $(this).val();
						            $.ajax({
						                url: 'data/quyen.php',
						                type: 'POST',
						                data: {
						                	nang:1,
						                	id_tk: id_tk,
						                },
						                success: function(data){				    
						                	 window.location = 'tklist.php';
						                            }
						                });
						        }else if (this.checked == false){
						        	var id_tk = $(this).val();
						            $.ajax({
						                url: 'data/quyen.php',
						                type: 'POST',
						                data: {
						                	ha:1,
						                	id_tk: id_tk,
						                },
						                success: function(data){			    
						                	window.location = 'tklist.php';
						                            }
						                });
						        }
									});
	});
</script>
<?php include 'inc/footer.php';?>

