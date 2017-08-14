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
        <?php
          $buscar = $_POST['buscar'];
          $sql = mysqli_query($conn, "SELECT * FROM republica WHERE cidade LIKE '%".$buscar."%'");
          $row =mysqli_num_rows($sql);
          if($row > 0){
            while ($linha = mysqli_fetch_array($sql)){
              $nome = $linha['nome'];
              $rua = $linha['rua'];
              $bairro = $linha['bairro'];
              $contato = $linha['contato'];

              echo "<br>";
              echo "<h5>";
              echo "<strong> Nome: </strong>".@$nome;
              echo "<br>";
              echo "<strong> Rua: </strong>".@$rua;
              echo "<br>";
              echo "<strong> Bairro: </strong>".@$bairro;
              echo "<br>";
              echo "<strong> Contato: </strong>".@$contato;
              echo "</h5>";
              echo "<br>";
            }
          }else{
            echo "<br>";
            echo "<strong>Desculpe, sem republicas disponiveis nessa cidade</strong>";
          }
      ?>
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
