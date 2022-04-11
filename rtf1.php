<?php
//require_once 'docspdfs/app.util/rtf/lib/PHPRtfLite.php';
require __DIR__ .'/projetosrtf/vendor/autoload.php';
//inclui a classe rtf

//registra o class loader

PHPRtfLite::registerAutoloader();

//instancia a classe Rtf
$rtf = new PHPRtfLite;

//adiciona uma secao ao documento
$secao = $rtf->addSection();

//define caracteristicas de fonte
$fontTitulo = new PHPRtfLite_Font(16, 'Arial');
$fontTitulo->setBold();
$fontTitulo->setUnderline();

//escreve o titulo em arial 16 negrito, sublinhado e centralizada

$secao->writeText('Caracteristicas basicas', $fontTitulo, new PHPRtfLite_ParFormat('center'));

//cria um paragrafo vazio
$secao->emptyParagraph(new PHPRtfLite_Font(12), new PHPRtfLite_ParFormat);

//escreve texto utilizado tags html
$texto = 'Texto com formatação em <b>negrito</b>, <i>italico</i> e  <u>sublinhado</u>. ';
$secao->writeText(str_repeat($texto, 12), new PHPRtfLite_Font(12), new PHPRtfLite_ParFormat('justify'));

//acrescenta uma imagem a secao

$secao->addImage('images/corinthians.jpg', new PHPRtfLite_ParFormat('center'), 3);

//define caracteristicas de fonte
$fontLink = new PHPRtfLite_Font(10, 'Helvetica', '#0000cc');

//escreve o link

$secao->writeHyperLink('http://corinthians.com.br', 'SCCP', $fontLink, new PHPRtfLite_ParFormat('center'));

//envia rtf ao usuario
$rtf->sendRtf();
//$rtf->save('teste.rtf');

?>