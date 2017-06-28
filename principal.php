<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	  <!--Import SweerAlert and CSS-->
	  <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
      <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="grey lighten-4">
      <?php
		session_start();		
		if(empty($_SESSION['email']) and empty($_SESSION['senha'])){
			echo "<script>
		        sweetAlert('Você não logou', 'Por favor entre no sistema', 'error');
		        setTimeout(function() { location.href='index.php' }, 3000); </script>";
			session_unset();
			exit;
		}
	  ?>
      <!--Import jQuery before materialize.js-->
      <ul id="slide-out" class="side-nav">
        <li><div class="userView">
          <div class="background">
            <img src="materialize/img/paisagem.jpg">
          </div>
          <a href="#!user"><img class="circle" src="materialize/img/pessoa.jpg"></a>
          <a href="#!name"><span class="white-text name">John Doe</span></a>
          <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
        <li><a href="republica.html">República</a></li>
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
            <h4>Atenção</h4>
            <p>Você não possui república</p>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
        $(".button-collapse").sideNav();
        $('.modal').modal();
        $('#modal1').modal('open');
      });
      </script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </body>
  </html>