<?php 
	$filepath = realpath(dirname(__FILE__));
	require_once ($filepath.'/../lib/database.php');
	require_once ($filepath.'/../helper/format.php'); 
?>

<?php 
	/**
	 * 
	 */
	class Product
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();	
			$this->fm = new Format();
		}

		public function insert_product($data,$files)
		{
			$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
			$cat_id = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand_id = mysqli_real_escape_string($this->db->link, $data['brand']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);
			$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if ($product_name == NULL || $product_desc == NULL || $product_price == NULL || $file_name == NULL) {
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>Field must be not image</span>";
				return $alert;
			}else if (is_numeric($product_price) == false) {
				$alert = "<span class='error'>Price must be not text</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO product (product_name,cat_id,brand_id,product_price,product_image,product_desc,product_type) 
					VALUES ('$product_name','$cat_id','$brand_id','$product_price','$unique_image','$product_desc','$product_type')";

				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Insert product successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert product not success</span>";
					return $alert;
				}
			}
		}

		public function show_product()
		{
			$query = "SELECT * FROM product
			INNER JOIN brand ON product.brand_id=brand.brand_id
			INNER JOIN category ON product.cat_id=category.cat_id
			ORDER BY product_id";

				$result = $this->db->select($query);
				return $result;
		}

		public function get_edit_product($product_id)
		{
			$query = "SELECT * FROM product WHERE product_id='$product_id'";

				$resultp = $this->db->select($query);
				return $resultp;
		}

		public function get_edit_slide($slide_id)
		{
			$query = "SELECT * FROM slide WHERE slide_id='$slide_id'";

				$resultp = $this->db->select($query);
				return $resultp;
		} 
		
		public function update_product($data,$files,$product_id)
		{
			$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
			$cat_id = mysqli_real_escape_string($this->db->link, $data['category']);
			$brand_id = mysqli_real_escape_string($this->db->link, $data['brand']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$product_price = mysqli_real_escape_string($this->db->link, $data['product_price']);
			$product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			if ($product_name == NULL || $product_desc == NULL || $product_price == NULL) {
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}
			if (is_numeric($product_price) == false) {
				$alert = "<span class='error'>Price must be not text</span>";
				return $alert;
			}
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if ($file_name != "") {

			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>Field must be not image</span>";
				return $alert;
			}else if ($file_size > 8388608) {
				$alert = "<span class='error'>Image file too large</span>";
				return $alert;
			}else{
			move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE product 
				SET product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',product_price='$product_price',
				product_image='$unique_image',product_desc='$product_desc',product_type='$product_type'
				WHERE product_id='$product_id'";
				$result = $this->db->update($query);
				if ($result) {
					echo "<script>window.location = 'productlist.php';</script>";
				}else{
					$alert = "<span class='error'>Update product not success</span>";
					return $alert;
				}
			}
			}
			$query = "UPDATE product 
				SET product_name='$product_name',cat_id='$cat_id',brand_id='$brand_id',product_price='$product_price'
				,product_desc='$product_desc',product_type='$product_type'
				WHERE product_id='$product_id'";
				$result = $this->db->update($query);
				if ($result) {
					echo "<script>window.location = 'productlist.php';</script>";
				}else{
					$alert = "<span class='error'>Update product not success</span>";
					return $alert;
				}
		}
		
		public function update_slide($data,$files,$slide_id)
		{
			$slide_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
			$slide_type = mysqli_real_escape_string($this->db->link, $data['slide_type']);

			//Kiểm tra hình ảnh & đưa vào folder uploads
			if ($slide_name == NULL) {
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			if ($file_name != "") {

			if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>Field must be not image</span>";
				return $alert;
			}else if ($file_size > 8388608) {
				$alert = "<span class='error'>Image file too large</span>";
				return $alert;
			}else{
			move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE slide 
				SET slide_name='$slide_name',slide_image='$unique_image',slide_type='$slide_type' 
				WHERE slide_id='$slide_id'";
				$result = $this->db->update($query);
				if ($result) {
					echo "<script>window.location = 'slidelist.php';</script>";
				}else{
					$alert = "<span class='error'>Update slider not success</span>";
					return $alert;
				}
			}
			}
			$query = "UPDATE slide 
				SET slide_name='$slide_name',slide_type='$slide_type'
				WHERE slide_id='$slide_id'";
				$result = $this->db->update($query);
				if ($result) {
					echo "<script>window.location = 'slidelist.php';</script>";
				}else{
					$alert = "<span class='error'>Update slider not success</span>";
					return $alert;
				}
		}

		public function del_product($product_id)
		{
			$query = "DELETE FROM product WHERE product_id='$product_id'";

				$result = $this->db->delete($query);
				if ($result) {
					$alert = "<span class='success'>Delete product successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Delete product not success</span>";
					return $alert;
				}
		}

		public function del_wishlist($customer_id,$product_id)
		{
			$query = "DELETE FROM wishlist WHERE customer_id='$customer_id' AND product_id='$product_id'";

				$result = $this->db->delete($query);
				if ($result) {
					$alert = "<span class='success'>Delete product successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Delete product not success</span>";
					return $alert;
				}
		}

		public function del_slide($slide_id)
		{
			$query = "DELETE FROM slide WHERE slide_id='$slide_id'";
			$result = $this->db->delete($query);
				return $result;
		}

		//END BACK-END

		public function get_product_feathered()
		{
			$query = "SELECT * FROM product WHERE product_type = 'Featured'
			ORDER BY product_id DESC LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_product_new()
		{
			$query = "SELECT * FROM product ORDER BY product_id DESC LIMIT 4";
			$result_new = $this->db->select($query);
			return $result_new;
		}

		public function get_product_details($product_id)
		{
			$query = "SELECT * FROM product
			INNER JOIN brand ON product.brand_id=brand.brand_id
			INNER JOIN category ON brand.cat_id=category.cat_id
			AND product.product_id ='$product_id'";

				$result = $this->db->select($query);
				return $result;
		}

		public function getLastedApple()
		{
			$query = "SELECT * FROM product WHERE brand_id = 3 ORDER BY product_id DESC LIMIT 1";
			$result = $this->db->select($query);
				return $result;
		}

		public function getLastedSamsung()
		{
			$query = "SELECT * FROM product WHERE brand_id = 1 ORDER BY product_id DESC LIMIT 1";
			$result = $this->db->select($query);
				return $result;
		}

		public function getLastedSony()
		{
			$query = "SELECT * FROM product WHERE brand_id = 2 ORDER BY product_id DESC LIMIT 1";
			$result = $this->db->select($query);
				return $result;
		}

		public function getLastedDell()
		{
			$query = "SELECT * FROM product WHERE brand_id = 4 ORDER BY product_id DESC LIMIT 1";
			$result = $this->db->select($query);
				return $result;
		}

		public function get_compare($customer_id)
		{
			$query = "SELECT * FROM compare WHERE customer_id='$customer_id' ORDER BY id DESC;";
			$result = $this->db->select($query);
				return $result;
		}	

		public function get_wishlist($customer_id)
		{
			$query = "SELECT * FROM wishlist WHERE customer_id='$customer_id' ORDER BY id DESC;";
			$result = $this->db->select($query);
				return $result;
		}

		public function get_slider()
		{
			$query = "SELECT * FROM slide WHERE slide_type=0 ORDER BY slide_id DESC;";
			$result = $this->db->select($query);
				return $result;
		}

		public function get_all_slider()
		{
			$query = "SELECT * FROM slide ORDER BY slide_id DESC";
			$result = $this->db->select($query);
				return $result;
		}

		public function insert_compare($product_id,$customer_id)
		{
			$product_id = mysqli_real_escape_string($this->db->link, $product_id);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

			$select = "SELECT * FROM product WHERE product_id='$product_id'";
			$result = $this->db->select($select)->fetch_assoc();

			$product_name = $result['product_name'];
			$product_price = $result['product_price'];
			$product_image = $result['product_image'];


			$checkcompare = "SELECT * FROM compare WHERE product_id='$product_id' AND customer_id='$customer_id'";
			$resultc = $this->db->select($checkcompare);
			if ($resultc) {
				$error = "Product Already Added To Compare!";
				return $error;
			}else{
			$query = "INSERT INTO compare VALUES ('','$customer_id','$product_id','$product_name',
			'$product_price','$product_image')";

				$insert_compare = $this->db->insert($query);
				if ($insert_compare) {
					$alert = "<span class='success'>Added compare successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Added compare not success</span>";
					return $alert;
				}
			}
		}

		public function insert_wishlist($product_id,$customer_id)
		{
			$product_id = mysqli_real_escape_string($this->db->link, $product_id);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

			$select = "SELECT * FROM product WHERE product_id='$product_id'";
			$result = $this->db->select($select)->fetch_assoc();

			$product_name = $result['product_name'];
			$product_price = $result['product_price'];
			$product_image = $result['product_image'];


			$checkwishlist = "SELECT * FROM wishlist WHERE product_id='$product_id' AND customer_id='$customer_id'";
			$resultw = $this->db->select($checkwishlist);
			if ($resultw) {
				$error = "Product Already Added To Wishlist!";
				return $error;
			}else{
			$query = "INSERT INTO wishlist VALUES ('','$customer_id','$product_id','$product_name',
			'$product_price','$product_image')";

				$insert_compare = $this->db->insert($query);
				if ($insert_compare) {
					$alert = "<span class='success'>Added wishlist successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Added wishlist not success</span>";
					return $alert;
				}
			}
		}

		public function insert_slide($data,$files)
		{
			$slide_name = mysqli_real_escape_string($this->db->link, $data['slide_name']);
			$slide_type = mysqli_real_escape_string($this->db->link, $data['slide_type']);

			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$unique_image = mt_rand(100,10000).".".$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if ($slide_name == NULL && $uploaded_image == NULL) {
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else if ($file_ext != $permited[0] && $file_ext != $permited[1] && $file_ext != $permited[2] && $file_ext != $permited[3]) {
				$alert = "<span class='error'>Field must be not image</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO slide VALUES ('','$slide_name','$unique_image','$slide_type')";

				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Insert slider successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert slider not success</span>";
					return $alert;
				}
			}
		}

		public function search($keywords)
		{
			$keywords = $this->fm->validation($keywords);
			$query = "SELECT * FROM product WHERE product_name LIKE '%$keywords%'";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>