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
	<?php include("bloqueiaAcessoDiretoURL.php");
      $conn = mysqli_connect('localhost', 'root','', 'republics');
      ?>


	<?php include("menu.php"); ?>

	<div class="container">

		<?php 
        $result = read_database('usuario', "WHERE email = '$email'");
        $nomeRepublica = $result[0]['nomerepublica'];
        ?>

		<?php
          $sql = mysqli_query($conn, "SELECT * FROM republica WHERE nome='$nomeRepublica' ");
          $row =mysqli_num_rows($sql);
          if($row > 0){
            while ($linha = mysqli_fetch_array($sql)){
              $nome = $linha['nome'];
              $cidade = $linha['cidade'];
              $rua = $linha['rua'];
              $bairro = $linha['bairro'];
              $vagas = $linha['numerovagas'];
              $contato = $linha['contato'];
              $gerente = $linha['gerente'];

              echo "<br>";
              echo "<h5>";
              echo "<strong> Nome: </strong>".@$nome;
              echo "<br>";
              echo "<strong> Cidade: </strong>".@$cidade;
              echo "<br>";
              echo "<strong> Rua: </strong>".@$rua;
              echo "<br>";
              echo "<strong> Bairro: </strong>".@$bairro;
              echo "<br>";
              echo "<strong> Vagas: </strong>".@$vagas;
              echo "<br>";
              echo "<strong> Contato: </strong>".@$contato;
              echo "</h5>";
              echo "<br>";



            }
          }else{
            echo "<br>";
            echo "<strong>Desculpe, sem republicas disponiveis</strong>";
          }
      ?>
			<form class="" action="editarRepublica.php?nomerepublica=<?php echo $nome; ?>" method="post">
				<div id="modal1" class="modal">
					<div class="modal-content">
						<h4>Editar</h4>
						<div class="input-field">
							<input id="nome" type="text" name="nome" value="<?php echo $nome; ?>">
							<label for="nome">Nome</label>
						</div>
						<div class="input-field">
							<input id="cidade" type="text" name="cidade" value="<?php echo $cidade; ?>">
							<label for="cidade">Cidade</label>
						</div>
						<div class="input-field">
							<input id="rua" type="text" name="rua" value="<?php echo $rua; ?>">
							<label for="rua">Rua</label>
						</div>
						<div class="input-field">
							<input id="bairro" type="text" name="bairro" value="<?php echo $bairro; ?>">
							<label for="bairro">Bairro</label>
						</div>
						<div class="input-field">
							<input id="vagas" type="text" name="vagas" value="<?php echo $vagas; ?>">
							<label for="vagas">Vagas</label>
						</div>
						<div class="input-field">
							<input id="contato" type="text" name="contato" value="<?php echo $contato; ?>">
							<label for="contato">Contato</label>
						</div>
						<div class="input-field">
							<input id="contato" type="email" name="gerente" value="<?php echo $gerente; ?>">
							<label for="contato">Gerente</label>
						</div>
					</div>
					<div class="modal-footer">

						<input class='modal-action modal-close waves-effect waves-green btn-flat' type="submit" name="editar" value="Salvar">

					</div>
				</div>
			</form>
			<a class="btn" href="#modal1">Editar</a>
			<?php
        echo "<a class='btn' href='excluiRepublica.php?nomerepublica=$nomeRepublica&usuario=$email'>Excluir</a>";
         ?>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".button-collapse").sideNav();
			$('.modal').modal();
		});

	</script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>

</html>
