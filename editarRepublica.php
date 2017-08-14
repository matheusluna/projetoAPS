<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Editar República</title>
	<link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
</head>

<body>
	<script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
</body>

</html>

<?php
  
  
  $nome = $_POST['nome'];
  $cidade = $_POST['cidade'];
  $rua = $_POST['rua'];
  $bairro = $_POST['bairro'];
  $vagas = $_POST['vagas'];
  $contato = $_POST['contato'];
  $gerente = $_POST['gerente'];
  $nomeAntigo = $_GET['nomerepublica'];
  include("conexao.php");
  $conexao = open_database();

  if ($conexao != null) {
	  $consulta = "SELECT nomerepublica FROM usuario WHERE email='$gerente'";
	  
	  if($res = mysqli_query($conexao, $consulta)){
		  
		  while ($row = mysqli_fetch_assoc($res)) {
		    $republicaUsuario = $row["nomerepublica"];
		  }
		  
		  
		  /* 
       		VERIFICA SE O USUARIO A SER ADICIONADO COMO GERENTE É INQUILINO DA REPÚBLICA(SÓ PODE SER GERENTE QUEM JÁ FOR INQUILINO),
			SE NÃO FOR INQUILINO É EXIBIDO UMA MENSAGEM PARA PRIMEIRO ADICIONÁ-LO COMO UM
			*/
		  if($republicaUsuario == $nomeAntigo){
			   $sql = "UPDATE republica 
	  		   SET nome='$nome', cidade='$cidade', rua='$rua', bairro='$bairro', numerovagas=$vagas, contato='$contato', gerente='$gerente'
			   WHERE nome='$nomeAntigo'";
	  
			   $result=mysqli_query($conexao,$sql);

			   if($result != FALSE){

				  session_start();
				   /* SE ELE ATUALIZAR O GERENTE DA REPÚBLICA AMBOS OS USUÁRIOS PRECISAM SER ATUALIZADOS:
				   TANTO O ANTIGO GERENTE COMO O NOVO
				   O ANTIGO PASSA A SER INQUILINO E O EX-INQUILINO PASSA A SER GERENTE
				   		*/
				  if($gerente != $_SESSION['email']){
					  $sql2 = "UPDATE usuario SET tipo='gerente' WHERE email='$gerente'";
					  mysqli_query($conexao, $sql2);
					  $sql3 = "UPDATE usuario SET tipo='inquilino' WHERE email='".$_SESSION['email']."'";
					  mysqli_query($conexao, $sql3);
					  $_SESSION['tipo'] = "inquilino";
				  }

				  echo    "<script>
								sweetAlert('Sucesso', 'A republica foi atualizada com sucesso', 'success');
								setTimeout(function() { location.href='paginainicial.php' }, 2000);
							</script>";
				   

			   }else{
				  echo    "<script>
								sweetAlert('Falha', 'A republica não pôde ser atualizada', 'error');
								setTimeout(function() { location.href='paginainicial.php' }, 2000);
							</script>";
			   }
			  
		  }else{
			  
			  echo   "<script>
                        sweetAlert('Falha', 'Primeiro adicione o novo gerente como inquilino da república, para depois colocá-lo como gerente', 'error');
                        setTimeout(function() { history.back() }, 3000);
                    </script>";
		  }
	  
	  }else{
		  echo    "<script>
								sweetAlert('Falha', 'A republica não pôde ser atualizada', 'error');
								setTimeout(function() { location.href='paginainicial.php' }, 2000);
							</script>";
	  
	  }
	  
	 
	  
	  mysqli_close($conexao);      
  }
      
  


 ?>
