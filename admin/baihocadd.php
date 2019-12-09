<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/baihoc.php';
    include '../classes/chude.php';
    $bh = new baihoc();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        
        $insert_baihoc = $bh->insert_baihoc($_POST,$_FILES);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm bài học</h2>
        <div class="block">    
        <?php 
                    if (isset($insert_baihoc)) {
                        echo $insert_baihoc;
                    }
                 ?>           
         <form action="baihocadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" id="name_bh" name="name_bh" placeholder="Nhập bài học..." class="medium" required="" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" required="" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chú thích</label>
                    </td>
                    <td>
                    <textarea id="textarea" name="chuthich" placeholder="Nhập miêu tả..." class="medium" >
                    </textarea>
                    </td>
                </tr>

				<tr>
                        <td><label>Chọn chủ đề</label></td>
                            <td><select id="select" name="chude">
                                <?php 
                                    $cd = new chude();
                                    $show_chude = $cd->show_chude();
                                    if (isset($show_chude)) {
                                        while ($result = $show_chude->fetch_assoc()) {
                                     ?>
                                        <option value="<?php echo $result['id_cd']; ?>">
                                            <?php echo $result['name_cd']; ?>
                                        </option>
                                <?php }} ?>
                            </select></td>
                </tr>
                <tr>
                    <select name="status">
                        <option value="0">Chưa hoàn thành</option>
                        <option value="1">Hoàn thành</option>
                    </select>
                </tr>
                <tr>
                    <select name="loai">
                        <option value="0">Kiến thức update</option>
                        <option value="1">Kiến thức mới</option>
                        <option value="2">Khác</option>
                    </select>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
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


