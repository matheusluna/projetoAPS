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
	
	include ("crudMySql.php");
	
	session_start();
	
	$id = $_GET['id'];
	
	$sqlEditaAviso = array(
			'titulo' => $_POST['tituloAviso'], 
			'texto' => $_POST['descricaoAviso']
	);
			
	
	if(update_database('aviso', $sqlEditaAviso, "id=$id")){
		if($_SESSION['tipo'] == 'gerente'){
			
			echo "<script> location.href='gerente.php'; </script>";
			
		}else{
			echo "<script> location.href='inquilino.php'; </script>";
		}
		
	}else{
		if($_SESSION['tipo'] == 'gerente'){
			
			echo "<script>
		        sweetAlert('Falha na atualização', 'Não foi possível atualizar aviso', 'error');
		        setTimeout(function() { location.href='gerente.php';  }, 1000);
            </script>";
			
		}else{
			
			echo "<script>
		        sweetAlert('Falha na atualização', 'Não foi possível atualizar aviso', 'error');
		        setTimeout(function() { location.href='inquilino.php';  }, 1000);
            </script>";
			
		}
		
	}
?>