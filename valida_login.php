<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
	<?php
		session_start();
		
		include("crudMySql.php"); 
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		if(!empty($email) and !empty($senha)){
			if(read_database('usuario', "WHERE email = '$email'") != FALSE){
				$_SESSION['email'] = $email;//Vê isto
				$_SESSION['senha'] = $senha;//Vê isto	
				
				$result = read_database('usuario', "WHERE email = '$email'"); 
				
				if($result['senha'] <> $senha){	
					echo "<script>
		        	sweetAlert('Senha incorreta', 'Digite novamente a senha', 'error');
		        	setTimeout(function() { window.history.back(); }, 3000); </script>";
					
					close_session();
				}else{
					$_SESSION['nome'] = $nome = $result['nome'];
					
					echo "<script> sweetAlert('Login efetuado', 'Bem Vindo, $nome', 'success');
					setTimeout(function() { location.href='principal.html' }, 3000); </script>";	
				}
			}else{
				echo "<script>
		        sweetAlert('Falha ao logar', 'Usuário não cadastrado', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
		        
		        close_session();
			}
		}else{
			if(empty($email) and empty($senha)){
				echo "<script>
		        sweetAlert('Campos não informados', 'Os campos estão vazios, preencha-os', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
				
				close_session();
			}else if(empty($email)){
				echo "<script>
		        sweetAlert('Email não informado', 'Preencha o campo email', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
		        
		        close_session();
			}else if(empty($senha)){
				echo "<script>
		        sweetAlert('Senha não informada', 'Preencha o campo senha', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
		        
		        close_session();
			}
		}
		
		function close_session(){
			unset ($_SESSION['email']);
			unset ($_SESSION['senha']);
			unset ($_SESSION['nome']);
		}	

?>
  </body>
</html>

