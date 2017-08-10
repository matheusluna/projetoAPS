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
      $conexao = open_database();

      if($conexao != null){

      $republica = $_GET['nomerepublica'];
      $email = $_GET['usuario'];

			$sqlDelete = "DELETE FROM republica WHERE gerente = '$email' and
					      nome = '$republica'";

			if(mysqli_query($conexao, $sqlDelete)){

          $sqlAtualizaUser = "UPDATE usuario ".
                   "SET tipo='null'".
                   "WHERE email = '$email'";

				echo "<script>
					  		swal('República Deletada!', 'Sua República foi Deletada!', 'success');
							setTimeout(function() { location.href='gerente.php' }, 3000);
					  </script>";

			}

      if(mysqli_query($conexao, $sqlDelete)){

        $sqlAtualizaUser2 = "UPDATE usuario ".
                 "SET tipo='null'".
                 "WHERE tipo ='inquilino'";

       mysqli_query($conexao, $sqlAtualizaUser2);

			}
			else echo "<script>
							swal('Erro ao Deletar!', 'Não foi possível deletar sua república!', 'error');
							setTimeout(function() { location.href='minhaRepublicaGerente.php' }, 3000);
					  </script>";

		}

  	mysqli_close($conexao);

?>
