		<center>
			<h4>Mural de avisos</h4>
		</center>
		
		<!-- ABRE JANELA DE CRIAÇÃO -->
		<a class="modal-trigger btn-floating btn-small waves-effect waves-light green" href="#janelaAviso"><i class="material-icons">add</i></a>
		<label style="font-size:15pt">Criar novo</label><br><br>

		<!-- LISTA TODOS OS AVISOS -->
		
				<?php
				
					$email = $_SESSION['email'];
					
					$result = read_database('usuario', "WHERE email = '$email'");  
					
					$nomeRepublica = $result[0]['nomerepublica'];
					
					$resultAvisos = read_database('aviso', "WHERE nomerepublica = '$nomeRepublica' 												    AND data BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH)");  
					
					if($resultAvisos != FALSE){
						echo "<ul class='collapsible popout' data-collapsible='accordion'>";
						for ($i = 0; $i < sizeof($resultAvisos); $i++) {
							
						if($resultAvisos[$i]['autor'] == $email){
							echo "<li>";
							echo "<div class='collapsible-header'>".$resultAvisos[$i]['titulo']."
						
									<span class='badge'>
										<a class='small material-icons' class='modal-trigger btn-floating btn-small waves-effect waves-light green' href='atualizarAviso.php?id=".$resultAvisos[$i]['id']."'>create</a>
										<a class='small material-icons' href='excluirAviso.php?id=".$resultAvisos[$i]['id']."'>delete_forever</a>
									</span>
					
							  </div>
							  <div class='collapsible-body'>
									<p>".$resultAvisos[$i]['texto']."</p>
							  </div>";
							echo "</li>";
							
						}else{
							
							echo "<li>";
							echo "<div class='collapsible-header'>".$resultAvisos[$i]['titulo']."
							  </div>
							  <div class='collapsible-body'>
									<p>".$resultAvisos[$i]['texto']."</p>
							  </div>";
							echo "</li>";
							
						}
						
						}	
						echo "</ul>";
					}else{
						echo "<h5>Nenhum aviso na sua república</h5>";
					}
				
				?>
		

		<!-- CONTEÚDO DA JANELA DE CRIAÇÃO -->
		<div id="janelaAviso" class="modal">
			<div class="modal-content">
				<h4>Novo aviso</h4>
				<form method="post" action="novoAviso.php">
					<label for="tituloAviso">Título</label>
					<input placeholder="Digite o título aqui" id="tituloAviso" name="tituloAviso" type="text" class="validate">
					<label for="descricaoAviso">Descrição</label>
					<textarea id="descricaoAviso" name="descricaoAviso" class="materialize-textarea"></textarea>
					<button class="btn waves-effect waves-light right green" name="enviar" type="submit">Enviar
    					<i class="material-icons right">send</i>
  					</button>
				</form>
				<br><br>
			</div>
		</div>




