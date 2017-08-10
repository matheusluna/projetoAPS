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

    <body class="grey lighten-4">
      <?php include("bloqueiaAcessoDiretoURL.php");?>
      <!--Import jQuery before materialize.js-->



      <ul id="slide-out" class="side-nav">
        <li><div class="userView">
          <div class="background">
            <img src="materialize/img/paisagem.jpg">
          </div>
          <a href="#!user"><img class="circle" src="materialize/img/pessoa.jpg"></a>
          <a href="atualizarUsuario.php"><span class="white-text name">Editar Perfil</span></a>
          <a href="#!name"><span class="white-text name"><?php $nome = $_SESSION['nome']; echo "$nome"; ?></span></a>
          <a href="#!email"><span class="white-text email"><?php $email = $_SESSION['email']; echo "$email"; ?></span></a>
        </div></li>
        <li><a href="republica.php">República</a></li>
        <li><a href="#!" class="subheader">Tarefas</a></li>
        <li><a href="#" class="subheader">Calendário</a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="index.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
      </ul>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper grey darken-3">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <a href="principal.php" class="brand-logo">RepublicS</a>
          </div>
        </nav>
      </div>
      <div class="container">

        <form class="" action="gerenciarepublica.php" method="post">
          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Adicionar participante</h4>
              <div class="input-field">
                <input id="id" type="text" name="membro" value="">
                <label for="id">nickname</label>
              </div>

            </div>
            <div class="modal-footer">
              <input class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="" value="Salvar">
            </div>
          </div>
        </form>

        <br>
        <div class="row">
            <h4><?php include("crudMySql.php"); $result = read_database('usuario', "WHERE email = '$email'");
			$nomeRepublica = $result[0]['nomerepublica']; echo"$nomeRepublica";?> <a href="#modal1" class="btn-floating"><i
              class="material-icons">add</i></a>
              <a href="minhaRepublicaGerente.php" class="btn-floating"><i class="material-icons">edit</i></a></h4>

        </div>

      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.modal').modal();
      });
      </script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
  </html>

  <?php
   	$conexao = open_database();
  	if ($conexao != null) {
  		if($_POST){
  	      $membro = $_POST['membro'];

  				  	$sqlConsultaUser = "SELECT * FROM usuario WHERE username = '$membro'";

  				  	$result = mysqli_query($conexao, $sqlConsultaUser);
  				  	if(mysqli_num_rows($result) == 1){
  				  		$row = mysqli_fetch_assoc($result);

  						$sqlAtualizaUser = "UPDATE usuario ".
  										   "SET tipo='inquilino', nomerepublica='$nomeRepublica' ".
  										   "WHERE username = '$membro'";

  	        			mysqli_autocommit($conexao, FALSE);

  						if(mysqli_query($conexao, $sqlAtualizaUser)){

  	            			mysqli_commit($conexao);

  							$userAtualizado = TRUE;
  						}else{$userAtualizado = FALSE;}
  			 }

  	    mysqli_close($conexao);

    }
}
  ?>

  <?php

        echo "<center><div class='container'>";
        echo "
            <div class='divider'></div>
            <table class='highlight'>
            <thead>
            <tr>
            <th>Id</th>
            <th>E-mail</th>
            <th>Telefone</th>
            </tr>
            </thead>
            <tbody>";

  					$result = read_database('usuario', "WHERE nomerepublica = '$nomeRepublica' and email <> '$email'");

  					for ($i = 0; $i < sizeof($result); $i++) {

                echo "<tr>";
  							$id = $result[$i]['username'];
  							$Email = $result[$i]['email'];
  							$telefone = $result[$i]['telefone'];

  							if($result){

                echo "<td>$id</td>";
                echo "<td>$Email</td>";
                echo "<td>$telefone</td>";
          			echo "<td><a class='btn-flat' href='removerinquilino.php?nomerepublica=$nomeRepublica&usuario=$Email'><i
                class='material-icons'>delete</i></a></td>";
          			echo "</tr>";
          		}

  			}

        echo "</tbody>
        </table>";
        echo "</div></center";

?>
