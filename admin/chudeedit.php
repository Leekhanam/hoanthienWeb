<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/chude.php';
    include '../classes/khoahoc.php';
    if (isset($_GET['id_cd'])) {
    $id_cd = $_GET['id_cd'];
    }else{
        echo "<script>window.location = 'chudelist.php';</script>";
    }
    $cd = new chude();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $name_cd = $_POST['name_cd'];
        $khoahoc = $_POST['khoahoc'];
        $update_chude = $cd->update_chude($id_cd,$name_cd,$khoahoc);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit chủ đề</h2>
               <div class="block copyblock"> 
                 <?php 
                    if (isset($update_chude)) {
                        echo $update_chude;
                    }

                    $get_edit_chude = $cd->get_edit_chude($id_cd);
                    if (isset($get_edit_chude)) {
                        
                        while ($result = $get_edit_chude->fetch_assoc()) {
                 ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input type="text" name="name_cd" placeholder="Nhập chủ đề..." class="medium" value="<?php echo $result['name_cd']; ?>" />
                            </td>
                        </tr>
                        <td>
                            <label>Khóa học</label><br />
                            <select id="select" name="khoahoc">
                                <?php 
                                    $kh = new khoahoc();
                                    $show_khoahoc = $kh->show_khoahoc();
                                    if (isset($show_khoahoc)) {
                                        while ($resultkh = $show_khoahoc->fetch_assoc()) {
                                     ?>
                                        <option <?php if ($result['id_kh'] == $resultkh['id_kh']) {
                                            echo "selected";
                                        } ?> value="<?php echo $resultkh['id_kh']; ?>">
                                            <?php echo $resultkh['name_kh']; ?>
                                        </option>
                                <?php }} ?>
                            </select>
                        </td>
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