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
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;	
				
				$result = read_database('usuario', "WHERE email = '$email'"); 
				
				$_SESSION['tipo'] = $result[0]['tipo'];
				
				$_SESSION['foto'] = $result[0]['foto'];
				
				if($result[0]['senha'] <> $senha){	
					echo "<script>
		        	sweetAlert('Senha incorreta', 'Digite novamente a senha', 'error');
		        	setTimeout(function() { window.history.back(); }, 3000); </script>";
					
					session_unset();
					
				}else{
					$_SESSION['nome'] = $nome = $result[0]['nome'];
					
					echo "<script>
	        			sweetAlert('Login efetuado', 'Bem vindo, $nome', 'success');
	        			setTimeout(function() { location.href='paginainicial.php' }, 1000); </script>";
					
					
				}
			}else{
				echo "<script>
		        sweetAlert('Falha ao logar', 'Usuário não cadastrado', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
		        
		        session_unset();
				
			}
		}else{
			if(empty($email) and empty($senha)){
				echo "<script>
		        sweetAlert('Campos não informados', 'Os campos estão vazios, preencha-os', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
				
				session_unset();
				
			}else if(empty($email)){
				echo "<script>
		        sweetAlert('Email não informado', 'Preencha o campo email', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
		        
		        session_unset();
		        
			}else if(empty($senha)){
				echo "<script>
		        sweetAlert('Senha não informada', 'Preencha o campo senha', 'error');
		        setTimeout(function() { window.history.back(); }, 3000); </script>";
		        
		        session_unset();
		        
			}
		}
		
	?>
  </body>
</html>