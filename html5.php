<?php

    //inclui as classes necessarias

    include_once 'app.widgets/TElement.class.php';
    include_once 'app.widgets/TTable.class.php';
    include_once 'app.widgets/TTableRow.class.php';
    include_once 'app.widgets/TTableCell.class.php';

    //constroi a matriz de dados

    $dados[] = array(1, 'Maria do Rosário', 'http://www.mariadocarmo.com.br', 1200);
    $dados[] = array(2, 'Pedro Cardoso',    'http://www.pedro.com.br', 900);
    $dados[] = array(3, 'João de Barro',    'http://www.joao.com.br', 700);
    $dados[] = array(4, 'Joana Pereira',    'http://www.joana.com.br', 1900);
    $dados[] = array(5, 'Erasmo Carlos',    'http://www.erasmo.com.br', 1700);
    $dados[] = array(6, 'Maria jose Carlos','http://www.maria.com.br', 2400);

    $tabela = new TTable;
    
    //define algumas propriedaddes

    $tabela->width = 600;
    $tabela->border = 1;

    //instancia uma linha para cabecalho

    $cabecalho = $tabela->addRow();
    //define a cor de fundo

    $cabecalho->bgcolor = '#a0a0a0a';

    $cabecalho->addCell('Código');
    $cabecalho->addCell('Nome');
    $cabecalho->addCell('Site');
    $cabecalho->addCell('Salario');

    $i = 0;
    $total = 0;

    foreach($dados as $pessoa)
    {

        //verifica qual cor de fundo

        $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';

        //add linha para os dados

        $linha = $tabela->addRow();
        $linha->bgcolor = $bgcolor;

        //adiciona as celulas

        $linha->addCell($pessoa[0]);
        $linha->addCell($pessoa[1]);
        $linha->addCell($pessoa[2]);

        $x = $linha->addCell($pessoa[3]);

        $x->align = 'right';

        $total +=$pessoa[3];

        $i++;




    }

    //instancia a linha totalizador
    $linha = $tabela->addRow();
    
    //adiciona celulas
    $celula = $linha->addCell('Total');
    $celula->colspan = 3;
    
    $celula = $linha->addCell($total);
    $celula->bgcolor = "#a0a0a0";
    $celula->align = "right";

    //exibe tabela
    $tabela->show();
   //echo $tabela;


?>
