<?php
	require_once 'navbar.php';
	$acao = 'recuperar';
	require 'tarefa_controller.php';
	echo '<pre>';
	print_r($tarefas);
	echo '</pre>';
?>

<html >
	<body style="background-image: url(img/background-site.jpg)">
		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php foreach($tarefas as $indice => $tarefa){ ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9"><?= $tarefa->tarefa ?>(<?=$tarefa->status ?>)?></div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger"></i>
											<i class="fas fa-edit fa-lg text-info"></i>
											<i class="fas fa-check-square fa-lg text-success"></i>
										</div>
									</div> 

								<?php } ?>


								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>