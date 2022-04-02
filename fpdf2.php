<?php
    require_once 'docspdfs/app.util/fpdf/fpdf.php';

    //inclui a classe fpdf

    //instancia a classe fpdf
    $pdf = new FPDF('P', 'pt', 'A4');

    //adiciona um pagina
    $pdf->AddPage();

    //define a fonte
    $pdf->SetFont('Arial', 'B', 16);

    //imprime duas versoes do titulo
    $pdf->Cell(510, 20, 'Tilulo sem borda', 0, 1, 'C');
    $pdf->Cell(510, 20, 'Titulo com borda', 1, 1, 'C');
    $pdf->Ln(20);

    //imprime celula vermelha alinhada a esquerda
    $pdf->SetFillColor(255, 120, 120);
    $pdf->Cell(170, 30, 'Alinhado a esquerda', 1, 0, 'L', TRUE, 'www.teste.com');

    //imprime celula verde alinhada ao centro
    $pdf->SetFillColor(170, 255, 120);
    $pdf->Cell(170, 30, 'Alinhado ao centro', 1, 0, 'C', TRUE, 'www.teste.com');

    //imprime celula azul alinhada a direita
    $pdf->SetFillColor(100, 100, 255);
    $pdf->Cell(170,30, 'Alinhado a direita', 1, 1, 'R', TRUE, 'www.teste.com');
        
    //cria variaveis de texto com repeticoes
    $txt1 = str_repeat('cell ', 40);
    $txt2 = str_repeat('multicell ', 12);

    //

    //vinte pontos de espacamento
    $pdf->Ln(20);

    //imprime usando a funcao cell
    $pdf->SetFont('Times', 'B', 14);
    $pdf->SetTextColor(100, 50, 50);
    $pdf->Cell(510, 20, $txt1, 0, 1, 'L', FALSE);

    $pdf->Ln(20);

    //imprime usando a funcao multicell
    $pdf->SetTextColor(50, 100, 50);
    $pdf->MultiCell(510, 20, $txt2, 0, 'L', FALSE);
    $pdf->Ln(10);
    $pdf->MultiCell(510, 20, $txt2, 1, 'L', FALSE);

    $pdf->Ln(20);
    $pdf->SetX(200); //altera a posicao X
    $pdf->MultiCell(340, 20, 'SetX '. $txt2, 1, 'L', FALSE);
    $pdf->Ln(20);


    $pdf->Output();

?>