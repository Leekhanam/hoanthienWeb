<?php 

        try {
            $connect = new PDO('mysql:host=localhost; dbname=duanmot; charset=utf8', 'root', '');
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['keywords'])){

		$results = array('error' => false, 'data' => '');

 

		$keywords = $_POST['keywords'];

 

		if(empty($keywords)){

			$results['error'] = true;

		}else{
			$sql = "SELECT * FROM baihoc WHERE keyword LIKE '%$keywords%' AND id_bh IN (SELECT id_bh FROM video) LIMIT 5";

			$sqlquery = $connect->query($sql);
				foreach ($sqlquery as $key => $value) {
					$results['data'] .= "

		<li class='list-gpfrm-list'>
			<a class='list-gpfrm-list' 
				href='series.php?id_bh=".$value['id_bh']."'>".$value['name_bh']."
			</a>
		</li>";				
				}

			}
 
			echo json_encode($results);
			}

        } catch (PDOException $e) {
            die($e->getMessage());
        }

 ?>
