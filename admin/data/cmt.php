<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
	include 'db.php';

        if (isset($_POST['kh'])) {
            $results = array();
            $total = "SELECT name_kh FROM khoahoc";
                    $kq = $connect->query($total);  
                    foreach ($kq as $value) {
                        echo $value['name_kh'].' ';
                    }
        }

        if (isset($_POST['id_video'])) {
            $id_video = $_POST['id_video'];
            $total = "SELECT COUNT(id_video) AS total FROM comment WHERE parent_cmt=0 AND id_video='$id_video'";
                    $kq = $connect->query($total)->fetch();
                    echo $kq['total'];
        }

        if (isset($_POST['id_tk']) && isset($_POST['id_video']) && isset($_POST['comment'])) {

			$id_tk = $_POST['id_tk'];
            $id_video = $_POST['id_video'];
            $comment = $_POST['comment'];
            $date = date('Y/m/d');
            $house = date('h:i:a');

           	$sql = "INSERT INTO comment
                    VALUES (' ',' ','$comment','$date','$house','$id_video','$id_tk')";
                    $kq = $connect->exec($sql);
        }else if (isset($_POST['id_cmt']) && isset($_POST['id_tk']) && isset($_POST['id_video']) && isset($_POST['recomment'])) {

            $id_cmt = $_POST['id_cmt'];
            $id_tk = $_POST['id_tk'];
            $id_video = $_POST['id_video'];
            $recomment = $_POST['recomment'];
            $date = date('Y/m/d');
            $house = date('h:i:a');

            $sql = "INSERT INTO comment
                    VALUES (' ','$id_cmt','$recomment','$date','$house','$id_video','$id_tk')";
                    $kq = $connect->exec($sql);
        }

        if (isset($_POST['xoacmt']) && isset($_POST['id_cmt'])) {
            $id_cmt = $_POST['id_cmt'];
            $sql = "DELETE FROM comment WHERE id_cmt='$id_cmt' OR parent_cmt='$id_cmt'";
                    $kq = $connect->prepare($sql)->execute();
        }

        if (isset($_POST['xoarecmt']) && isset($_POST['id_cmt'])) {
            $id_cmt = $_POST['id_cmt'];
            $sql = "DELETE FROM comment WHERE id_cmt='$id_cmt'";
                    $kq = $connect->prepare($sql)->execute();
        }

        if (isset($_POST['suacmt']) && isset($_POST['id_cmt']) && isset($_POST['comment'])) {
            $id_cmt = $_POST['id_cmt'];
            $comment = $_POST['comment'];
            $sql = "UPDATE comment SET comment='$comment' WHERE id_cmt='$id_cmt'";
                    $kq = $connect->prepare($sql)->execute();
        }

        if (isset($_POST['suarecmt']) && isset($_POST['id_cmt']) && isset($_POST['comment'])) {
            $id_cmt = $_POST['id_cmt'];
            $comment = $_POST['comment'];
            $sql = "UPDATE comment SET comment='$comment' WHERE id_cmt='$id_cmt'";
                    $kq = $connect->prepare($sql)->execute();
        }
 ?>