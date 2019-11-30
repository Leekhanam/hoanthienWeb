<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/khoahoc.php';
    $khoahoc = new khoahoc();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $insert_khoahoc = $khoahoc->insert_khoahoc($_POST,$_FILES);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm khóa học mới</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($insert_khoahoc)) {
                        echo $insert_khoahoc;
                    }
                 ?>
                 <form action="khoahocadd.php" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Khóa học :</label>
                                <input type="text" name="tenkhoahoc" placeholder="Nhập khóa học..." class="medium" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Ảnh đại diện :</label>
                                <input type="file" name="image" class="medium" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Mã màu :</label>
                                <input type="color" name="mamau" placeholder="Chọn mã màu..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td><label>Miêu tả :</label>
                                <textarea id="textarea" name="skill" placeholder="Nhập miêu tả..." class="medium">
                                </textarea>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Thêm" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>