<?php
    require '../app_lista_de_tarefas/tarefa.model.php';
    require '../app_lista_de_tarefas/tarefa.service.php';
    require '../app_lista_de_tarefas/conexao.php';


    //se existe uma variável ação setada na super global get, ele utiliza a mesma. Se não não houver, aguardar uma variável de ação na página. 
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; 

    if($acao == 'inserir'){
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);
    
    $conexao = new Conexao;

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1');
    
    }   else if($acao = 'recuperar'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();

    }   else if ($acao == 'atualizar') {
        print_r($_POST);
    }

?>