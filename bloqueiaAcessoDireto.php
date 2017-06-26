<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
  </body>
</html>
<?php
	session_start();
	
	if(!empty($_SESSION['email']) and !empty($_SESSION['senha'])){
		$nome = $_SESSION['nome'];
		echo "<script>
	        sweetAlert('Login efetuado', 'Bem vindo, $nome', 'success');
	        setTimeout(function() { location.href='principal.html' }, 3000); </script>";
	}else{
		Header("location:index.php");
		session_unset();
	}
?>