<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class setting
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function show_setting()
		{
			$query = "SELECT * FROM setting";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}	

		public function update_setting($data,$files)
		{
			$sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$diachi = mysqli_real_escape_string($this->db->link, $data['diachi']);
			$copyright = mysqli_real_escape_string($this->db->link, $data['copyright']);

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
				$query = "UPDATE setting 
				SET logo='$unique_image',sdt='$sdt',email='$email',diachi='$diachi',
				copyright='$copyright' WHERE site='site'";
				$result = $this->db->update($query);
				if ($result) {
					$alert = "<span class='success'>Thay đổi site thành công!</span>";
					return $alert;
				}
			}
			}
			$query = "UPDATE setting 
				SET sdt='$sdt',email='$email',diachi='$diachi',
				copyright='$copyright' WHERE site='site'";
				$result = $this->db->update($query);
				if ($result) {
				$alert = "<span class='success'>Thay đổi site thành công!</span>";
					return $alert;
				}
		}	

		public function update_qc($data,$files)
		{
			$chuthich = mysqli_real_escape_string($this->db->link, $data['chuthich']);
			$link = mysqli_real_escape_string($this->db->link, $data['link']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			$permited = array('jpg','png','svg','webp');
			$file_name = $_FILES['logowsqc']['name'];
			$file_size = $_FILES['logowsqc']['size'];
			$file_temp = $_FILES['logowsqc']['tmp_name'];

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
				$query = "UPDATE setting 
				SET logowsqc='$unique_image',chuthich='$chuthich',link='$link' WHERE site='site'";
				$result = $this->db->update($query);
				if ($result) {
					$alert = "<span class='success'>Thay đổi site thành công!</span>";
					return $alert;
				}
			}
			}
			$query = "UPDATE setting 
				SET chuthich='$chuthich',link='$link' WHERE site='site'";
				$result = $this->db->update($query);
				if ($result) {
				$alert = "<span class='success'>Thay đổi site thành công!</span>";
					return $alert;
				}
		}	
	}
 ?>
 