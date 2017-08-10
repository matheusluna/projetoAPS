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
$id = $_GET['id'];
echo $id;

include("conexao.php");
$conexao = open_database();
$sql = "DELETE FROM aviso WHERE id=$id";
if($conexao != null){
	
	  if(mysqli_query($conexao, $sql)){
	  	echo "<script>
        sweetAlert('Sucesso na remoção', 'Aviso removido com sucesso', 'success');
        setTimeout(function() { history.back() }, 1000);
            </script>";
	  }else{
		  echo "<script>
        sweetAlert('Falha na remoção', 'Falha ao remover aviso', 'error');
        setTimeout(function() { history.back() }, 1000);
            </script>";
	  }
	mysqli_close($conexao);
}

?>