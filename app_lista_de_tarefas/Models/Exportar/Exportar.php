<?php


class Exportar

{   
    public function excel($nomeArquivo, $tarefas)
    {


    $nomeArquivo = $nomeArquivo . '.xls';
    
    //Titulo da tabela
    $html = '';
    $html .= '<table align="center"  border="1">';
    $html .= '<tr bgcolor="lightblue">';
    $html .= '<th colspan="5" >' . substr(str_replace('_', ' ', $nomeArquivo), 0, -4) . '</th>'; //remove o .xls e substitui _ por espaço
    $html .= '</tr>';
    //cabecalho
    
    $html .= '<tr>';
    $html .= '<th>Nº</th>';
    $html .= '<th>Tarefa</th>';
    $html .= '<th>Status</th>';
    $html .= '<th colspan="2">Criada em: </td>';
    $html .= '</tr>';
    foreach($tarefas as $indice => $tarefa){
        $html .= '<tr>';
        $html .= '<td>' . $tarefa->id . '</td>';
        $html .= '<td>' . $tarefa->tarefa . '</td>';
        $html .= '<td>' .  $tarefa->status . '</td>';
        $html .= '<td colspan="2">' .  $tarefa->data_cadastrado . '</td>';

    }
    $html .= '</tr>';
    $html .= '</table>';


    // configurando header para download
    header("Content-Description: PHP Generated Data");
    header("Content-Type: application/x-msexcel");
    header("Content-Disposition: attachment; filename=\"{$nomeArquivo}\"");
    //evitando cache
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    // envio conteúdo
    echo $html;
    exit;
    

    }
}
