<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/chude.php';
    include '../classes/khoahoc.php';
    $cd = new chude();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name_cd = $_POST['name_cd'];
        $khoahoc = $_POST['khoahoc'];
        $insert_chude = $cd->insert_chude($name_cd,$khoahoc);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm chủ đề</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($insert_chude)) {
                        echo $insert_chude;
                    }
                 ?>
                 <form action="chudeadd.php" method="post">
                    <table class="form">					
                        <tr> 
                            <td><label>Chủ đề</label>  <br />                       
                            <input type="text" name="name_cd" placeholder="Nhập chủ đề..." class="medium" required="" />
                            </td>                          
                        </tr>
                        <tr>
                        <td>
                            <label>Khóa học</label><br />
                            <select id="select" name="khoahoc">
                                <?php 
                                    $kh = new khoahoc();
                                    $show_khoahoc = $kh->show_khoahoc();
                                    if (isset($show_khoahoc)) {
                                        while ($result = $show_khoahoc->fetch_assoc()) {
                                     ?>
                                        <option value="<?php echo $result['id_kh']; ?>">
                                            <?php echo $result['name_kh']; ?>
                                        </option>
                                <?php }} ?>
                            </select>
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