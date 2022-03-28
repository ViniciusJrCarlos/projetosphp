<?php

    include_once 'app.widgets/TElement.class.php';
    include_once 'app.widgets/TStyle.php';

    $style = new TStyle('estilo_texto');

    $style->color = '#FF0000';
    $style->font_family = 'verdana';
    $style->font_size = '20pt';
    $style->font_weight = 'bold';
    $style->show();

    //instancia um paragrafo

    $texto = new TElement('p');
    $texto->align = 'center';
    $texto->add('Sport clube Corinthians');

    $texto->class = 'estilo_texto';
    $texto->show();

    

?>