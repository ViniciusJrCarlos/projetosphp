<?php

    //responsavel pela exibicao de uma linha de uma tabela

    class TTableRow extends TElement
    {

        //instancia uma nova linha

        public function __construct()
        {

            parent::__construct('tr');

        }

        //metodo add cell

        public function addCell($value)
        {

            //instancia objeto celula

            $cell = new TTableCell($value);

            //adiciona o objeto no conteudo da linha

            parent::add($cell);

            //retorna o objeto instanciado

            return $cell;

        }

    }

?>