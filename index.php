<?php


?>
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
      <!--Import jQuery before materialize.js-->
      <div class="container">
        <div class="row center-align">
          <img src="materialize/img/brasao.png" alt="" width="150px">
        </div>
        <div class="row">
          <form method="post" action="valida_login" class="col s12">
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
            <div class="row ">
              <div class="row col s12">
                  <a class="" href="#modal1">Esequeci minha senha!</a>
                  <!-- Modal Structure -->
                  <div id="modal1" class="modal">
                    <div class="modal-content">
                      <h4>Digite seu e-mail para recuperação</h4>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="email" type="email" class="validate">
                          <label for="email">Email</label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Enviar</a>
                    </div>
                  </div>
              </div>
            </div>
            	<div class="row center-align">
          			<input type="submit" value="Login" class="waves-effect waves-light btn grey darken-3">
          			<a class="waves-effect waves-light btn grey darken-3" href="cadastro.html">Cadastrar</a>
        		</div>
          </form>
        </div>

      </div>
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
