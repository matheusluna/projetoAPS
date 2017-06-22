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

      if(mysqli_query($conexao,$sql)){
          echo "<script>alert('Usuário cadastrado com sucesso')</script>";
          echo "<script>location.href='index.php';</script>";
      }else{
          echo "<script>alert('Usuário já cadastrado')</script>";
          echo "<script>location.href='cadastro.php'</script>";
      }
      mysqli_close($conexao);
    }else{
      echo "<h1>Falha na conexão com o banco</h1>";
    }
?>
