<?php

    //responsavel pela exibição das tabelas

    class TTable extends TElement 
    {

        //instancia uma nova tabela

        public function __construct()
        {

            parent::__construct('table');

        }

        // compoe um novo objeto linha ttablerow

        public function addRow()
        {

            //instancia objeto linha

            $row = new TTableRow;

            //armazena o objeto no conteudo do element table

            parent::add($row);

            return $row;
        }
    }

?>