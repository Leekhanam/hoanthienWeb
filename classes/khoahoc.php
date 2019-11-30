<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../lib/session.php');
	Session::init();
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class khoahoc
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function insert_khoahoc($data,$files)
		{
			$tenkhoahoc = mysqli_real_escape_string($this->db->link, $data['tenkhoahoc']);
			$mamau = mysqli_real_escape_string($this->db->link, $data['mamau']);
			$skill = mysqli_real_escape_string($this->db->link, $data['skill']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			$permited = array('jpg','png','svg','webp');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "../admin/uploads/".$unique_image;	

			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
					$alert = "<span class='error'>File tải lên không đúng định dạng!</span>";
					return $alert;
			}else if ($file_size > 8388608) {
				$alert = "<span class='error'>Dung lượng file quá lớn</span>";
				return $alert;
				}else {
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "INSERT INTO khoahoc VALUES ('','$tenkhoahoc','$unique_image','$mamau','$skill')";

					$result = $this->db->insert($query);
					if ($result) {
						$alert = "<span class='success'>Thêm khóa học mới thành công!</span>";
						return $alert;
				}
			}
		}
		

		public function show_khoahoc()
		{
			$query = "SELECT * FROM khoahoc ORDER BY id_kh DESC";

				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function get_edit_khoahoc($id_kh)
		{
			$query = "SELECT * FROM khoahoc WHERE id_kh='$id_kh'";

				$result = $this->db->select($query);
				return $result;
		}

		public function update_khoahoc($id_kh,$data,$files)
		{
			$tenkhoahoc = mysqli_real_escape_string($this->db->link, $data['tenkhoahoc']);
			$mamau = mysqli_real_escape_string($this->db->link, $data['mamau']);
			$skill = mysqli_real_escape_string($this->db->link, $data['skill']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			$permited = array('jpg','png','svg','webp');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "../admin/uploads/".$unique_image;

			if ($file_name != "") {

			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>File tải lên không đúng định dạng!</span>";
				return $alert;
			}else if ($file_size > 8388608) {
				$alert = "<span class='error'>Dung lượng file quá lớn</span>";
				return $alert;
			}else{
			move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE khoahoc 
				SET name_kh='$tenkhoahoc',image_kh='$unique_image',mamau='$mamau',skill='$skill'
				WHERE id_kh='$id_kh'";
				$result = $this->db->update($query);
				if ($result) {
				Session::set("success","<span class='success'>Thay đổi khóa học thành công!</span>");
				echo "<script>window.location = 'khoahoclist.php';</script>";
				}
			}
			}
			$query = "UPDATE khoahoc 
				SET name_kh='$tenkhoahoc',mamau='$mamau',skill='$skill'
				WHERE id_kh='$id_kh'";
				$result = $this->db->update($query);
				if ($result) {
				Session::set("success","<span class='success'>Thay đổi khóa học thành công!</span>");
				echo "<script>window.location = 'khoahoclist.php';</script>";
				}
		}

		public function del_khoahoc($id_kh)
		{
			$query = "DELETE FROM khoahoc WHERE id_kh='$id_kh'";

				$result = $this->db->delete($query);
				if ($result) {
					$alert = "<span class='success'>Xóa khóa học thành công!</span>";
					return $alert;
				}
		}

		public function show_khoahoc_FE()
		{
			$query = "SELECT * FROM khoahoc ORDER BY id_kh DESC";

				$result = $this->db->select($query);
				return $result;
		}

		public function get_product_byCat($cat_id)
		{
			$query = "SELECT * FROM product WHERE cat_id='$cat_id' ORDER BY product_id DESC LIMIT 8";

				$result = $this->db->select($query);
				return $result;
		}

		public function get_name_cat($cat_id)
		{
			$query = "SELECT * FROM category WHERE cat_id='$cat_id'";

				$result = $this->db->select($query);
				return $result;
		}
		
	}
 ?>