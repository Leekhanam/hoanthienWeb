<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/comment.php';
    $cmt = new comment();
    if (isset($_GET['id_video'])) {
        $id_video = $_GET['id_video'];
    }else {
        header('Location: ./404.php');
    }

    if (isset($_GET['id_video']) && isset($_GET['id_cmt'])) {
        $id_video = $_GET['id_video'];
        $id_cmt = $_GET['id_cmt'];
        $del_cmt = $cmt->del_cmt($id_video,$id_cmt);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Bình luận</h2>
        <div class="block">
            <?php 
                if (isset($del_cmt)) {
                    echo $del_cmt;
                }
             ?>
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="15%">Tên người dùng</th>
                    <th width="30%">Bình luận</th>
                    <th width="10%">Giờ</th>
                    <th width="10%">Ngày</th>
                    <th width="13%">Số lượng trả lời</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $show_cmt = $cmt->show_cmt($id_video);
                        if ($show_cmt) {
                            $i=0;
                            while ($result = $show_cmt->fetch_assoc()) {
                            $i++;
                             $id_cmt = $result['id_cmt'];
                        $show_soluong_recmt = $cmt->show_soluong_recmt($id_cmt);
                             if ($show_soluong_recmt) {
                             while ($resultsl = $show_soluong_recmt->fetch_assoc()) {
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['name']; ?></td>             
                    <td><?php echo $result['comment']; ?></td>
                    <td><?php echo $result['house']; ?></td>
                    <td><?php echo $result['date']; ?></td>
                    <td><?php echo $resultsl['soluong']; ?></td>
                <td>
                    <?php 
                        if ($resultsl['soluong'] != 0) {
                     ?>
                    <a href="allrecmt.php?id_cmt=<?php echo $result['id_cmt']; ?>">Chi tiết</a> | 
                    <?php } ?>
                    <a href="?id_video=<?php echo $id_video; ?>&id_cmt=<?php echo $result['id_cmt']; ?>">Xóa</a>
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
