<?php

//funcao autoload
spl_autoload_register(

    function($classe){

        if(file_exists("app.ado/{$classe}.class.php"))    
        {
    
            include_once("app.ado/{$classe}.class.php");
    
        }

    }

);

/*
function __autoload($classe)
{

    if(file_exists("app.ado/{$classe}.class.php"))    
    {

        require_once "app.ado/{$classe}.class.php";

    }


}

*/

$sql = "SELECT id, nome FROM db_cadastro_pessoa WHERE id=40";

try
{

    //abre conexao com a base mysql

    $conn = TConnection::open('my_livro');

    //executa a nstrucao sql

    $result = $conn->query($sql);

    if ($result)
    {
        
        $row = $result->fetch(PDO::FETCH_ASSOC);

        //exibe os dados resultantes

        echo $row['id'] . ' - ' . $row['nome'] . "\n";



    }
    //fecha conexao
    $conn = null;


}
catch (Exception $e)
{

    //exibe a mensagem de erro

    print "Erro!: " . $e->getMessage() . "<br/>";
}


?>