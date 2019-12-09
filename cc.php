<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header('Content-Type: text/html; charset=utf-8');
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Document</title>
</head>
<body>
	<?php 
	echo "Chào các bạn" ?>	
	<?php 
	$str = 'Anh Yêu EM';
  	$cc = mb_strtolower($str,'UTF-8');
  	echo $cc;
  	$ab = '';
// Mỗi khoảng trắng sẽ là một phần tử trong mảng<br />
	$mang = explode(' ', $cc);
	foreach ($mang as $value) {
		$ab .= $value.'-';
	}
	echo trim($ab,'-');
 ?>

</body>
</html>
