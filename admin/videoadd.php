<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
    include '../classes/baihoc.php';
    include '../classes/video.php';
    $vd = new video();
    if (isset($_GET['id_bh'])) {
        $id_bh = $_GET['id_bh'];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $link = $_POST['link'];
        $insert_video = $vd->insert_video($id_bh,$name,$link);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm video bài học</h2>
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
                        <label>Tên video</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Tên video..." class="medium" />
                    </td>
                </tr>				
                <tr>
                    <td>
                        <label>Link</label>
                    </td>
                    <td>
                        <input type="text" name="link" placeholder="Link video..." class="medium" />
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