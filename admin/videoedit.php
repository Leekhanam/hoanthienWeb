<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/baihoc.php';
    include '../classes/video.php';
    $vd = new video();
    if (isset($_GET['id_video']) && isset($_GET['id_bh'])) {
        $id_bh = $_GET['id_bh'];
        $id_video = $_GET['id_video'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $link = $_POST['link'];
        $update_video = $vd->update_video($id_video,$name,$link,$id_bh);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa video bài học</h2>
        <div class="block"> 
            <?php 
                    $get_edit_video= $vd->get_edit_video($id_video);
                    if (isset($get_edit_video)) {    
                    while ($result = $get_edit_video->fetch_assoc()) {
            ?>              
         <form action="" method="post">
            <table class="form">    
                <tr>
                    <td>
                        <label>Tên video</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Tên video..." required="" 
                        value="<?php echo $result['name_vd']; ?>" class="medium" />
                    </td>
                </tr>               
                <tr>
                    <td>
                        <label>Link</label>
                    </td>
                    <td>
                        <input type="text" name="link" placeholder="Link video..." required="" 
                        value="<?php echo $result['link']; ?>" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thay đổi" />
                    </td>
                </tr>
            </table>
            </form>
        <?php }} ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>