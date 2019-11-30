<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/baihoc.php';
    include '../classes/chude.php';
    include '../classes/khoahoc.php';
    $bh = new baihoc();
    if (isset($_GET['id_bh'])) {
        $id_bh = $_GET['id_bh'];
    }else{
        echo "<script>window.location = 'baihoclist.php';</script>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $update_baihoc = $bh->update_baihoc($_POST,$_FILES,$id_bh);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit bài học</h2>
        <div class="block">    
        <?php 
                    if (isset($update_baihoc)) {
                        echo $update_baihoc;
                    }

                    $get_edit_baihoc = $bh->get_edit_baihoc($id_bh);
                    if (isset($get_edit_baihoc)) {
                        while ($result = $get_edit_baihoc->fetch_assoc()) {
                 ?>           
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name_bh" value="<?php echo $result['name_bh']; ?>" placeholder="Nhập bài học..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Keyword</label>
                    </td>
                    <td>
                        <input type="text" name="keyword" value="<?php echo $result['keyword']; ?>" placeholder="Nhập keyword..." class="medium" required="" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <img width="100" height="100" src="./uploads/<?php echo $result['image']; ?>">
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Chú thích</label>
                    </td>
                    <td>
                    <textarea id="textarea" name="chuthich" placeholder="Nhập miêu tả..." class="medium" ><?php echo $result['chuthich']; ?></textarea>
                    </td>
                </tr>

                <tr>
                        <td><label>Chọn chủ đề</label></td>
                            <td><select id="select" name="chude">
                                <?php 
                                    $cd = new chude();
                                    $show_chude = $cd->show_chude();
                                    if (isset($show_chude)) {
                                        while ($resultcd = $show_chude->fetch_assoc()) {
                                     ?>
                                        <option <?php if ($result['id_cd'] == $resultcd['id_cd']) {
                                            echo "selected";
                                        } ?> value="<?php echo $resultcd['id_cd']; ?>">
                                            <?php echo $resultcd['name_cd']; ?>
                                        </option>
                                <?php }} ?>
                            </select></td>
                </tr>
                <select name="status">
                        <option value="0">Chưa hoàn thành</option>
                        <option <?php if ($result['status'] == 1) {
                            echo "selected";
                        } ?> value="1">Hoàn thành</option>
                    </select>
				<tr>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


