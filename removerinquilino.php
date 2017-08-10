<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Remover Inquilino</title>
    <link rel='stylesheet' type='text/css' href='sweetalert/dist/sweetalert.css'>
  </head>
  <body>
  <script type="text/javascript" src='sweetalert/dist/sweetalert.min.js'></script>
  </body>
</html>

<?php
  include("conexao.php");
  $conexao = open_database();

  if ($conexao != null) {

        $inquilino = $_GET['nomerepublica'];
        $email = $_GET['usuario'];

            $sqlConsultaUser = "SELECT * FROM usuario WHERE email = '$email'";

            $result = mysqli_query($conexao, $sqlConsultaUser);
            if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_assoc($result);

            $sqlAtualizaUser = "UPDATE usuario ".
                       "SET tipo='null'".
                       "WHERE email = '$email'";

                mysqli_autocommit($conexao, FALSE);

            if(mysqli_query($conexao, $sqlAtualizaUser)){

                    mysqli_commit($conexao);

            $userAtualizado = TRUE;
            echo    "<script>
                        sweetAlert('Sucesso', 'O inquilino foi removido com sucesso', 'success');
                        setTimeout(function() { location.href='gerenciarepublica.php' }, 3000);
                    </script>";
            }else{$userAtualizado = FALSE;

              echo    "<script>
                         sweetAlert('Falha', 'O inquilino não foi removido com sucesso', 'error');
                         setTimeout(function() { location.href='gerenciarepublica.php' }, 3000);
                     </script>";

            }
     }
      mysqli_close($conexao);
}
?>
