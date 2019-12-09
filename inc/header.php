<?php
    include './lib/session.php';
    Session::init();
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
    $st = new setting();
    $login = new login();
         
    $show_setting = $st->show_setting();
    if (isset($show_setting)) {
    while ($results = $show_setting->fetch_assoc()) {
        Session::set('logo',$results['logo']);
        Session::set('sdt',$results['sdt']);
        Session::set('email',$results['email']);
        Session::set('diachi',$results['diachi']);
        Session::set('logoWSQC',$results['logowsqc']);
        Session::set('chuthich',$results['chuthich']);
        Session::set('link',$results['link']);
        Session::set('copyright',$results['copyright']);
    }}

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {            
        $email = $_POST['email'];
        $pass = $_POST['pass'];
            $a_check=((isset($_POST['remember'])!=0)?1:"");
                  $login_Check = $login->login($email,$pass,$a_check);

    }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dangki'])) {
        $dangki = $login->dangki($_POST,$_FILES);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signinCookie'])) {         
        if(isset($_COOKIE['siteAuth'])){ 
            parse_str($_COOKIE['siteAuth']); 
              $a_check=((isset($_POST['remember'])!=0)?1:"");  
              $siteAuth = $login->siteAuth($email,$pass,$a_check);
          }

    }
         
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="http://localhost/poly/duanmot/ckeditor/ckeditor.js"></script>
    <script src="./js/placeholderTypewriter.js"></script>
	
    