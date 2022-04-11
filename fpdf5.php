<?php

require_once 'docspdfs/app.util/fpdf/fpdf.php';

class Documento1 extends FPDF
{

    //define o metodo para imprimir o cabecalho

    function Header()
    {

        $this->Image('images/corinthians.jpg', 20, 10);
        $this->Ln(70);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(520, 20, 'Sport Clube Corinthians Paulista', 1, 0, 'C');
        $this->Ln(40);
    }

    //define o metodo para imprimir o rodapé
    function Footer(){ 
    
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0,10, 'Pagina '.$this->PageNo(). '/{nb}',0,0,'C');

    }

}

$pdf = new Documento1('P', 'pt', 'A4');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->Write(20, str_repeat('timão', 1200));
$pdf->Output();

?>