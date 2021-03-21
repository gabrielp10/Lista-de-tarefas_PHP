<?php require_once 'assets/navbar.php'; ?>
<html>
	<body style="background-image: url(assets/img/background-site.jpg)">
		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Tarefa inserida com sucesso!</h5>
		</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
						<li class="list-group-item"><a href="tarefas_realizadas.php">Tarefas realizadas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4 >Nova tarefa</h4>
								<hr />

								<form method="POST" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input type="text" name="tarefa" class="form-control" placeholder="Exemplo: Lavar o carro">
									</div>

									<button class="btn btn-primary">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>