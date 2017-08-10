<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title></title>
</head>

<body>
	<div class="container">

		<center>
			<h4>Mural de avisos</h4>
		</center>
		
		<!-- ABRE JANELA DE CRIAÇÃO -->
		<a class="modal-trigger btn-floating btn-small waves-effect waves-light green" href="#janelaAviso"><i class="material-icons">add</i></a>
		<label class="" style="font-size:15pt">Criar novo</label><br><br>


		<!-- LISTA TODOS OS AVISOS -->
		<ul class="collapsible" data-collapsible="accordion">
			<li>
				<?php
				
					include("crudMySql.php"); 
					
					$email = $_SESSION['email'];
					
					$result = read_database('usuario', "WHERE email = '$email'");  
					
					$nomeRepublica = $result[0]['nomerepublica'];
					
					$resultAvisos = read_database('aviso', "WHERE nomerepublica = '$nomeRepublica' 
												   and DATE(data) <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)");  
					
					for ($i = 0; $i < sizeof($resultAvisos); $i++) {
						
						echo '<div class="collapsible-header">'.$resultAvisos[$i]['titulo'].
						  		'<span class="badge">'.
									'<a class="material-icons" href="atualizarAviso.php?id=124">create</a>'.
									'<a class="material-icons" href="excluirAviso.php?id=124">delete_forever</a>'.
								'</span>'.
						  '</div>'.
						  '<div class="collapsible-body">'.
						  		'<p>'.$resultAvisos[$i]['texto'].'</p>'.
						  '</div>';
						
					}
				
				?>
			</li>
			
			
		</ul>

		<!-- CONTEÚDO DA JANELA DE CRIAÇÃO -->
		<div id="janelaAviso" class="modal">
			<div class="modal-content">
				<h4>Novo aviso</h4>
				<form method="post" action="novoAviso.php">
					<label for="tituloAviso">Título</label>
					<input placeholder="Digite o título aqui" id="tituloAviso" name="tituloAviso" type="text" class="validate">
					<label for="descricaoAviso">Descrição</label>
					<textarea id="descricaoAviso" name="descricaoAviso" class="materialize-textarea"></textarea>
					<button class="btn waves-effect waves-light right green" type="submit">Enviar
    					<i class="material-icons right">send</i>
  					</button>
				</form>
				<br><br>
			</div>
		</div>


	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.modal').modal();
		});

	</script>
</body>

</html>
