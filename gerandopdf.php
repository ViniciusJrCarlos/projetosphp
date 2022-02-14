<?php

    //inclui classes necessarias

    include_once 'app.widgets/TElement.class.php';
    include_once 'app.widgets/TTable.class.php';
    include_once 'app.widgets/TTableCell.class.php';
    include_once 'app.widgets/TTableRow.class.php';

    $dados[] =  array(1, 'Maria do Rosario', 'https://www.maria.com.br', 1200);
    $dados[] =  array(2, 'Joao Pedro ', 'https://www.joao.com.br', 800);
    $dados[] =  array(3, 'Joao de Barros', 'https://www.joaobarros.com.br', 1500);
    $dados[] =  array(4, 'Joana Pereira', 'https://www.joana.com.br', 1800);
    $dados[] =  array(5, 'Eramos Carlos', 'https://www.erasmo.com.br', 2100);

    //instancia objeto tabela

    $tabela = new TTable;

    //define alguma propriedades 

    $tabela->width = 600;
    $tabela->border = 1;

    //instancia uma linha para o cabecalho
    $cabecalho = $tabela->addRow();

    //define a cor de fundo

    $cabecalho->bgcolor = '#a0a0a0';

    //adiciona celulas

    $cabecalho->addCell('Codigo');
    $cabecalho->addCell('Nome');
    $cabecalho->addCell('Site');
    $cabecalho->addCell('Salario');

    $i = 0;
    $total = 0;

    //pecorre os dados

    foreach($dados as $pessoa)
    {

        //verifica qual cor utilizará para o fundo

        $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';

        //aciona uma linha para os dados

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

    //instancia uma linha para o totalizador

    $linha = $tabela->addRow();

    //adiciona celulas
    $celula = $linha->addCell('Total');
    $celula->colspan = 3;

    $celula = $linha->addCell($total);
    $celula->bgcolor = "#a0a0a0";
    $celula->align = "right";

    //exibe tabela

    $tabela->show();

?>