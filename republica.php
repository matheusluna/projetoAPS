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
      <?php include("menu.php") ?>
      <div class="container">
        <br><br>
        <div class="row">
          <div class="col s3 center-align">
            <a class="btn-floating btn-large waves-effect waves-light red" href="criaRepublica.php"><i class="material-icons">add</i></a>
            <p>Criar</p>
          </div>
          <div class="col s3 center-align">
            <a class="btn-floating btn-large waves-effect waves-light cyan darken-4" href="pesquisa.php"><i class="material-icons">search</i></a>
            <p>Pesquisar</p>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
      });
      </script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
  </html>
