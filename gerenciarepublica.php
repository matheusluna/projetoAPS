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
          <a href="#!name"><span class="white-text name"><?php $nome = $_SESSION['nome']; echo "$nome"; ?></span></a>
          <a href="#!email"><span class="white-text email"><?php $email = $_SESSION['email']; echo "$email"; ?></span></a>
        </div></li>
        <li><a href="republica.php">República</a></li>
        <li><a href="#!" class="subheader">Tarefas</a></li>
        <li><a href="#" class="subheader">Calendário</a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="index.html"><i class="material-icons">power_settings_new</i>Logout</a></li>
      </ul>
      <div class="navbar-fixed">

        <nav>
          <div class="nav-wrapper grey darken-3">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <a href="#!" class="brand-logo">RepublicS</a>
          </div>
        </nav>
      </div>
      <div class="container">
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4>Adicionar participante</h4>
            <div class="input-field">
              <input id="id" type="text" name="" value="">
              <label for="id">nickname</label>
              <button class="btn" type="button" name="button">Pesquisar</button>
            </div>

          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
          </div>
        </div>

        <br>
        <div class="row">
            <h4>Nome da república <a href="#modal1" class="btn-floating"><i
              class="material-icons">add</i></a></h4>

        </div>

        <div class="divider"></div>
        <table class="highlight">
          <thead>
            <tr>
                <th>Id</th>
                <th>E-mail</th>
                <th>Telefone</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>matheusLuna</td>
              <td>matheusluna96@gmail.comm</td>
              <td>(87) 99609-5790</td>
              <td><button class="btn-flat" type="button" name="button"><i
                class="material-icons">delete</i></button><button class="btn-flat" type="button" name="button"><i
                  class="material-icons">edit</i></button></td>
            </tr>

          </tbody>
        </table>

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
