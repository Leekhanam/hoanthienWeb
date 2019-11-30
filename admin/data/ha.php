        <?php 

        try {
            $connect = new PDO('mysql:host=localhost; dbname=duanmot; charset=utf8', 'root', '');
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (isset($_POST['id_tk'])) {
                $id_tk = $_POST['id_tk']; 
                $sql = "UPDATE taikhoan SET quyen=3 WHERE id_tk='$id_tk'";
                   $connect->exec($sql);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

 ?>