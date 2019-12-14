<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/lichsu.php';
	$ls = new lichsu();
	if (isset($_GET['id_tk'])) {
		$id_tk = $_GET['id_tk'];
		$get_lichsu = $ls->get_lichsu($id_tk);
	}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Lịch sử học</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th width="20%">Tên khóa học</th>
					<th>Image</th>
					<th>Số bài học</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if (isset($get_lichsu)) {
						$i = 0;
						while ($result = $get_lichsu->fetch_assoc()) {
							$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['name_kh']; ?></td>
					<td>
						<img width="100" height="100" src="uploads/<?php echo $result['image_kh']; ?>">
					</td>
					<td class="center"><?php echo $result['baihoc']; ?></td>
					<td><a href="ctlskhoahoc.php?id_tk=<?php echo $id_tk; ?>&id_kh=<?php echo $result['id_kh']; ?>">Chi tiết</a></td>
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
