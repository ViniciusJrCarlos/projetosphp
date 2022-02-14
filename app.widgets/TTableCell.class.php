<?php

    //responsavel pela exibicao de uma celula de uma celula

    class TTableCell extends TElement
    {

        //metodo construtor

        public function __construct($value)
        {

            parent::__construct('td');
            parent::add($value);

        }

    }

?>