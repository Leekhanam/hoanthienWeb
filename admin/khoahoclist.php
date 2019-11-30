<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/khoahoc.php';
	$kh = new khoahoc();
	if (isset($_GET['id_kh'])) {
    $id_kh = $_GET['id_kh'];
    $del_khoahoc = $kh->del_khoahoc($id_kh);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Khóa học List</h2>
                <div class="block">     
                	<?php 
                        echo Session::get('success');
                        Session::set('success',null);
                	 ?>	
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Image</th>
							<th>Mã màu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_khoahoc = $kh->show_khoahoc();
							if (isset($show_khoahoc)) {
								$i = 0;
								while ($result = $show_khoahoc->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name_kh']; ?></td>
							<td><img width="50" src="uploads/<?php echo $result['image_kh']; ?>"></td>
							<td><?php echo $result['mamau']; ?></td>
							<td><a href="khoahocedit.php?id_kh=<?php echo $result['id_kh']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete?');" href="khoahoclist.php?id_kh=<?php echo $result['id_kh']; ?>">Delete</a></td>
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

