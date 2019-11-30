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

		public function add_lichsu($link,$id_tk,$id_bh)
		{
			$date = date("Y/m/d");
			$query = "SELECT id_bh,id_tk FROM lichsu WHERE id_tk='$id_tk' AND id_bh='$id_bh'";
				$result = $this->db->select($query);
				if ($result == null) {
					$insert = "INSERT INTO lichsu VALUES ('','$link','$date','$id_tk','$id_bh')";
					$true = $this->db->insert($insert);
				}else {
					$insert = "UPDATE lichsu SET link='$link',ngayluu='$date' WHERE id_tk='$id_tk' AND id_bh='$id_bh'";
					$true = $this->db->insert($insert);
				}
				return $true;
		}	

		public function get_lichsu($id_tk)
		{
			$query = "SELECT * FROM lichsu INNER JOIN baihoc ON lichsu.id_bh = baihoc.id_bh
			WHERE id_tk = '$id_tk' AND lichsu.id_bh = baihoc.id_bh";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}	
			
	}
 ?>
 