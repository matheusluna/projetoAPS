<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
	<?php
		session_start();		
		if(empty($_SESSION['email']) and empty($_SESSION['senha'])){
			echo "<script>
		        sweetAlert('Você não logou', 'Por favor entre no sistema', 'error');
		        setTimeout(function() { location.href='index.php' }, 3000); </script>";
			session_unset();
			exit;
		}
	?>
  </body>
</html>