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
		
	include("crudMySql.php"); 
	
	$email = $_SESSION['email'];
	$result = read_database('usuario', "WHERE email = '$email'");  
	$nomeRepublica = $result[0]['nomerepublica'];
	
	$aviso = array(
			'titulo' => $_POST['tituloAviso'], 
			'texto' => $_POST['descricaoAviso'],
			'autor' => $email, 
			'data' => date('Y-m-d'), 
			'nomerepublica' => $nomeRepublica
	);
	
	//Verifica e executa a inserção na tabela dos dados do array $usuario no banco
	if (create_database('aviso', $aviso)) {
		
		//Emite mensagem de cadastro de sucesso e redireciona a página
		echo "<script>
					sweetAlert('Aviso Cadastrado', 'Cadastro feito com sucesso', 'success');
					setTimeout(function() { location.href='principal.php' }, 3000);
			  </script>";

	} 
	//Verifica se a inserção teve falha e emite mensagem de insucesso do cadastro de usuário
	else {
			
		//Emite mensagem de falha de cadastro do usuário
		echo "<script>
					sweetAlert('Falha no Cadastro', 'Houve falha ao cadastrar o aviso', 'error');
					setTimeout(function() { location.href='principal.php' }, 3000);
			  </script>";
	}
	
?>