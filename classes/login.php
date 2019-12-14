<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>
<?php 
	/**
	 * 
	 */
	class login
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function login($email,$pass,$a_check)
		{
			$email = $this->fm->validation($email);
			$pass = $this->fm->validation($pass);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$pass = mysqli_real_escape_string($this->db->link, $pass);
				$pass = md5($pass);
				$query = "SELECT * FROM taikhoan 
				WHERE email='$email' AND pass='$pass'";

				$result = $this->db->select($query);

				if ($result == true) {
    				$cookie_time = (3600 * 24 * 30); // 30 days
					$value = $result->fetch_assoc();

					if ($value['quyen'] == 1 || $value['quyen'] == 2) {
						Session::set('login',true);

					Session::set('id_tk',$value['id_tk']);
					Session::set('image',$value['image_tk']);
					Session::set('name',$value['name']);
					Session::set('quyen',$value['quyen']);
					if($a_check==1){
						setcookie ('siteAuth', 'email='.$value['email'].'&pass='.$value['pass'], time() + $cookie_time);
					}
					header('Location:admin/dashboard.php');

					}else if ($value['quyen'] != 1){

					Session::set('login',true);

					Session::set('id_tk',$value['id_tk']);
					Session::set('image',$value['image_tk']);
					Session::set('name',$value['name']);
					Session::set('name',$value['name']);
					if($a_check==1){
						setcookie ('siteAuth', 'email='.$value['email'].'&pass='.$value['pass'], time() + $cookie_time);
					}
					header('Location:index.php');
				}
			}else {
					$alert = "Sai tài khoản hoặc mật khẩu!
					<script type='text/javascript'>
					    $(document).ready(function(){
					        $('#dangnhap').modal();
					    });
					</script>
					";
					return $alert;
			}
		}

		public function siteAuth($email,$pass)
		{
			$query = "SELECT * FROM taikhoan 
				WHERE email='$email' AND pass='$pass'";

				$result = $this->db->select($query);

				if ($result == true) {
					$value = $result->fetch_assoc();

					if ($value['quyen'] == 1 || $value['quyen'] == 2) {
						Session::set('login',true);

					Session::set('id_tk',$value['id_tk']);
					Session::set('image',$value['image_tk']);
					Session::set('name',$value['name']);
					Session::set('quyen',$value['quyen']);
					header('Location:admin/dashboard.php');

					}else if ($value['quyen'] != 1){

					Session::set('login',true);

					Session::set('id_tk',$value['id_tk']);
					Session::set('image',$value['image_tk']);
					Session::set('name',$value['name']);
					Session::set('name',$value['name']);
					header('Location:index.php');
				}
			}	
		}

		public function dangki($data,$files)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);
			$repassword = mysqli_real_escape_string($this->db->link, $data['repassword']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			$permited = array('jpg','png','svg','webp');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "admin/uploads/".$unique_image;

			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>File tải lên không đúng định dạng!</span>
					<script type='text/javascript'>
					    $(document).ready(function(){
					        $('#dangki').modal();
					    });
					</script>";
				return $alert;
			}else {
				$pattern = '/[a-zA-Z0-9]/';
				$check = preg_match($pattern,$password);
				if ($check == false) {
					$alert = "<span class='error'>Password không chứa kí tự đặc biệt!</span>
					<script type='text/javascript'>
					    $(document).ready(function(){
					        $('#dangki').modal();
					    });
					</script>";
				return $alert;
				}

			}
				$check_email = "SELECT email FROM taikhoan WHERE email='$email'";
				$result_check = $this->db->select($check_email);
			if ($result_check) {
					$alert = "<span class='error'>Email bị trùng, hãy tạo 1 Email khác!</span>
					<script type='text/javascript'>
					    $(document).ready(function(){
					        $('#dangki').modal();
					    });
					</script>";
					return $alert;
			}else if ($password != $repassword) {
					$alert = "<span class='error'>Nhập lại password không đúng!</span>
					<script type='text/javascript'>
					    $(document).ready(function(){
					        $('#dangki').modal();
					    });
					</script>";
					return $alert;	
			}else{
					move_uploaded_file($file_temp, $uploaded_image);
					$password_md5 = md5($repassword);
					$query = "INSERT INTO taikhoan
					VALUES ('','$name','$unique_image','$email','$password_md5',3)";

					$result = $this->db->insert($query);
					if ($result) {
						$alert = "<span class='success'>Tạo tài khoản mới thành công!</span>
						<script type='text/javascript'>
					    $(document).ready(function(){
					        $('#dangki').modal();
					    });
						</script>";
						return $alert;
					}
				}
			}

	}
 ?>