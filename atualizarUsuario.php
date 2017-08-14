<!DOCTYPE html>

<html>

<head>

	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
	<?php session_start(); ?>
	<?php include("menu.php"); ?>
	<?php
      $conexao = open_database();
      if($conexao != null){
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conexao, $sql);

        $resultado = mysqli_fetch_assoc($result);

        if($_POST){
          $nomeNovo = $_POST['inputNome'];
          $userNovo = $_POST['inputUsername'];
          $emailNovo = $_POST['inputEmail'];
          $senhaNovo = $_POST['inputSenha'];
          $cidadeNova = $_POST['inputCidadeAtual'];
          $telefoneNovo = $_POST['inputTelefone'];
          $fotoNova = $_POST['inputFoto2'];

          $sql2 = "UPDATE usuario SET nome = '$nomeNovo', foto = '$fotoNova', username = '$userNovo', email = '$emailNovo', senha = '$senhaNovo', cidadeAtual = '$cidadeNova', telefone = '$telefoneNovo' WHERE email = '$email'";
          $result = mysqli_query($conexao, $sql2);
          $_SESSION['nome'] = $nomeNovo;
          $_SESSION['email'] = $emailNovo;
        }
      }

?>

		<div class="container">

			<div class="row">
				<form class="col s12" method="post" action="atualizarUsuario.php" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col s6">
							<input id="campoNome" name="inputNome" type="text" class="validate" required>
							<label for="name">Nome</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="campoUser" name="inputUsername" type="text" class="validate" required>
							<label for="inputUsername" data-error="wrong" data-success="right">Nome de usuário</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="campoEmail" name="inputEmail" type="email" class="validate" required>
							<label for="email">Email</label>
						</div>
						<div class="input-field col s6">
							<input id="campoSenha" name="inputSenha" type="password" class="validate" required>
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="row">
							<div class="input-field col s12">
								<input id="campoCidade" name="inputCidadeAtual" type="text" class="validate" required>
								<label for="email">Cidade atual</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="campoTelefone" name="inputTelefone" type="tel" class="validate" required>
							<label for="icon_telephone">Telephone</label>
						</div>
					</div>

					<div class="row">
						<div class="file-field input-field">
							<div class="btn">
								<span>Foto</span>
								<input name="inputFoto" type="file">
							</div>

							<div class="file-path-wrapper">
								<input id="campoFoto" name="inputFoto2" class="file-path validate" type="text">
							</div>

						</div>
					</div>

					<div class="fixed-action-btn">
						<input style="font-size:10pt" class="btn-floating btn-large red" type="submit" value="Enviar">
					</div>

				</form>
			</div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".button-collapse").sideNav();
				$('.modal').modal();
			});

		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.datepicker').pickadate({
					selectMonths: true, // Creates a dropdown to control month
					selectYears: 100, // Creates a dropdown of 15 years to control year
					min: new Date(1920, 0, 1),
					max: new Date()
				});
				$('select').material_select();
				document.getElementById('campoNome').value = "<?php echo $resultado['nome'] ?>";
				document.getElementById('campoUser').value = "<?php echo $resultado['username'] ?>";
				document.getElementById('campoEmail').value = "<?php echo $resultado['email'] ?>";
				document.getElementById('campoSenha').value = "<?php echo $resultado['senha'] ?>";
				document.getElementById('campoCidade').value = "<?php echo $resultado['cidadeAtual'] ?>";
				document.getElementById('campoTelefone').value = "<?php echo $resultado['telefone'] ?>";
				document.getElementById('campoFoto').value = "<?php echo $resultado['foto'] ?>";
			});

		</script>

		<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>

</html>
