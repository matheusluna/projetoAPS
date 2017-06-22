<?php
  include("conexao.php");

  $conexao = open_database();

  $sql = "SELECT nome FROM usuario";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "Nome: " . $row["nome"]."<br>";
      }
  } else {
      echo "0 results";
  }

mysqli_close($conexao);



?>
