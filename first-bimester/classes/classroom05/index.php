<?php
    /*Clase*/
    class miClase {
        public $atributoUno;
        public $atributoDos;
        private $correoElectronico = "cacastillo19@utpl.edu.ec";
        public static $uno = "Atributo estatico";
        const CONSTANTE = 3.1415;

        public function miMetodo1(){
            echo "Probando los metodos";
        }

        public function miMetodo2($parametroUno, $parametroDos){
            echo "Su nombre es ".$parametroUno." y su Universidad es ".$parametroDos."<br>";
        }

        public function miMetodo3(){
            echo $this->correoElectronico;
        }
    }

    //INSTANCIAR
    $miObjetoUno = new miClase();

    //Insertar datos
    $miObjetoUno->atributoUno = "Carlos Andréss";
    $miObjetoUno->atributoDos = "UTPL";

    //Llamar los datos
    echo $miObjetoUno->atributoUno."<br>";
    echo $miObjetoUno->atributoDos."<br>"; 
    echo $miObjetoUno->miMetodo1()."<br>";
    echo $miObjetoUno->miMetodo2("Juanes","UTE")."<br>";  
    echo $miObjetoUno->miMetodo3()."<br>";
    //Static variable
    echo miClase::$uno."<br>";
    echo miClase::CONSTANTE."<br>";
    
    class miClaseDos {
        public function __construct($pam1, $pam2){
            $this->uno = $pam1;
            $this->dos = $pam2;
        }

        public function MiMetodo(){
            echo $this->uno.'<br>';
            echo $this->dos."<br>";
        }

        public function __destruct (){
            echo "destructor"."<br>";
        }

    }

    class miHerencia extends miClaseDos {
        public function metodoHerencia (){
            echo $this->dos."<br>";
        }
    }

    $miObjeto = new miClaseDos("Carlos", "Andres");

    $miObjeto->MiMetodo();

    $miObjeto2 = new miHerencia("Castillo", "Giron");

    $miObjeto2->metodoHerencia();
?>