<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="grey lighten-4">
      <!--Import jQuery before materialize.js-->
      <div class="container">
        <div class="row center-align">
          <img src="materialize/img/brasao.png" alt="" width="150px">
        </div>
        <div class="row">
          <form method="post" action="valida_login.php" class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input name="email" id="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="senha" id="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
            </div>

            <div class="row center-align">
              <input type="submit" value="Login" class="waves-effect waves-light btn grey darken-3">
              <a class="waves-effect waves-light btn grey darken-3" href="cadastro.php">Cadastrar</a>
          </div>
          </form>

        </div>

        <form method="post" action="index.php" class="col s12">
          <div class="row ">
            <div class="row col s12">
                <a class="" href="#modal1">Esequeci minha senha!</a>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>Digite seu e-mail para recuperação</h4>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">Email</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" value="Enviar">
                  </div>
                </div>
            </div>
          </div>
        </form>

      </div>
      <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal').modal();
        });
      </script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
  </html>

  <?php
        include("crudMySql.php");

        if ($_POST) {

          $email = $_POST['email'];

          if(empty($email)){
            echo "<script>
                sweetAlert('Campo email não informado', 'O campo está vazio, preencha-o', 'error');
                setTimeout(function() { window.history.back(); }, 3000); </script>";

          }else {

            if($result = read_database('usuario', "WHERE email = '$email'")){
              $senha = $result[0]['senha'];
              $nome = $result[0]['nome'];
              $emailBanco = $result[0]['email'];

              echo "<script>
              sweetAlert('Olá $nome', 'Sua senha é: $senha', 'success');
              setTimeout(function() { location.href='index.php' }, 7000); </script>";

            }else {
              echo "<script>
                  sweetAlert('O email informado está incorreto', 'Verifique seu email e tende novamente', 'error');
                  setTimeout(function() { window.history.back(); }, 3000); </script>";
            }
          }

        }
   ?>
