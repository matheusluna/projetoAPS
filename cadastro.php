
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
      <nav>
        <div class="navbar-fixed">
          <nav>
            <div class="nav-wrapper grey darken-3">
              <a href="index.html" class="button-collapse show-on-large"><i class="material-icons">replay</i></a>
              <a href="index.html" class="brand-logo">Cadastro</a>
            </div>
          </nav>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <form class="col s12" method="post" action="enviarCadastro.php" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col s6">
                <input name="inputNome" type="text" class="validate" required>
                <label for="name">Nome</label>
              </div>
              <div class="input-field col s6">
                 <input name="inputNascimento" type="date" class="datepicker" required>
                 <label for="birthdate">Data de nascimento</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="inputUsername" type="text" class="validate" required>
                <label for="email" data-error="wrong" data-success="right">Nome de usuário</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <input name="inputEmail" type="email" class="validate" required>
                <label for="email">Email</label>
              </div>
              <div class="input-field col s6">
                <input name="inputSenha" type="password" class="validate" required>
                <label for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="row">
                <div class="input-field col s12">
                  <input name="inputCidadeAtual" type="text" class="validate" required>
                  <label for="email">Cidade atual</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                <select name="selectSexo" required>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
                <label>Sexo</label>
              </div>
              <div class="input-field col s6">
                <input name="inputTelefone" type="tel" class="validate" required>
                <label for="icon_telephone">Telephone</label>
              </div>
            </div>

            <div class="row">
              <div class="file-field input-field">
                <div class="btn">
                  <span>Foto</span>
                  <input name="inputFoto" type="file" required>
                </div>

                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>

              </div>
            </div>

            <div class="fixed-action-btn">
                   <input style="font-size:10pt" class="btn-floating btn-large red"
                    type="submit" value="Enviar">
            </div>

        </form>
        </div>
      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 100, // Creates a dropdown of 15 years to control year
            min: new Date(1920, 0, 1),
            max: new Date()
          });
          $('select').material_select();
        });
      </script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
  </html>
