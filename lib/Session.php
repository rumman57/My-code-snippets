<?php
ob_start();
class Session
{
	
	public static function init()
	{
		session_start();
	}
	public static function set($key,$val)
	{
        $_SESSION[$key] = $val;
	}
	public static function get($key)
	{
		if(isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}else
		{
			return false;
		}
	}
	 public static function checkSession(){
          self::init();
          if (self::get("login")== false) {
           self::destroy();
           //header("Location:login.php");
           echo "<script>window.location = 'login.php'</script>";
          }
     }
     public static function chSession(){
          self::init();
          if (self::get("enter")== false) {
           self::Frontdestroy();
           echo "<script>window.location = 'index.php'</script>";
          }
     }
     public static function checkLoginFront(){
          self::init();
          if (self::get("enter")== true) {
           //header("Location:index.php");
           echo "<script>window.location = 'front.php'</script>";

          }
     }
	public static function checkLogin(){
          self::init();
          if (self::get("login")== true) {
           //header("Location:index.php");
           echo "<script>window.location = 'index.php'</script>";

          }
     }
     
	public static function destroy()
	{ 
		session_destroy();
		//header("Location:login.php");
		echo "<script>window.location='login.php'</script>";
	}

	public static function Frontdestroy()
	{ 
		session_destroy();
		
		echo "<script>window.location='index.php'</script>";
	}
}
ob_end_clean();
?>