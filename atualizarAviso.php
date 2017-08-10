<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<?php
$id = $_GET['id'];

include("conexao.php");
$conexao = open_database();

if($conexao != null){
	$sql = "SELECT titulo, texto FROM aviso WHERE id=$id";
	$result = mysqli_query($conexao, $sql);
	
	if ($row = mysqli_fetch_row($result)){
		$titulo = $row[0];
		$texto = $row[1];
	}
	
}
?>
<body>
				<form method="post" action="recebeAtualizarAviso.php?id=<?php echo $id; ?>">
					<label for="tituloAviso">Título</label>
					<input placeholder="Digite o título aqui" id="tituloAviso" name="tituloAviso" type="text" value="<?php echo $titulo; ?>" class="validate">
					<label for="descricaoAviso">Descrição</label>
					<textarea id="descricaoAviso" name="descricaoAviso" class="materialize-textarea"><?php echo $texto; ?></textarea>
					<button class="btn waves-effect waves-light right green" name="atualizar" type="submit">Atualizar
    					<i class="material-icons right">send</i>
  					</button>
				</form>
				<br><br>
		
</body>
</html>