<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/lichsu.php';
	$ls = new lichsu();
	$show_lichsu = $ls->show_lichsu();
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Lịch sử học</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th width="25%">Tên thành viên</th>
					<th>Image</th>
					<th>Số khóa học</th>
					<th>Số bài học</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if (isset($show_lichsu)) {
						$i = 0;
						while ($result = $show_lichsu->fetch_assoc()) {
							$i++;
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td>
						<img width="100" height="100" src="uploads/<?php echo $result['image_tk']; ?>">
					</td>
					<td><?php echo $result['khoahoc']; ?></td>
					<td class="center"><?php echo $result['baihoc']; ?></td>
					<td><a href="ctlichsu.php?id_tk=<?php echo $result['id_tk']; ?>">Chi tiết</a></td>
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
