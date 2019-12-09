<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/comment.php';
    $cmt = new comment();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Bài học được bình luận</h2>
        <div class="block">
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="15%">No.</th>
                    <th width="25%">Name</th>
                    <th width="25%">Số lượng video được bình luận</th>
                    <th width="25%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $show_baihoc_cmt = $cmt->show_baihoc_cmt();
                        if ($show_baihoc_cmt) {
                            $i=0;
                            while ($result = $show_baihoc_cmt->fetch_assoc()) {
                            $i++;
                             $id_bh = $result['id_bh'];
                        $show_soluong_vd = $cmt->show_soluong_vd($id_bh);
                             if ($show_soluong_vd) {
                             while ($resultsl = $show_soluong_vd->fetch_assoc()) {
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['name_bh']; ?></td>             
                    <td><?php echo $resultsl['soluong']; ?></td>
                <td>
                    <a href="videocmt.php?id_bh=<?php echo $result['id_bh']; ?>">Xem Chi Tiết</a>
                </td>
                    </tr>   
                <?php }}}} ?> 
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
