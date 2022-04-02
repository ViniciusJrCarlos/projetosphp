<?php
    //inclui a classe fpdf
    require_once 'docspdfs/app.util/fpdf/fpdf.php';


    $pdf =  new FPDF('P', 'pt', 'A4');
    
    //define os atributos do pdf

    $pdf->SetTitle('Teste PDF 1');
    $pdf->SetAuthor('Pablo dall\Oglio');
    $pdf->SetCreator('PHP'.phpversion());
    $pdf->SetKeywords('php, pdf');
    $pdf->SetSubject('Como Criar um PDF com php 1');


    //adiciona uma pagina

    $pdf->AddPage();

    //define fonte

    $pdf->SetFont('Arial', '', 12);

    //marca os quatros cantos da pagina

    $pdf->Text(0, 12, 'X1');
    $pdf->Text(576, 12, 'X2');
    $pdf->Text(0, 840, 'X3');
    $pdf->Text(576, 840, 'X4');

    //vinte pontos de espaçamento

    $pdf->Ln(20);

    //imprime o titulo em azul centralizado

    $pdf->SetFont('Courier', 'B', 16);
    $pdf->SetTextColor(50, 50, 100);
    $pdf->SetY(70);
    $pdf->SetX(260);
    $pdf->Write(30, 'Titulo'); //nao desloca o cursor

    //vinte pontos de espaçamento

    $pdf->Ln(30);

    //cria variaveis de texto com repeticoes
    $txt = str_repeat('write', 30);
    $pdf->SetTextColor(100, 50, 50);
    $pdf->SetFont('Times', 'B', 14);


    //imprime texto usando a funçao write

    $pdf->Write(20, $txt);

    //imprime texto depois de alterar coordenada X

    $pdf->Ln(40);
    $pdf->SetX(200);
    $pdf->SetTextColor(50, 100, 50);

    $pdf->Write(20, 'SetX '. $txt);

    //imprime dados do hyperlink
    $pdf->Ln(40);
    $pdf->SetX(260);
    $pdf->SetTextColor(0, 0, 255);
    $pdf->Write(20, 'site Adianti', 'http://www.adiante.com.br');

    //exibe o resultado no navegador

    $pdf->Output();
?>