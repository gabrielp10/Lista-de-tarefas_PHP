<?php
	$acao = 'recuperar';
	require 'tarefa_controller.php';
?>



<html >
<h4>Todas tarefas</h4>
<hr />

<? foreach($tarefas as $indice => $tarefa) { ?>
	<div class="row mb-3 d-flex align-items-center tarefa">
		<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
			<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
			<?=' - ' . $tarefa->data_cadastrado ?>
		</div>
		
		<div class="col-sm-3 mt-2 d-flex justify-content-between">
			<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
			<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
			<i class="fas fa-redo" onclick="marcarPendente(<?= $tarefa->id ?>)"></i>
			<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
		</div>
	</div>
<? } ?>
	<hr />
<div class="dropdown d-flex justify-content-end">
	<button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Exportar
	</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<a class="dropdown-item d-flex justify-content-center excelcolor" href="excel?acao=exportar_excel&&nomeArquivo=Todas_Tarefas" ><i class="fas fa-file-excel"></i></i>&nbsp;Excel</a>
		<a class="dropdown-item d-flex justify-content-center csvcolor" href="excel?acao=exportar_csv"><i class="fas fa-file-alt"></i></i>&nbsp;&nbsp;CSV</a>
	</div>
</div>							
</div>