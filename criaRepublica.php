<?php

    include("crudMySql.php");

    $conexao = open_database();

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $vagas = $_POST['vagas'];
    $contato = $_POST['contato'];
    $cidade = $_POST['cidade'];
    $gerente = $_SESSION['email'];

    if (!empty($cidade)&&!empty($nome)&&!empty($contato)) {
      if (read_database('republica', "WHERE nome = '$nome'") == FALSE) {

        $data = array('nome' => '$nome', 'endereco' => '$endereco','vagas' => '$vagas','contato' => '$contato','cidade' => '$cidade','gerente' => '$gerente' );
        if(create_database('republica',$data) == TRUE){
          echo "<script>
        sweetAlert('Sucesso na criação da república', 'República criada com sucesso', 'success');
            </script>";
        }else{
          echo "<script>
        sweetAlert('Falha na criação da república', 'Falha ao criar república', 'error');
            </script>";
        }
        
      }else{
        echo "<script>
        sweetAlert('República já em sistema', 'A república já existe', 'error');
            </script>";
      }
    }else{
      echo "<script>
        sweetAlert('Dados vazios', 'Preencha os campos vazios!', 'error');
            </script>";
    }
  ?>