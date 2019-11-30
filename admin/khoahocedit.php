<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/khoahoc.php';
    $kh = new khoahoc();
    if (isset($_GET['id_kh'])) {
    $id_kh = $_GET['id_kh'];
    }else{
        echo "<script>window.location = 'khoahoclist.php';</script>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $update_khoahoc = $kh->update_khoahoc($id_kh,$_POST,$_FILES);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit khóa học</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($update_khoahoc)) {
                        echo $update_khoahoc;
                    }

                    $get_edit_khoahoc= $kh->get_edit_khoahoc($id_kh);
                    if (isset($get_edit_khoahoc)) {
                        
                        while ($resultb = $get_edit_khoahoc->fetch_assoc()) {
                 ?>
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td>
                                <label>Khóa học :</label>
                                <input type="text" name="tenkhoahoc" placeholder="Nhập khóa học..." class="medium" value="<?php echo $resultb['name_kh']; ?>" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Ảnh đại diện :</label>
                                <img width="20%" src="uploads/<?php echo $resultb['image_kh']; ?>">
                                <input type="file" name="image" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mã màu :</label>
                                <input type="color" name="mamau" placeholder="Chọn mã màu..." value="<?php echo $resultb['mamau']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Miêu tả :</label>
                                <textarea id="textarea" name="skill" placeholder="Nhập miêu tả..." class="medium"><?php echo $resultb['skill']; ?></textarea>
                            </td>
                        </tr>
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
<?php include 'inc/footer.php';?>