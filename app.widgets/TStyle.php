<?php

    //classe para abstracao estilo css

    class TStyle
    {
        private $name;
        private $properties;

        static private $loaded;

        /*
         metodo construtor
        @param $name
        
        */
        public function __construct($name)
        {
            //atribui o nome do estilo
            $this->name = $name;

        }
        public function __set($name, $value)
        {

            //substitui o "_", "-", no nome da propriedade
            $name = str_replace('_', '-', $name); 

        
            //armazena os valores atribuidos
            //ao array properties
            
            $this->properties[$name] = $value;

        
        }

        //metodo show 

        //exibe a tag na tela

        public function show()
        {

            //verifica se este estilo ja foi carregado
            if (!isset(self::$loaded[$this->name]))
            {

                echo "<styl type='text/css' media='screen'>\n";
                //exibe a abertura do estilo

                echo ".{$this->name}\n";
                echo "{\n";
                
                if($this->properties)
                {

                    //percorre as propriedades

                    foreach ($this->properties as $name=>$value)
                    {

                        echo "\t {$name}: {$value};\n";

                    }

                }

                echo "}\n";
                echo "</style>\n";
                
                //marca o estilo ja carregado

                self::$loaded[$this->name] = TRUE;
            }

        }

    }

?>