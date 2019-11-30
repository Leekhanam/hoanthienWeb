<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class chude
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function insert_chude($name_cd,$khoahoc)
		{

			$name_cd = mysqli_real_escape_string($this->db->link, $name_cd);
			$khoahoc = mysqli_real_escape_string($this->db->link, $khoahoc);

			$query = "INSERT INTO chude VALUES ('','$name_cd','$khoahoc')";

				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Thêm chủ đề mới thành công!</span>";
					return $alert;
				
			}	
		}

		public function show_chude()
		{
			$query = "SELECT * FROM chude INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh
			ORDER BY id_cd DESC";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function get_edit_chude($id_cd)
		{
			$select = "SELECT * FROM chude WHERE id_cd='$id_cd'";
			$get_edit_chude = $this->db->select($select);
			return $get_edit_chude;
		}

		public function update_chude($id_cd,$name_cd,$khoahoc)
		{
			$name_cd = mysqli_real_escape_string($this->db->link, $name_cd);
			$khoahoc = mysqli_real_escape_string($this->db->link, $khoahoc);
			$update = "UPDATE chude SET name_cd='$name_cd',id_kh='$khoahoc' WHERE id_cd='$id_cd'";
			$result = $this->db->update($update);
			if ($result) {
				Session::set("success","<span class='success'>Thay chủ đề thành công!</span>");
				echo "<script>window.location = 'chudelist.php';</script>";
			} 		
		}

		public function del_chude($id_cd)
		{
			$del_chude = "DELETE FROM chude WHERE id_cd='$id_cd'";
			$result = $this->db->delete($del_cart);
			if ($result) {
				Session::set("success","<span class='success'>Xóa chủ đề thành công!</span>");
				echo "<script>window.location = 'chudelist.php';</script>";
			} 		
		}

		public function get_chude_FE($id_kh)
		{
			$select = "SELECT * FROM chude WHERE id_kh='$id_kh'";
			$get_chude_FE = $this->db->select($select);
			return $get_chude_FE;
		}
	}
 ?>
 