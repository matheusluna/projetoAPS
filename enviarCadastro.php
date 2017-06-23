<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>

  </body>
</html>
<?php
    include("conexao.php");

    $conexao = open_database();
    if($conexao != null){
      $nome = $_POST['inputNome'];
      $nascimento = $_POST['inputNascimento'];
      $username = $_POST['inputUsername'];
      $email = $_POST['inputEmail'];
      $senha = $_POST['inputSenha'];
      $cidadeAtual = $_POST['inputCidadeAtual'];
      $sexo = $_POST['selectSexo'];
      $telefone = $_POST['inputTelefone'];

      if(isset($_FILES['inputFoto'])){
        date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
        $ext = strtolower(substr($_FILES['inputFoto']['name'],-4)); //Pegando extensão do arquivo
        $new_name = $username . $ext; //Definindo um novo nome para o arquivo
        $dir = 'fotosperfil/'; //Diretório para uploads
        move_uploaded_file($_FILES['inputFoto']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
      }

      $foto = "fotosperfil/".$username."".$ext;
      $sql = "INSERT INTO usuario (nome,foto, nascimento,username,email,senha,cidadeAtual,sexo,telefone)
      VALUES ('$nome','$foto','$nascimento','$username','$email','$senha','$cidadeAtual','$sexo','$telefone')";

      if(mysqli_query($conexao, $sql)){
        echo "<script>
        sweetAlert('Sucesso no cadastro', 'Usuário foi cadastrado com sucesso', 'success');
        setTimeout(function() { location.href='index.php' }, 3000);
            </script>";
      }else{
        echo "<script>
        sweetAlert('Falha no cadastro', 'Usuário já existe', 'error');
        setTimeout(function() { window.history.back(); }, 3000);
            </script>";
      }

      mysqli_close($conexao);
    }else{
      echo "<h1>Falha na conexão com o banco</h1>";
    }
?>
