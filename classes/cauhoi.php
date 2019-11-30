<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class cauhoi
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function insert_cauhoi($id_bh,$cauhoi,$dapan_1,$dapan_2,$dapan_3,$dapan)
		{
			$cauhoi = mysqli_real_escape_string($this->db->link, $cauhoi);
			$dapan_1 = mysqli_real_escape_string($this->db->link, $dapan_1);
			$dapan_2 = mysqli_real_escape_string($this->db->link, $dapan_2);
			$dapan_3 = mysqli_real_escape_string($this->db->link, $dapan_3);
			$dapan = mysqli_real_escape_string($this->db->link, $dapan);

			$query = "INSERT INTO cauhoi 
			VALUES ('','$cauhoi','$dapan_1','$dapan_2','$dapan_3','$dapan','$id_bh')";

				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Thêm câu hỏi mới thành công!</span>";
					return $alert;			
			}	
		}

		public function show_cauhoi($id_bh)
		{
			$query = "SELECT * FROM cauhoi WHERE id_bh='$id_bh'";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function get_edit_cauhoi($id_ask)
		{
			$select = "SELECT * FROM cauhoi WHERE id_ask='$id_ask'";
			$result = $this->db->select($select);
			return $result;
		}

		public function update_cauhoi($id_ask,$ask_1,$ask_2,$ask_3,$dapan)
		{
			$ask_1 = mysqli_real_escape_string($this->db->link, $ask_1);
			$ask_2 = mysqli_real_escape_string($this->db->link, $ask_2);
			$ask_3 = mysqli_real_escape_string($this->db->link, $ask_3);
			$dapan = mysqli_real_escape_string($this->db->link, $dapan);

			$update = "UPDATE cauhoi SET ask_1='$ask_1',ask_2='$ask_2',ask_3='$ask_3',dapan='$dapan'
			WHERE id_ask='$id_ask'";
			$result = $this->db->update($update);
			if ($result) {
				Session::set("success","<span class='success'>Thay đổi câu hỏi thành công!</span>");
			} 		
		}

		public function del_cauhoi($id_ask,$id_bh)
		{
			$del_video = "DELETE FROM cauhoi WHERE id_ask='$id_ask'";
			$result = $this->db->delete($del_video);
			if ($result) {
				Session::set('success',"<span class='success'>Xóa câu hỏi thành công!</span>");
				header('Location: cauhoilist.php?id_bh='.$id_bh);
			} 		
		}

	}
 ?>
 