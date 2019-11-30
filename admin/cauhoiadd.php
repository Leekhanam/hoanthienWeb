<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/baihoc.php';
    include '../classes/cauhoi.php';
    $ch = new cauhoi();
    if (isset($_GET['id_bh'])) {
        $id_bh = $_GET['id_bh'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $cauhoi = $_POST['cauhoi'];
        $dapan_1 = $_POST['dapan_1'];
        $dapan_2 = $_POST['dapan_2'];
        $dapan_3 = $_POST['dapan_3'];
        $dapan = $_POST['dapan'];
        $insert_cauhoi = $ch->insert_cauhoi($id_bh,$cauhoi,$dapan_1,$dapan_2,$dapan_3,$dapan);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm câu hỏi bài học</h2>
        <div class="block"> 
            <?php 
                    if (isset($insert_video)) {
                        echo $insert_video;
                    }
                 ?>              
         <form action="" method="post">
            <table class="form">
                <tr>
                    <td>
                        <label>Câu hỏi</label>
                    </td>
                    <td>
                        <input type="text" name="cauhoi" placeholder="Câu hỏi..." class="medium" />
                    </td>
                </tr>	
                <tr>
                    <td>
                        <label>Đáp Án 1</label>
                    </td>
                    <td>
                        <input type="text" name="dapan_1" placeholder="Đáp Án 1..." class="medium" />
                    </td>
                </tr>				
                <tr>
                    <td>
                        <label>Đáp Án 2</label>
                    </td>
                    <td>
                        <input type="text" name="dapan_2" placeholder="Đáp Án 2..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Đáp Án 3</label>
                    </td>
                    <td>
                        <input type="text" name="dapan_3" placeholder="Đáp Án 3..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Đáp án đúng</label>
                    </td>
                    <td>
                        <select name="dapan">
                            <option value="1">Đáp án 1</option>
                            <option value="2">Đáp án 2</option>
                            <option value="3">Đáp án 3</option>
                        </select>
                    </td>
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
<?php include 'inc/footer.php';?>