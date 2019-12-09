<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/comment.php';
    $cmt = new comment();
    if (isset($_GET['id_cmt']) || isset($_GET['parent_cmt'])) {
        $id_cmt = $_GET['id_cmt'];
    }else {
        header('Location: ../404.php');
    }

    if (isset($_GET['parent_cmt'])) {
        $parent_cmt = $_GET['parent_cmt'];
        $del_recmt = $cmt->del_recmt($parent_cmt);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Trả lời bình luận</h2>
        <div class="block">
            <?php 
                if (Session::get("success")) {
                    echo Session::get("success");
                    Session::set('success',null);
                }
             ?>
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="15%">Tên người dùng</th>
                    <th width="30%">Bình luận</th>
                    <th width="15%">Giờ</th>
                    <th width="15%">Ngày</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $show_recmt = $cmt->show_recmt($id_cmt);
                        if ($show_recmt) {
                            $i=0;
                            while ($result = $show_recmt->fetch_assoc()) {
                            $i++;
                ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['name']; ?></td>             
                    <td><?php echo $result['comment']; ?></td>
                    <td><?php echo $result['house']; ?></td>
                    <td><?php echo $result['date']; ?></td>
                <td>
                    <a href="?parent_cmt=<?php echo $result['parent_cmt']; ?>">Xóa</a>
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
