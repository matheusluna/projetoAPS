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
      <?php include("bloqueiaAcessoDiretoURL.php");
      $conn = mysqli_connect('localhost', 'root','', 'republics');
      ?>
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

        <?php include("crudMySql.php");
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
<form class="" action="editarRepublica.php" method="post">
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Editar</h4>
          <div class="input-field">
            <input id="nome" type="text" name="nome" value="<?php echo $nome; ?>" readonly="true">
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
            <input id="contato" type="text" name="gerente" value="<?php echo $gerente; ?>" readonly="true">
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
      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.modal').modal();
      });
      </script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
  </html>
