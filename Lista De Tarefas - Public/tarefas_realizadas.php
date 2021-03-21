<?php require_once 'assets/navbar.php'; 
$acao = 'verRealizadas';
require_once 'tarefa_controller.php';

?>

<script>
			function editar(id, txt_tarefa) {

			//criar um form de edição
			let form = document.createElement('form')
			form.action = 'tarefas_realizadas.php?pag=realizadas&acao=atualizar'
			form.method = 'post'
			form.className = 'row'

			//criar um input para entrada do texto
			let inputTarefa = document.createElement('input')
			inputTarefa.type = 'text'
			inputTarefa.name = 'tarefa'
			inputTarefa.className = 'col-9 form-control'
			inputTarefa.value = txt_tarefa

			//criar um input hidden para guardar o id da tarefa
			let inputId = document.createElement('input')
			inputId.type = 'hidden'
			inputId.name = 'id'
			inputId.value = id

			//criar um button para envio do form
			let button = document.createElement('button')
			button.type = 'submit'
			button.className = 'col-3 btn btn-info'
			button.innerHTML = 'Atualizar'

			//incluir inputTarefa no form
			form.appendChild(inputTarefa)

			//incluir inputId no form
			form.appendChild(inputId)

			//incluir button no form
			form.appendChild(button)

			//teste
			//console.log(form)

			//selecionar a div tarefa
			let tarefa = document.getElementById('tarefa_'+id)

			//limpar o texto da tarefa para inclusão do form
			tarefa.innerHTML = ''

			//incluir form na página
			tarefa.insertBefore(form, tarefa[0])
	}

	function remover(id){
		location.href = 'tarefas_realizadas.php?pag=realizadas&acao=remover&id='+id

	}

	function marcarRealizada(id){
		location.href = 'tarefas_realizadas.php?pag=realizadas&acao=marcarRealizada&id='+id
	}

	function marcarPendente(id){
		location.href = 'tarefas_realizadas.php?pag=realizadas&acao=marcarPendente&id='+id
	}
</script>

<html>
	<body style="background-image: url(assets/img/background-site.jpg)">
		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
						<li class="list-group-item active"><a href="tarefas_realizadas.php">Tarefas realizadas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas realizadas</h4>
								<hr />

								<? foreach ($tarefas as $indice => $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa ">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-redo" onclick="marcarPendente(<?= $tarefa->id ?>)"></i>
										</div>
									</div>
								<? } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>