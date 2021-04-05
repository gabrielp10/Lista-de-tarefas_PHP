<?php require_once 'assets/navbar.php'; 
$acao = 'verPendentes';
require_once 'tarefa_controller.php';

?>

<script>
			function editar(id, txt_tarefa) {

			//criar um form de edição
			let form = document.createElement('form')
			form.action = 'index.php?pag=index&acao=atualizar'
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
		location.href = 'index.php?pag=index&acao=remover&id='+id

	}

	function marcarRealizada(id){
		location.href = 'index.php?pag=index&acao=marcarRealizada&id='+id
	}

	function marcarPendente(id){
		location.href = 'index.php?pag=index&acao=marcarPendente&id='+id
	}
</script>

<html>
	<body style="background-image: url(assets/img/background-site.jpg)">
		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="#" onclick="requisitarPagina('nova_tarefa.php')">Nova tarefa</a></li>
						<li class="list-group-item"><a href="#" onclick="requisitarPagina('todas_tarefas.php')" >Todas tarefas</a></li>
						<li class="list-group-item"><a href="#" onclick="requisitarPagina('tarefas_realizadas.php')">Tarefas realizadas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina" id="conteudo">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />

								<? foreach ($tarefas as $indice => $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa ">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
											<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
										</div>

										<div>
										
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