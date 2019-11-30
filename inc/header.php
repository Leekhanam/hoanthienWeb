<?php
    include './lib/session.php';
    Session::init();
    Session::checkLogin();
    include './lib/database.php';
    include './helper/format.php';
        if (isset($_GET['id_tk'])) {
            header('Location:index.php');
            session_destroy();
        }

    spl_autoload_register(function ($class){
    	include_once 'classes/'.$class.'.php';
    });

    $db = new Database();
    $fm = new Format();
    $kh = new khoahoc();
    $cd = new chude();
    $bh = new baihoc();
    $vd = new video();
    $ch = new cauhoi();
    $tk = new taikhoan();
    $ls = new lichsu();
         
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/usm/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="http://localhost/poly/duanmot/ckeditor/ckeditor.js"></script>
	
    