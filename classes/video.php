<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class video
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function insert_video($id_bh,$name,$link)
		{

			$link = mysqli_real_escape_string($this->db->link, $link);
			$date = date("Y/m/d");
			$query = "INSERT INTO video VALUES ('','$name','$link','$date','$id_bh')";

				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Thêm video mới thành công!</span>";
					return $alert;			
			}	
		}

		public function show_video($id_bh)
		{
			$query = "SELECT * FROM video WHERE id_bh='$id_bh'";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function get_edit_video($id_video)
		{
			$select = "SELECT * FROM video WHERE id_video='$id_video'";
			$result = $this->db->select($select);
			return $result;
		}

		public function update_video($id_video,$name,$link,$id_bh)
		{
			$name = mysqli_real_escape_string($this->db->link, $name);
			$link = mysqli_real_escape_string($this->db->link, $link);

			$update = "UPDATE video SET name_vd='$name',link='$link' WHERE id_video='$id_video'";
			$result = $this->db->update($update);
			if ($result) {
				Session::set("success","<span class='success'>Thay đổi video thành công!</span>");
				header('Location: videolist.php?id_bh='.$id_bh);
			} 		
		}

		public function del_video($id_video,$id_bh)
		{
			$del_video = "DELETE FROM video WHERE id_video='$id_video'";
			$result = $this->db->delete($del_video);
			if ($result) {
				Session::set('success',"<span class='success'>Xóa video thành công!</span>");
				header('Location: videolist.php?id_bh='.$id_bh);
			} 		
		}

		public function get_video($id_bh)
		{
			$select = "SELECT * FROM video WHERE id_bh='$id_bh'";
			$result = $this->db->select($select);
			if ($result) {
				return $result;
			}
		}

		public function get_link($id_video)
		{
			$select = "SELECT link FROM video WHERE id_video = '$id_video'";
			$result = $this->db->select($select);
			if ($result) {
				return $result;
			}
		}

		public function tong_video($id_bh)
		{
			$query = "SELECT COUNT(id_bh) AS 'soluong' FROM video WHERE id_bh='$id_bh'";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function link_prev($id_bh,$id_video)
		{
			$select = "SELECT * FROM video WHERE id_video < '$id_video' AND id_bh='$id_bh' ORDER BY id_video DESC LIMIT 1";
			$result = $this->db->select($select);
			if ($result) {
				return $result;
			}
		}

		public function link_prev2($id_bh)
		{
			$select = "SELECT MAX(id_video) AS 'id_video' FROM video WHERE id_bh='$id_bh'";
			$result = $this->db->select($select);
			if ($result) {
				return $result;
			}
		}

		public function link_next($id_bh,$id_video)
		{
			$select = "SELECT * FROM video WHERE id_video > '$id_video' AND id_bh='$id_bh' LIMIT 1";
			$result = $this->db->select($select);
			if ($result) {
				return $result;
			}
		}

		public function link_next2($id_bh)
		{
			$select = "SELECT * FROM video WHERE id_bh='$id_bh' LIMIT 1";
			$result = $this->db->select($select);
			if ($result) {
				return $result;
			}
		}
	}
 ?>
 