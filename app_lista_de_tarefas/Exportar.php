<?php


class Exportar

{
    public function excel($nomeArquivo, $tarefa)
    {

    $nomeArquivo = $nomeArquivo . '.txt';
    $html = '';
    $html .= '<table bgcolor="lightblue" border="1">';
    $html .= '<tr>';
    $html .= '<th>' . $tarefa->tarefa . '</th>';
    $html .= '</tr>';

    // configurando header para download
    header("Content-Description: PHP Generated Data");
    header("Content-Type: application/x-msexcel");
    header("Content-Disposition: attachment; filename=\"{$nomeArquivo}\"");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    // envio conteúdo
    echo $html;
    exit;

    }
}
