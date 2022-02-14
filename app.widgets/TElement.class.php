<?php

    // classe abstração de tags html

    class TElement
    {

        //  private $_tags = ['doctype', 'br', 'hr', 'input', 'meta', 'base', 'basefont', 'img', 'source'];
        // = ['html', 'head', 'title', 'body', 'center', 'p', 'img', 'hr', 'a', 'br', 'input', 'button']
        private $name; 
        //nome da tag
        private $properties;
        // propriedades da tag 
        private $children; 
        // conteudo da tag

        public function __construct($name)
        {

            //define o nome do elemento

            $this->name = $name;

        }

        //metodo set 
        public function __set($name, $value)
        {

            //armazena os valores atribuidos

            //ao array proprierties

            $this->properties[$name] = $value;

        }
        
        //metodo add

        public function add($child)
        {   

            $this->children[] = $child;

        }

        //metodo open

        public function open()
        {
            //exibe a tag abertura

            echo "<{$this->name}";

            if ($this->properties)
            {

                //pecorre as propriedades

                foreach ($this->properties as $name=>$value)
                {

                    echo "{$name}=\"{$value}\"";

                }
            }

            echo '>';
        }

        //metodo show()

        public function show()
        {   
            //abre a tag
            $this->open();

            echo "\n";

            //se possui conteudo

            if ($this->children)
            {

                //percorre todos objetos filhos
                foreach ($this->children as $child)
                {

                    //se for objeto

                    if (is_object($child))
                    {

                        $child->show();

                    }else if ((is_string($child)) or (is_numeric($child)))
                    {

                        //se for texto
                        echo $child;

                    }

                }

                //fecha a tag

                $this->close();

            }

        }

        //método close

        private function close()
        {

            echo "</{$this->name}>\n";

        }

    }


?>