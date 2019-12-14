<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class lichsu
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function add_lichsu($link,$id_tk,$id_video,$lession)
		{
			$date = date("Y/m/d");
			$query = "SELECT id_video,id_tk FROM lichsu WHERE id_tk='$id_tk' AND id_video='$id_video'";
				$result = $this->db->select($query);
				if ($result == null) {
					$insert = "INSERT INTO lichsu VALUES ('','$link','$date','$lession','$id_tk','$id_video')";
					$true = $this->db->insert($insert);
				}else {
					$insert = "UPDATE lichsu SET linkls='$link',ngayluu='$date',lession='$lession' WHERE id_tk='$id_tk' AND id_video='$id_video'";
					$true = $this->db->insert($insert);
				}
				return $true;
		}	

		public function get_lichsu($id_tk)
		{
			$query = "SELECT *,COUNT(baihoc.id_bh) AS baihoc FROM lichsu INNER JOIN video ON lichsu.id_video = video.id_video
			INNER JOIN baihoc ON video.id_bh = baihoc.id_bh
			INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh
			WHERE id_tk = '$id_tk' AND lichsu.id_video = video.id_video";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}	

		public function show_lichsu()
		{
			$query = "SELECT *,COUNT(khoahoc.id_kh) AS khoahoc,COUNT(baihoc.id_bh) AS baihoc FROM taikhoan INNER JOIN lichsu ON taikhoan.id_tk = lichsu.id_tk
			INNER JOIN video ON lichsu.id_video = video.id_video
			INNER JOIN baihoc ON video.id_bh = baihoc.id_bh
			INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh
			WHERE taikhoan.id_tk IN (SELECT id_tk FROM lichsu)";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}
			
	}
 ?>
 