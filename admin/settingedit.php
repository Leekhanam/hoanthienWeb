<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/setting.php';
    $st = new setting();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['site'])) {
        $update_setting = $st->update_setting($_POST,$_FILES);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quangcao'])) {
        $update_qc = $st->update_qc($_POST,$_FILES);
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Site</h2>
        <div class="block">    
        <?php 
                    if (isset($update_setting)) {
                        echo $update_setting;
                    }
                    if (isset($update_qc)) {
                        echo $update_qc;
                    }

                    $show_setting = $st->show_setting();
                    if (isset($show_setting)) {
                        while ($result = $show_setting->fetch_assoc()) {
                 ?>           
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>Logo</td>
                    <td>
                        <img width="30%" src="uploads/<?php echo $result['logo'] ?>">
                        <input type="file" name="image" placeholder="Chọn Logo..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        Số điện thoại
                    </td>
                    <td>
                        <input type="text" name="sdt" placeholder="Nhập số..." value="<?php echo $result['sdt'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Nhập email..." value="<?php echo $result['email'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        Địa chỉ
                    </td>
                    <td>
                        <input type="text" name="diachi" placeholder="Nhập địa chỉ..." value="<?php echo $result['diachi'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        Copyright
                    </td>
                    <td>
                        <input type="text" name="copyright" placeholder="Nhập copyright..." value="<?php echo $result['copyright'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <input type="submit" name="site" Value="Thay đổi" />
                    </td>
                </tr>
            </table>
            </form>
            <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        Quảng cáo
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result['logowsqc'] ?>">
                        <input type="file" name="logowsqc" placeholder="Chọn logo website QC..." class="medium" />
                        <br>
                        <input type="text" name="chuthich" placeholder="Nhập chú thích..." value="<?php echo $result['chuthich'] ?>" class="medium" />
                        <br>
                        <input type="text" name="link" placeholder="Nhập link..." value="<?php echo $result['link'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="quangcao" Value="Thay đổi" />
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


