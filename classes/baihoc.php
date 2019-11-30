<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class baihoc
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function insert_baihoc($data,$files)
		{
			$name_bh = mysqli_real_escape_string($this->db->link, $data['name_bh']);
			$keyword = mysqli_real_escape_string($this->db->link, $data['keyword']);
			$chuthich = mysqli_real_escape_string($this->db->link, $data['chuthich']);
			$status = mysqli_real_escape_string($this->db->link, $data['status']);
			$chude = mysqli_real_escape_string($this->db->link, $data['chude']);
			$date = date("Y/m/d");

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
					$query = "INSERT INTO baihoc 
					VALUES ('','$name_bh','$keyword','$unique_image','$chuthich','$date','$status','$chude')";

					$result = $this->db->insert($query);
					if ($result) {
						$alert = "<span class='success'>Thêm bài học mới thành công!</span>";
						return $alert;
				}
			}
		}

		public function show_baihoc()
		{
			$query = "SELECT * FROM baihoc ORDER BY id_bh DESC";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function get_edit_baihoc($id_bh)
		{
			$query = "SELECT * FROM baihoc WHERE id_bh='$id_bh'";

				$result = $this->db->select($query);
				return $result;
		}

		public function update_baihoc($data,$files,$id_bh)
		{
			$name_bh = mysqli_real_escape_string($this->db->link, $data['name_bh']);
			$keyword = mysqli_real_escape_string($this->db->link, $data['keyword']);
			$chuthich = mysqli_real_escape_string($this->db->link, $data['chuthich']);
			$status = mysqli_real_escape_string($this->db->link, $data['status']);
			$chude = mysqli_real_escape_string($this->db->link, $data['chude']);

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
				$query = "UPDATE baihoc 
				SET name_bh='$name_bh',keyword='$keyword',image='$unique_image',chuthich='$chuthich',status='$status',
				id_cd='$chude' WHERE id_bh='$id_bh'";
				$result = $this->db->update($query);
				if ($result) {
					Session::set("success","<span class='success'>Thay đổi bài học thành công!</span>");
					echo "<script>window.location = 'baihoclist.php';</script>";
				}
			}
			}
			$query = "UPDATE baihoc 
				SET name_bh='$name_bh',keyword='$keyword',chuthich='$chuthich',id_cd='$chude' WHERE id_bh='$id_bh'";
				$result = $this->db->update($query);
				if ($result) {
					Session::set("success","<span class='success'>Thay đổi bài học thành công!</span>");
					echo "<script>window.location = 'baihoclist.php';</script>";
				}
		}

		public function del_baihoc($id_bh)
		{
			$query = "DELETE FROM baihoc WHERE id_bh='$id_bh'";

				$result = $this->db->delete($query);
				if ($result) {
					Session::set("success","<span class='success'>Xóa bài học thành công!</span>");
					echo "<script>window.location = 'baihoclist.php';</script>";
				}
		}

		public function show_baihoc_FE()
		{
			$query = "SELECT * FROM baihoc INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh 
			WHERE id_bh IN (SELECT id_bh FROM video)
			ORDER BY id_bh DESC";
				$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function get_baihoc_FE($id_bh)
		{
			$query = "SELECT * FROM baihoc INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh
			WHERE chude.id_kh = khoahoc.id_kh AND id_bh='$id_bh'";
				$result = $this->db->select($query);
				return $result;
		}

		public function search($keywords)
		{
			$query = "SELECT * FROM baihoc INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh 
			WHERE MATCH (name_bh,keyword,chuthich) AGAINST ('$keywords' IN NATURAL LANGUAGE MODE)
			AND id_bh IN (SELECT id_bh FROM video) AND chude.id_kh = khoahoc.id_kh";
			$result = $this->db->select($query);
				if ($result) {
					return $result;
				}
		}

		public function show_baihoc_hoanthanh()
		{
			$query = "SELECT * FROM baihoc INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh  
			WHERE chude.id_kh = khoahoc.id_kh AND status=1 LIMIT 4";
				$result = $this->db->select($query);
				return $result;
		}

		public function get_baihoc_cd($id_cd)
		{
			$query = "SELECT * FROM baihoc INNER JOIN chude ON baihoc.id_cd = chude.id_cd
			INNER JOIN khoahoc ON chude.id_kh = khoahoc.id_kh
			WHERE chude.id_kh = khoahoc.id_kh AND baihoc.id_cd='$id_cd'";
				$result = $this->db->select($query);
				return $result;
		}

	}
 ?>