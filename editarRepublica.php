<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar República</title>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
  <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
  </body>
</html>

<?php

  $nome = $_POST['nome'];
  $cidade = $_POST['cidade'];
  $rua = $_POST['rua'];
  $bairro = $_POST['bairro'];
  $vagas = $_POST['vagas'];
  $contato = $_POST['contato'];
  $gerente = $_POST['gerente'];

  include("conexao.php");
  $conexao = open_database();

  if ($conexao != null) {

            $sqlConsultaUser = "SELECT * FROM republica WHERE gerente = '$gerente'";

            $result = mysqli_query($conexao, $sqlConsultaUser);
            if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_assoc($result);

            $sqlAtualizaUser = "UPDATE republica ".
                       "SET nome='$nome', cidade='$cidade', rua='$rua', bairro='$bairro', numerovagas='$vagas', contato='$contato' ".
                       "WHERE gerente = '$gerente'";
                mysqli_autocommit($conexao, FALSE);

            if(mysqli_query($conexao, $sqlAtualizaUser)){

                    mysqli_commit($conexao);

            $userAtualizado = TRUE;
            echo    "<script>
                        sweetAlert('Sucesso', 'A republica foi atualizada com sucesso', 'success');
                        setTimeout(function() { location.href='minhaRepublicaGerente.php' }, 3000);
                    </script>";
            }else{$userAtualizado = FALSE;

              echo    "<script>
                         sweetAlert('Falha', 'A republica não foi atualizada com sucesso', 'error');
                         setTimeout(function() { location.href='minhaRepublicaGerente.php' }, 3000);
                     </script>";

            }
     }
      mysqli_close($conexao);
  }


 ?>
