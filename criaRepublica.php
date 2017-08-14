<!DOCTYPE html>
<html>

<head>
	<script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
	<link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>

<body>
	<?php include("bloqueiaAcessoDiretoURL.php");?>
	<?php include("menu.php") ?>


	<?php
  	//session_start(); A sessão já está aberta na linha do body acima
  	
	$conexao = open_database();
	if ($conexao != null) {
		if($_POST){
	      $nome = $_POST['nome'];
	      $rua = $_POST['rua'];
	      $bairro = $_POST['bairro'];
	      $vagas = (int) $_POST['vagas'];
	      $contato = $_POST['contato'];
	      $cidade = $_POST['cidade'];
	      $gerente = $_SESSION['email'];

	      $sql = "INSERT INTO republica (nome, rua, bairro, numerovagas, contato, cidade, gerente) ".
	      		  "VALUES ('$nome', '$rua', '$bairro', '$vagas', '$contato', '$cidade', '$gerente')";
	      $sql2 = "SELECT * FROM republica WHERE nome = '$nome'";

	      if(empty($cidade)||empty($nome)||empty($rua)||empty($vagas)||empty($contato)||empty($gerente)||empty($bairro)){
	      	echo "<script>
	        sweetAlert('Dados vazios ou incorretos', 'Preencha os campos vazios ou corrija os erros!', 'error');
	        </script>";

	      }else{
			if (mysqli_query($conexao, $sql2)->num_rows == 0){

	        	//Desabilita autocommit
	        	mysqli_autocommit($conexao, FALSE);

	        	if(mysqli_query($conexao, $sql)){

	            	//insere o commit
	            	mysqli_commit($conexao);

	            	$repCriada = TRUE;

				  	//------ Trecho atualiza usuario para gerente
				  	$sqlConsultaUser = "SELECT * FROM usuario WHERE email = '$gerente'";

				  	$result = mysqli_query($conexao, $sqlConsultaUser);
				  	if(mysqli_num_rows($result) == 1){
				  		$row = mysqli_fetch_assoc($result);

						$sqlAtualizaUser = "UPDATE usuario ".
										   "SET tipo='gerente', nomerepublica='$nome' ".
										   "WHERE email = '$gerente'";

						//Desabilita autocommit
	        			mysqli_autocommit($conexao, FALSE);

						if(mysqli_query($conexao, $sqlAtualizaUser)){

							//insere o commit
	            			mysqli_commit($conexao);
							
							$userAtualizado = TRUE;
							$_SESSION['tipo'] = "gerente";
						}else{$userAtualizado = FALSE;}
				  	}//------ Fim do trecho

	          	}else{
	          		$repCriada = FALSE;
	            	echo "<script>
	          		sweetAlert('Falha ao criar', 'Houve um erro! A república não foi criada...', 'error');
	              	</script>";
	          	}

				//Verifica a criação da republica e atualização do usuario para gerente
				//e volta um ou mais estados anteriores do banco em caso de erro
				if($repCriada and $userAtualizado){
					echo "<script> sweetAlert('Cadastro Realizado', 'República criada!', 'success');
	          		setTimeout(function() { location.href='paginainicial.php' }, 2000); </script>";
				}else if(!$repCriada and !$userAtualizado){
					mysqli_rollback($conexao);
					mysqli_rollback($conexao);
					echo "<script>
	          		sweetAlert('Falha ao criar', 'Houve um erro! A república não foi criada...', 'error');
	              	</script>";
				}else if(!$repCriada or !$userAtualizado){
					mysqli_rollback($conexao);
					echo "<script>
	          		sweetAlert('Falha ao criar', 'Houve um erro! A república não foi criada...', 'error');
	              	</script>";
	        	}
	      }else{
	        	echo "<script>
	          	sweetAlert('Falha ao criar república', 'Já existe uma república com esse nome!', 'error');
	            </script>";
	        }
	    }
	    mysqli_close($conexao);
	}
  }else{
		echo "<script>
	    sweetAlert('Falha na conexão', 'Não foi possível se conectar ao servidor...', 'error');
	    </script>";
  }

?>
		<div class="container">
			<br><br>
			<div class="row">
				<form class="col s12" method="post" action="criaRepublica.php">
					<div class="row">
						<div class="input-field col s6">
							<input id="nome" type="text" class="validate" name="nome">
							<label for="nome">Nome</label>
						</div>
						<div class="input-field col s6">
							<input id="bairro" type="text" class="validate" name="bairro">
							<label for="bairro">Bairro</label>
						</div>
						<div class="input-field col s6">
							<input id="rua" type="text" class="validate" name="rua">
							<label for="rua">Rua</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="cidade" type="text" class="validate" name="cidade">
							<label for="cidade">Cidade</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="vagas" type="number" class="validate" name="vagas">
							<label for="vagas">Vagas</label>
						</div>
						<div class="input-field col s6">
							<input id="contato" type="text" class="validate" name="contato">
							<label for="contato">Contato</label>
						</div>
					</div>
					<div class="fixed-action-btn">
						<input style="font-size:10pt" class="btn-floating btn-large red" type="submit" value="Enviar" href="gerenciarrepublica.html">
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".button-collapse").sideNav();
			});

		</script>
		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>

</html>
