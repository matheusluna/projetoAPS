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

    <body>
      <?php include("bloqueiaAcessoDiretoURL.php");

        $conn = mysqli_connect('localhost', 'root','', 'republics');
      ?>
      <?php include("menu.php") ?>
     
      <div class="container">
        <br>
        <form name="pesquisa" method="post" action="results.php">
          <div class="row">
            <div class="input-field col s11">
              <input id="cidade" type="text" name="buscar" class="validate">
              <label for="email">Cidade</label>
            </div>
            <div class="col s1">
              <br>  
              <input type="submit" class="waves-effect waves-light btn"  value="Pesquisar">
            </div>
          </div>
        </form>
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
