<?php

    $dados[] = array(1, 'Maria do Rosário', 'http://www.mariadocarmo.com.br', 1200);
    $dados[] = array(2, 'Pedro Cardoso',    'http://www.pedro.com.br', 900);
    $dados[] = array(3, 'João de Barro',    'http://www.joao.com.br', 700);
    $dados[] = array(4, 'Joana Pereira',    'http://www.joana.com.br', 1900);
    $dados[] = array(5, 'Erasmo Carlos',    'http://www.erasmo.com.br', 1700);
    $dados[] = array(6, 'Maria jose Carlos','http://www.maria.com.br', 2400);

    //abre tabela

    echo '<table border=1 width=600>';

    //exibe linha com cabecalho

    echo '<tr bgcolor="#A0A0A0">';
    echo '<td> Código   </td>';
    echo '<td> Nome     </td>';
    echo '<td> Site     </td>';
    echo '<td> Salário  </td>';
    echo '</tr>';

    $i = 0;
    $total = 0;

   //percorre os dados
   
   foreach($dados as $pessoa)
   {

        //verifica qual cor de fundo irá utilizar

        $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';
        
        //imprime a linha

        echo "<tr bgcolor='$bgcolor'>";
        //exige o nome
    
        echo "<td>{$pessoa[0]}</td>";

        //exibe o nome
        echo "<td>{$pessoa[1]}</td>";

        //exibe o site
        echo "<td>{$pessoa[2]}</td>";

        //exibe o salario

        echo "<td align='right'>{$pessoa[3]}</td>";

        echo '</tr>';

        $total += $pessoa[3]; //soma salario

        $i++;



   }

   //exibe celulas vazias mescladas

   echo '<tr>';

   echo '<td colspan=3>Total</td>';

   //exibe linha com totalizador

   echo '<td align="right" bgcolor="#a0a0a0">';
   echo $total;
   echo '</td>';
   echo '</tr>';

   //finaliza tabela

   echo '</table>';
?>