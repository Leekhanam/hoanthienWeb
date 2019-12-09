<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/comment.php';
    $cmt = new comment();
    if (isset($_GET['id_bh'])) {
        $id_bh = $_GET['id_bh'];
    }else {
        header('Location: ./404.php');
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Video được bình luận</h2>
        <div class="block">
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="10%">No.</th>
                    <th width="30%">Name</th>
                    <th width="10%">Số lượng bình luận</th>
                    <th width="15%">Cũ nhất</th>
                    <th width="15%">Mới nhất</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $show_video_cmt = $cmt->show_video_cmt($id_bh);
                        if ($show_video_cmt) {
                            $i=0;
                            while ($result = $show_video_cmt->fetch_assoc()) {
                            $i++;
                             $id_video = $result['id_video'];
                        $show_soluong_cmt = $cmt->show_soluong_cmt($id_video);
                             if ($show_soluong_cmt) {
                             while ($resultsl = $show_soluong_cmt->fetch_assoc()) {
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['name_vd']; ?></td>             
                    <td><?php echo $resultsl['soluong']; ?></td>
                    <td><?php echo $resultsl['min']; ?></td>
                    <td><?php echo $resultsl['max']; ?></td>
                <td>
                    <a href="allcmt.php?id_video=<?php echo $result['id_video']; ?>">Xem Chi Tiết</a>
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
