<?php
    require '../app_lista_de_tarefas/Models/Tarefa/Tarefa.php';
    require '../app_lista_de_tarefas/Models/Tarefa/TarefaService.php';
    require '../app_lista_de_tarefas/Conexao.php';
	require '../app_lista_de_tarefas/Models/Exportar/Exportar.php';

	
    //se existe uma variável ação setada na super global get, ele utiliza a mesma. Se não não houver, aguardar uma variável de ação na página. 
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' ) {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: index.php?inclusao=1');
	
	} else if($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
	
	} else if($acao == 'atualizar') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if($tarefaService->atualizar()) {

			if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('location: index.php');
			}else if (($_GET['pag']) && $_GET['pag'] == 'realizadas') {
				header('location: tarefas_realizadas.php');
			}else{
				header('location: todas_tarefas.php');
			}
			
		} 
		

	} else if ($acao == 'remover'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();

		if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');
		}else if (($_GET['pag']) && $_GET['pag'] == 'realizadas') {
			header('location: tarefas_realizadas.php');
		}else{
			header('location: todas_tarefas.php');
		}

    } else if ($acao == 'marcarRealizada') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');
		}else if (($_GET['pag']) && $_GET['pag'] == 'realizadas') {
			header('location: tarefas_realizadas.php');
		}else{
			header('location: todas_tarefas.php');
		}

	} else if ($acao == 'marcarPendente') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 1);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarPendente();

		if(isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');
		}else if (($_GET['pag']) && $_GET['pag'] == 'realizadas') {
			header('location: tarefas_realizadas.php');
		}else{
			header('location: todas_tarefas.php');
		}

	} else if ($acao == 'verPendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);

		$conexao = new Conexao();
		
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->verPendentes();
		
	} else if ($acao == 'verRealizadas'){
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->verRealizadas();
	} else if ($acao == 'exportar_excel'){
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();

		$exportar = new Exportar();

		$exportar->excel($_GET['nomeArquivo'], $tarefas);

		header('location: todas_tarefas.php');
	} else if ($acao == 'exportar_csv'){
		echo '<script>alert("Exportar CSV em breve!")</script>';
	}

?>