<?php

    require_once ("app.widgets/TElement.class.php");

    //inicio o documento html
    $html = new TElement('html');
    //$html->add($html);
    //$html->add($html);
    //instancia seção head
    $head = new TElement('head');
    $head->add($head); //adiciona ao html

    //define o titulo da pagina
    $title = new TElement('title');
    $title->add('ola mundo');
    //$title = new TElement('</title>');
    $head->add($title); //adiciona ao head
    
   /// echo $head;
    //inicio o body do html
    $body = new TElement('body');
    $body->bgcolor = '#ffffdd';
    $html->add($body); //adiciona ao html

    $center = new TElement('center');
    $body->add($center);

    //instancia um paragrafo
    $p = new TElement('p');
    $p->align = 'left';
    $p->add('Sport Club Corinthians Paulistaaaaaaa');
    $center->add($p); //adiciona ao body

    //instancia uma imagem
    $img = new TElement('img');
    $img->src = 'images/corinthians.jpg';
    $img->width = '120px';
    $img->height = '120px';
    $center->add($img); //adiciona ao body
    //$img = new TElement('</img>');
    //instancia um separador horizontal
    $hr = new TElement('hr');
    $hr->width = '150px';
    $hr->align = 'center';
    $center->add($hr); //adiciona ao body

    //instancia um link
    $a = new TElement('a');
    $a->href = 'https://www.corinthians.com.br';
    $a->add('Visite o Site Oficial');
    $center->add($a); //aciciona ao body

    //instancia quebra de linhas
    $br = new TElement('br');
    $center->add($br);

    //instancia um botão
    $input= new TElement("<input>");
    $input->type = '<button>';
    $input->value = "clique aqui para saber...";
    $input->onclick = "alert('Clube do Povo é o Coringão!')";
    $center->add($input); //adiciona ao body
    
    //exibe o html com todos elementos - filho
    $html->show();

   // var_dump($html);
   // var_dump($a);


?>