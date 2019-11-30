<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
	include '../classes/baihoc.php';
    $bh = new baihoc();
    if (isset($_GET['id_bh'])) {
		$id_bh = $_GET['id_bh'];
		$del_baihoc = $bh->del_baihoc($id_bh);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Bài học List</h2>
        <div class="block">
       			 <?php 
                        echo Session::get('success');
                        Session::set('success',null);
                	 ?>  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="20%">Name</th>
					<th width="10%">Image</th>
					<th width="10%">Action</th>
					<th width="15%">Add video || câu hỏi</th>
					<th width="10%">All video || câu hỏi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$show_baihoc = $bh->show_baihoc();
						if ($show_baihoc) {
							$i=0;
							while ($result = $show_baihoc->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><h2><?php echo $result['name_bh']; ?></h2></td>
					<td><img src="uploads/<?php echo $result['image']; ?>" width="35%"/></td>				
				<td>
					<a href="baihocedit.php?id_bh=<?php echo $result['id_bh']; ?>"><i style="font-size: 23px;" class="fa fa-edit"> </i> </a> <----> 
					<a onclick="return confirm('Are you sure to Delete!');" href="?id_bh=<?php echo $result['id_bh']; ?>" > <i style="font-size: 23px;" class="fa fa-times-circle"> </i></a> 
				</td>
				<td>
					<a href="videoadd.php?id_bh=<?php echo $result['id_bh']; ?>"><i style="font-size: 23px;" class="fa fa-plus-square"></i></a> <-----------> 
					<a href="cauhoiadd.php?id_bh=<?php echo $result['id_bh']; ?>"><i style="font-size: 23px;" class="fa fa-plus-square-o"></i></a>
				</td>
				<td>
					<a href="videolist.php?id_bh=<?php echo $result['id_bh']; ?>"><i style="font-size: 23px;" class="fa fa-external-link-square"></i></a><-----------> 
					<a href="cauhoilist.php?id_bh=<?php echo $result['id_bh']; ?>"><i style="font-size: 23px;" class="fa fa-external-link"></i></a>
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
