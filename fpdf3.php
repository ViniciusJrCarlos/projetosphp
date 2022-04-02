<?php
//setlocale(LC_ALL, 'pt_BR.utf8', 'portuguese' );
//setlocale(LC_ALL, 'pt_BR.iso-8859-1', 'portuguese');
//meta http-equiv="content-type" content="text/html;charset=utf-8";
//header('Content-type: text/html; charset=UTF-8', true);
//header('Content-type: text/html; charset=iso-8859-1', true);
//header("Content-Type: text/html; CharSet=Windows-1252", true);
//$str = iconv('UTF-8', 'windows-1252', html_entity_decode($str));

//https://acko.net/blog/ufpdf-unicode-utf-8-extension-for-fpdf/
//matriz de titulos com as larguras e colulas

$titulos = array('Posição', 'País', 'Nome', 'Pontuação');
$larguras = array( 50, 160, 200, 70 );

//cria a matriz com os dados da tabela

$dados = array();
$dados[] = array (1,  'Brazil',         'Ayrton senna',     90);
$dados[] = array (2,  'France',         'Gerald berger',    87);
$dados[] = array (3,  'Austria',        'Thierry henry ',   90);
$dados[] = array (4,  'Belgin',         'Lukako',           100);
$dados[] = array (5,  'Italy',          'Paolo Maldini',    120);
$dados[] = array (6,  'United States',  'Henry Douglas',    110);
$dados[] = array (7,  'Brazil',         'Lucas Henrique',   40);
$dados[] = array (8,  'Japan',          'Satoku Nakajima',  45);
$dados[] = array (9,  'Mexico',         'Carlos Maldini',   34);
$dados[] = array (10, 'Brazil',         'Ronaldo Fenomeno', 140);
$dados[] = array (11, 'Russian',        'kirkman Ronald',    80);

//inclui a classe fpdf
require_once 'docspdfs/app.util/fpdf/fpdf.php';

//instancia a classe fpdf
$pdf = new FPDF('P', 'pt', 'A4');

//add uma pagina
$pdf->AddPage();

//define a fonte

$pdf->SetFont('Arial', 'B', 12);

//define cor do preenchimento do texto e espessura da linha

$pdf->SetFillColor(130, 80, 70);
$pdf->SetTextColor(255);
$pdf->SetLineWidth(1);

//criar o cabecalho da tabela
$i = 0;
foreach($titulos as $titulo)
{

    $pdf->Cell($larguras[$i], 20, $titulo, 1, 0, 'C', true);
    $i++;
}
//quebra de linha
$pdf->Ln();

//define cor de fundo, do texto e fonte dos dados
$pdf->SetFillColor(200, 200, 200);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial', '', 12);

//adiciona linhas com os dados
$colore = FALSE;
$total = 0;

foreach($dados as $linha)
{

    $col = 0;
    foreach($linha as $coluna)
    {

        //se inteiro, alinha a direita

        if(is_int($coluna))
        {

            $pdf->Cell($larguras[$col], 14, number_format($coluna), 'LR', 0, 'R', $colore);

        }
        //caso contrario, alinha a esquerda
        else
        {

            $pdf->Cell($larguras[$col], 14, $coluna, 'LR', 0, 'L', $colore);

        }
        $col ++;
    }   
    //acumula total de valor
    $total += $linha[3];
    //quebra de linha
    $pdf->Ln();
    $colore =!$colore; //inverte a cor de fundo

}
//define a fonte dos totais
$pdf->SetFont('Arial', 'B', 12);

//calcula larguras das celulas

$largura1 = array_sum($larguras)-$larguras[count($larguras)-1];
$largura2 = array_sum($larguras)-$largura1;

//exibe a linha de total
$pdf->Cell($largura1, 20, 'Total', 1, 0, 'L', true);
$pdf->Cell($largura2, 20, $total, 1, 0, 'R', true);

//exibe o resultado no navegador

$pdf->Output();

?>