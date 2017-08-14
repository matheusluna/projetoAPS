<ul id="slide-out" class="side-nav">
	<li>
		<div class="userView">
			<div class="background green">
				
			</div>
			<?php 
         	include("crudMySql.php");
			$email = $_SESSION['email'];
			$result = read_database('usuario',"WHERE email='$email'");
			$foto = $result[0]['foto'];
			$republica = $result[0]['nomerepublica'];
		
         	?>

			<a href="#!user"><img class="circle" src="<?php echo $foto; ?>"></a>
			<a href="atualizarUsuario.php"><span class="white-text name">Editar Perfil</span></a>
			<a href="#!name"><span class="white-text name"><?php $nome = $_SESSION['nome']; echo "$nome"; ?></span></a>
			<a href="#!email"><span class="white-text email"><?php $email = $_SESSION['email']; echo "$email"; ?></span></a>
		</div>
	</li>
	
	<li><a href="paginainicial.php">Página Inicial</a></li>
	
	<?php
		//SE FOR GERENTE EXIBE O LINK GERENCIAR REPÚBLCIA
		if($_SESSION['tipo'] == "gerente"){
			echo "<li><a href='gerenciarepublica.php'>Gerenciar República</a></li>";
		}
	?>
	
	<li><a href="republica.php">República</a></li>
	<li>
		<div class="divider"></div>
	</li>
	<li><a class="waves-effect" href="index.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
</ul>
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper green">
			<a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
			<a href="paginainicial.php" class="brand-logo">RepublicS</a>
				
				<?php 
					if($republica != NULL) {
						echo "<ul class='right hide-on-med-and-down'>
								<li><i class='material-icons left'>home</i>$republica</li>
							  </ul>";
					}	
				?>
					
			
		</div>
	</nav>
</div>
