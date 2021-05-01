<?php
    // phpinfo();
    /* Comentarios de mas de 
    una linea*/
    

    // VARIABLES
    $a = "Hola";
    $b = 5;
    $c = 5.2;
    echo "Variables"."<br/>.<br/>";
    
    echo $a."<br/>";
    echo $b."<br/>";
    echo $c."<br/>";

    $uno = 1;
    $Uno = 2;
    $UNO = 3;

    // VARIABLES LOCALES
    $integer = 5;
    $float = 5.4;
    $boleana = false;
    $array = array("Lunes", "Martes");
    $string = "Hola";

    // VARIABLES GLOBALES

    echo "<br/> "."FUNCIÓN"."<br/>";
    function ejemploVariable($i){
        $local = $i + 2;
        echo $local."<br/>";
        echo $GLOBALS["global"]."<br/>";
        
    }
    $global = "Variable Global";
    ejemploVariable(5);

    // Constantes
    const CONS = "Soy una constante";
    const NUMS = 5;

    echo $CONS."<br/>";
    echo $NUMS."<br/>"; 

    define ("CONS2", "Soy la constante 2");
    echo $CONS2."<br/>";

    // Conversión de tipos
    echo "<br/> "."Tipos de datos"."<br/>";

    $var = "10 hola";
    $suma = 10 + $var;

    echo gettype($suma)."<br/>";
    $int = (int)$var;

    echo gettype($var)."<br/>";
    echo gettype($int)."<br/>";
    
    echo "Var:".$var."<br/>";
    echo "Int:".$int."<br/>";

    // Concatenación

    $palabra = "Ingeniería";
    $concatenar = $palabra." Web";
    echo $concatenar."<br/>";

    // Operadores de comparación
    
    // Igual
    $num1 = 3;
    $num2 = 3;
    
    // Igualdad ==
    var_dump($num1 < $num2);
    var_dump($num1 !== $num2);  

    // Operadores artiméticos

    $num3 = 2;
    $num4 = 2;

    $result = $num3 * $num4;

    echo "<br/>".$result."<br/>";

    $a = 2;
    $b = 3;

    echo $a*=$b."<br/>";

    echo "<br/>".++$a."<br/>";

    // If
    $a = 5;
    $b = 6;

    if($a > $b)
        echo "<br/>"."Hola"."<br/>";
    else
        echo "<br/>"."Chao"."<br/>";

    $d = 1;

    switch ($d){
        case 1:
            echo "<br/>"."Uno"."<br/>";
            break;
        case 2:
            echo "<br/>"."Dos"."<br/>";
            break;
    }
    
    $c = 1;

    echo "<br/>"."While"."<br/>";
    while ($c <= 2){
        echo "<br/>".$c."<br/>";
        ++$c;
    }

    $c = 1;
       
    echo "<br/>"."Do While"."<br/>";
    do {
        echo "<br/>".$c."<br/>";
        ++$c;
    }while($c < 2);

    echo "<br/>"."FOR"."<br/>";
    for($i=1; $i<=5; $i++) {
        echo "<br/>".$i."<br/>";
    }

    echo "<br/>"."FOR EACH"."<br/>";

    $array = array("uno", 2, 3);
    foreach($array AS $valor){
        echo "<br/>".$valor."<br/>";
    }
?>