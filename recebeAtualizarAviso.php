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
		
		echo "<script>
		        setTimeout(function() { location.href='inquilino.php';  }, 500);
            </script>";
		
	}else{
		
			
			echo "<script>
		        sweetAlert('Falha', 'O aviso não pôde ser atualizado', 'error');
		        setTimeout(function() { location.href='gerente.php';  }, 1500);
            </script>";
			
	}
	
?>