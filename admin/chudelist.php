<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/chude.php';
	$cd = new chude();
	if (isset($_GET['id_cd'])) {
    $id_cd = $_GET['id_cd'];
    $del_chude = $cd->del_chude($id_cd);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Chủ đề List</h2>
                <div class="block">     
                	<?php 
                    if (isset($del_chude)) {
                        echo $del_chude;
                    }
                        echo Session::get('success');
                        Session::set('success',null);
                	 ?>	
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Thuộc khóa học</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_chude = $cd->show_chude();
							if (isset($show_chude)) {
								$i = 0;
								while ($result = $show_chude->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name_cd']; ?></td>
							<td><?php echo $result['name_kh']; ?></td>
							<td><a href="chudeedit.php?id_cd=<?php echo $result['id_cd']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete?');" href="chudelist.php?id_cd=<?php echo $result['id_cd']; ?>">Delete</a></td>
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

