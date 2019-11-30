<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/cauhoi.php';
	$ch = new cauhoi();
	if (isset($_GET['id_bh'])) {
    $id_bh = $_GET['id_bh'];
    Session::set('id_bh',$id_bh);
	}
	if (isset($_GET['id_ask'])) {
    $id_ask = $_GET['id_ask'];
    $id_bh = Session::get("id_bh");
    $del_cauhoi = $ch->del_cauhoi($id_ask,$id_bh);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Câu hỏi List</h2>
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
							<th>Câu hỏi 1</th>
							<th>Câu hỏi 2</th>
							<th>Câu hỏi 3</th>
							<th>Đáp án</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_cauhoi = $ch->show_cauhoi($id_bh);
							if (isset($show_cauhoi)) {
								$i = 0;
								while ($result = $show_cauhoi->fetch_assoc()) {
								$i++;
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['dapan_1']; ?></td>
							<td><?php echo $result['dapan_2']; ?></td>
							<td><?php echo $result['dapan_3']; ?></td>
							<td><?php echo $result['dapan']; ?></td>
							<td><a href="cauhoiedit.php?id_ask=<?php echo $result['id_ask']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete?');" href="cauhoilist.php?id_ask=<?php echo $result['id_ask']; ?>">Delete</a></td>
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
