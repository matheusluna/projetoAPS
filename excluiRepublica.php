<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Ecluir República</title>
	<link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
</head>

<body>
	<script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
</body>

</html>

<?php
      include("conexao.php");
		session_start();
      $conexao = open_database();
		
      if($conexao != null){
		$republica = $_GET['nomerepublica'];
      	$email = $_GET['usuario'];
		$sql = "DELETE FROM republica WHERE nome='$republica'";
		$result = mysqli_query($conexao,$sql);
		$sql2 = "UPDATE usuario SET tipo=NULL WHERE email='$email'";
		
		if(($result != FALSE)){
			mysqli_query($conexao,$sql2);
			$_SESSION['tipo'] = NULL;
			echo    "<script>
                        sweetAlert('Sucesso', 'A republica foi removida com sucesso', 'success');
                        setTimeout(function() { location.href='paginainicial.php' }, 2000);
                    </script>";
		}else{
			echo    "<script>
                        sweetAlert('Falha', 'A republica não pôde ser removida', 'error');
                        setTimeout(function() { location.href='paginainicial.php' }, 2000);
                    </script>";
		}

  	
      	mysqli_close($conexao);	  
		  
		  
	  }

      

?>
