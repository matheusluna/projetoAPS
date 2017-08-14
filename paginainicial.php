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

	<div class="container">
		<br><br>

		<?php 
			//SE FOR GERENTE OU INQUILINO EXIBE O MURAL
		  if($_SESSION['tipo'] != NULL){
			include("mural.php");	  
		  }else{
			  echo "<h4>Você não participa de nenhuma república</h4>";
		  }
		 
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
