<?php 

        try {
            $connect = new PDO('mysql:host=localhost; dbname=duanmot; charset=utf8', 'root', '');
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

 ?>
 <?php
/**
*Session Class
**/
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
    $_SESSION[$key] = $val;
 }

 public static function get($key){
    if (isset($_SESSION[$key])) {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }

 public static function checkSession(){
    self::init();
    if (self::get("quyen") != 1 && self::get("quyen") != 2) {
     self::destroy();
     header("Location:../index.php");
    }
 }

 public static function checkLogin(){
    self::init();
    if (self::get("login") == false) {
     header("Location:index.php");
    }
 }

 public static function destroy(){
  session_destroy();
  header("Location:../index.php");
 }
}
?>
