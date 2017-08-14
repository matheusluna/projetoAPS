<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Remover Inquilino</title>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
  <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
  </body>
</html>

<?php
  include("conexao.php");
  $conexao = open_database();

  if ($conexao != null) {
        $inquilino = $_GET['inquilino'];
	  	$sql = "UPDATE usuario SET tipo=NULL, nomerepublica=NULL WHERE email='$inquilino'";
        $result = mysqli_query($conexao, $sql);
		if($result != FALSE){

			echo    "<script>
						sweetAlert('Sucesso', 'O inquilino foi removido com sucesso', 'success');
						setTimeout(function() { location.href='gerenciarepublica.php' }, 2000);
					</script>";
		}else{

		  	echo    "<script>
					 sweetAlert('Falha', 'O inquilino não foi removido com sucesso', 'error');
					 setTimeout(function() { location.href='gerenciarepublica.php' }, 2000);
				 </script>";

        }
	  
	  mysqli_close($conexao);
   }
      

?>
