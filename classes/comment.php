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
	class comment
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

		public function show_baihoc_cmt()
		{
			$query = "SELECT * FROM baihoc
            INNER JOIN video ON baihoc.id_bh = video.id_bh
            GROUP BY baihoc.id_bh
            HAVING baihoc.id_bh IN (SELECT id_bh FROM video) AND video.id_video IN (SELECT id_video FROM comment)";
				$result = $this->db->select($query);
				return $result;
		}

		public function show_soluong_vd($id_bh)
		{
			$query = "SELECT COUNT(id_video) AS 'soluong' FROM video
            WHERE id_video IN (SELECT id_video FROM comment) AND video.id_bh = $id_bh";
				$result = $this->db->select($query);
				return $result;
		}
		
		public function show_video_cmt($id_bh)
		{
			$query = "SELECT * FROM video
            WHERE id_video IN (SELECT id_video FROM comment) AND id_bh = $id_bh";
				$result = $this->db->select($query);
				return $result;
		}

		public function show_soluong_cmt($id_video)
		{
			$query = "SELECT  COUNT(id_video) AS 'soluong',MAX(date) AS 'max',MIN(date) AS 'min' FROM comment
            WHERE id_video = $id_video AND parent_cmt = 0";
				$result = $this->db->select($query);
				return $result;
		}

		public function show_cmt($id_video)
		{
			$query = "SELECT * FROM comment INNER JOIN taikhoan ON comment.id_tk = taikhoan.id_tk
            WHERE id_video = '$id_video' AND parent_cmt = 0";
				$result = $this->db->select($query);
				return $result;
		}

		public function show_soluong_recmt($id_cmt)
		{
			$query = "SELECT  COUNT(parent_cmt) AS 'soluong' FROM comment
            WHERE parent_cmt = '$id_cmt'";
				$result = $this->db->select($query);
				return $result;
		}

		public function del_cmt($id_video,$id_cmt)
		{
			$query = "DELETE FROM comment WHERE id_cmt='$id_cmt' OR parent_cmt = '$id_cmt'";
				$result = $this->db->delete($query);
				if ($result) {
					$alert = "<span class='success'>Xóa bình luận thành công!</span>";
						return $alert;
				}
				header('Location: allcmt.php?id_video='.$id_video);
		}

		public function show_recmt($id_cmt)
		{
			$query = "SELECT * FROM comment INNER JOIN taikhoan ON comment.id_tk = taikhoan.id_tk
            WHERE parent_cmt='$id_cmt'";
				$result = $this->db->select($query);
				return $result;
		}

		public function del_recmt($parent_cmt)
		{
			$query = "DELETE FROM comment WHERE parent_cmt = '$parent_cmt'";
				$result = $this->db->delete($query);
				if ($result) {
					Session::set("success","<span class='success'>Xóa trả lời thành công!</span>");
					header('Location: allrecmt.php?id_cmt='.$parent_cmt);
				}
		}
	}
 ?>