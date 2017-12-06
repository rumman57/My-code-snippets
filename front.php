<?php
include 'lib/Session.php';
//Session::checkIndexSession();
?>
 <?php
 if(isset($_GET['action']) && $_GET['action'] == 'logout')
   {
      Session::Frontdestroy();
   }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h1>This is front page after Login</h1>
<ul>
          
  <li><a href="?action=logout">Log Out</a></li>
</ul>
</body>
</html>
