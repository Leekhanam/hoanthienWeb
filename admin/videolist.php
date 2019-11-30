<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/video.php';
	$vd = new video();
	if (isset($_GET['id_bh'])) {
    $id_bh = $_GET['id_bh'];
    Session::set('id_bh',$id_bh);
	}
	if (isset($_GET['id_video'])) {
    $id_video = $_GET['id_video'];
    $id_bh = Session::get('id_bh');
    $del_video = $vd->del_video($id_video,$id_bh);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Video List</h2>
                <div class="block">     
                	<?php 
                        if (Session::get('success') == true) {
                        	echo Session::get("success");
                        }
                	 ?>	
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Link</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_video = $vd->show_video($id_bh);
							if (isset($show_video)) {
								$i = 0;
								while ($result = $show_video->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name_vd']; ?></td>
							<td><?php echo $result['link']; ?></td>
							<td>
								<a href="videoedit.php?id_bh=<?php echo $id_bh; ?>&id_video=<?php echo $result['id_video']; ?>">
								<i style="font-size: 23px;" class="fa fa-plus-square"></i></a> || 
								<a onclick="return confirm('Are you sure want to delete?');" href="videolist.php?id_video=<?php echo $result['id_video']; ?>"><i style="font-size: 23px;" class="fa fa-times-circle"></i></a>
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
	});
</script>
<?php include 'inc/footer.php';?>
<?php ob_end_flush(); ?>
