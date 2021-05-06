<?php
    /* 
        INGENIERÍA WEB
        @author: Carlos Castillo
        @theme: Realizar 10 ejemplos con PHP (Implementación de arrays, matrices, funciones, bucles y operadores)
    */

    /* 
        Ejemplo 1: Encontrar el numero mayor y menor de un array de numeros generados aleatoriamente y que no se encuentren repetidos
    */
    setStructure();
    setHeader("Ejemplo 1: Encontrar el numero mayor y menor de un array de numeros generados aleatoriamente y que no se encuentren repetidos");
    
    function getRandomNumbers($numbers_total, $min_value = 1, $max_value = 1000){
        $numbers_array = array();
        $count_numbers = 0;
        
        while (sizeof($numbers_array) != $numbers_total){
            $random_value = mt_rand($min_value, $max_value); // Generar valores aleatorios
            if (!in_array($random_value, $numbers_array)){
                $numbers_array[$count_numbers] = $random_value;
                ++$count_numbers;
            }
        }
        
        return $numbers_array;
    }

    
    $numbers = getRandomNumbers(10, 1, 200);
    $min_value = min($numbers);
    $max_value = max($numbers); 
    printArray($numbers, ",", "Array");
    echo "<br/>"."El valor mínimo es: ".$min_value;
    echo "<br/>"."El valor máximo es: ".$max_value."<br/><hr style = 'margin: 30px 0 50px 0;'>";

    /* ============================================================================================================================================= */
    /* 
        Ejemplo 2: Buscar todos los números pares de una matriz generados aleatoriamente  y actualizar su valor con el cuadrado de cada número
    */
    setHeader("Ejemplo 2: Buscar todos los números pares de una matriz generados aleatoriamente  y actualizar su valor con el cuadrado de cada número");
    $numbers = getRandomNumbers(5, 1, 9);
    sort($numbers);
    function searchOddNumbers($numbers_array){
        $result_array = [];
        for($position = 0; $position < sizeof($numbers_array); $position++){
            $new_value = $numbers_array[$position];
            if (($numbers_array[$position] % 2) == 0){
                $new_value = $numbers_array[$position] * $numbers_array[$position];
            }
            $result_array[$position] = $new_value;
        }
        return $result_array;
    }
 
    printArray($numbers, ",", "Matriz original");
    
    $result_array = searchOddNumbers($numbers);
    printArray($result_array, ",", "Matriz resultante");
    echo "<hr style = 'margin: 30px 0 50px 0;'>";
    
    /* ============================================================================================================================================= */
    /* 
        Ejemplo 3: Obtener el factorial de un numero aleatorio.
    */
    setHeader("Ejemplo 3: Obtener el factorial de un numero aleatorio.");
    $number = mt_rand(1, 10);
    
    function getFactorial($num){
        if ($num == 0){
            return 1;
        }
        else{
            return $num * getFactorial($num - 1);
        } 
    }

    $factorial = getFactorial($number);
    echo "El factorial de <b>".$number."</b> es: <b>".$factorial."</b><br/><hr style = 'margin: 30px 0 50px 0;'>";

    /* ============================================================================================================================================= */
    /* 
        Ejemplo 4: Crear una función que reciba un texto y lo escriba separando cada letra con un espacio. Las letras impares (primera, tercera, etc.) deben estar en negrita, y las pares en cursiva.
    */
    setHeader("Ejemplo 4: Crear una función que reciba un texto y lo escriba separando cada letra con un espacio. Las letras impares (primera, tercera, etc.) deben estar en negrita, y las pares en cursiva.");
    
    define("TEXT", "Lorem ipsum dolor sit amet consectetur adipisicing elit.");    define("PI", 3.14); // DEfinir una constante
    echo "Texto original: <em>".TEXT."</em><br/>";
    echo "Texto modificado: ";
    function showText(){
        for($position = 0; $position <= strlen(TEXT); $position++){
            if (TEXT[$position] == " "){
                echo "&nbsp;&nbsp;&nbsp;";
            }else if(($position % 2) == 0){
                echo "<em>".TEXT[$position]."</em>  ";
            } 
            else {
                echo "<b>".TEXT[$position]."</b>  ";
            }
        }
    }

    showText();
    echo "<hr style = 'margin: 30px 0 50px 0;'>";

    /* ============================================================================================================================================= */
    /* 
        Ejemplo 5: De un listado de estudiantes con sus notas de 3 materias, calcular el promedio y ordenar el listado de mayor a menor según su promedio.
    */
    setHeader("Ejemplo 5: De un listado de estudiantes con sus notas de 3 materias, calcular el promedio y ordenar el listado de mayor a menor según su promedio.");
    $classroom = array(
        array(
            "name" => "Jaime Quirola",
            "rantings" => [8, 7, 10],
            "average" => NULL
        ),
        array(
            "name" =>"Maria Ortega",
            "rantings" => [10, 8, 9],
            "average" => NULL
        ),
        array(
            "name" =>"Tomás Eguiguren",
            "rantings" => [6, 10, 10],
            "average" => NULL
        )
    );
      
    function sortStudentList($classroom){
        $student_list = setAverage($classroom);
        for($position = 0; $position < sizeof($student_list); $position++){
            if ($position != sizeof($student_list) -1){
                $initial_value = 0;
                while ($initial_value < sizeof($student_list)){
                    $current_average = $student_list[$initial_value]["average"];
                    $next_average = $student_list[$initial_value + 1]["average"];
                    if($current_average < $next_average){
                        $aux_current_student = $student_list[$initial_value];
                        $student_list[$initial_value] = $student_list[$initial_value + 1];
                        $student_list[$initial_value + 1] = $aux_current_student;
                    }
                    ++$initial_value;
                }
            } 
        }
        return $student_list;
    }
    
    function setAverage($classroom){
        $classrom_average = array();
        foreach($classroom AS $student){
            $average = array_sum($student["rantings"]) / count($student["rantings"]);
            $student["average"] = round($average, 2);
            array_push($classrom_average, $student); 
        }
        return $classrom_average;
    }

    $student_list = sortStudentList($classroom);
    echo "Listado de estudiantes y su promedio:"."<br/><ul>";
    foreach($student_list AS $student){
        echo "<li>".$student["name"].": ".$student["average"]."</li>";
    }
    echo "</ul><hr style = 'margin: 30px 0 50px 0;'>";
    
    /* ============================================================================================================================================= */
    /* 
        Ejemplo 6: De un listado de numeros aleatorios, indicar la cantidad de numeros que son pares e impares.
    */
    setHeader("Ejemplo 6: De un listado de numeros aleatorios, indicar la cantidad de numeros que son pares e impares.");
    $numbers_list = getRandomNumbers(25);
    sort($numbers_list);
    printArray($numbers_list, ",", "Listado");
    function getOddEvenNumbers($numbers_list){
        $even_numbers = 0;
        $odd_numbers = 0;
        foreach($numbers_list AS $number){
            if (($number % 2) == 0){
                ++$even_numbers;
            }else{
                ++$odd_numbers;
            }
        }
        echo "<br><br>Total de números pares: ".$even_numbers."<br/>";
        echo "Total de números impares: ".$odd_numbers."<br/>";
    }

    getOddEvenNumbers($numbers_list);
    echo "<hr style = 'margin: 30px 0 50px 0;'>";

    /* ==================================== */
    /* 
        Ejemplo 7: Obtener los N números de la serie de Fibonacci.
    */
    setHeader("Ejemplo 7: Obtener los N números de la serie de Fibonacci.");
    $fibonacci = [];

    function getFibonnaci($number_elements){
        $fibonacci_series = [];
        for($position = 0; $position < $number_elements; $position++){
            if($position <= 1){
                $fibonacci_series[$position] = 1;
            }else{
                $fibonacci_series[$position] = $fibonacci_series[$position - 1] + $fibonacci_series[$position - 2];
            }
        }
        return $fibonacci_series;
    }
    
    $number_elements = 10;
    $fibonacci = getFibonnaci($number_elements);
    echo "Los <b>".$number_elements."</b> primeros elementos de la serie fibonacci son: ";
    for($position = 0; $position < sizeof($fibonacci); $position++){
        echo $fibonacci[$position];
        if ($position != sizeof($fibonacci) -1){
            echo " - ";
        }
    }
    echo "<hr style = 'margin: 30px 0 50px 0;'>";

    /* ============================================================================================================================================= */
    /* 
        Ejemplo 8: Escriba un programa que presente todos los divisores de un número N.
    */
    setHeader("Ejemplo 8: Escriba un programa que presente todos los divisores de un número N.");
    define("NUMBER", 200);

    function getDividers(){
        $dividir = 1;
        do{
            if ((NUMBER % $dividir) == 0){
                echo $dividir;
                if (NUMBER != $dividir){
                    echo " - ";
                }
            }
            ++$dividir;
        }while($dividir <= NUMBER);
    }
    echo "Los divisores de <b> ".NUMBER."</b> son: ";
    getDividers();
    echo "<hr style = 'margin: 30px 0 50px 0;'>";

    /* ==================================== */
    /* 
        Ejemplo 9: Escribir un programa que dadod un N día de la semana, presente a que día corresponde.
    */
    setHeader("Ejemplo 9: Escribir un programa que dadod un N día de la semana, presente a que día corresponde.");
    $number_day = 4;

    function getNameDay($number_day){
        switch($number_day){
            case 1: 
                return "Lunes";
                break;
            case 2: 
                return "Martes";
                break;
            case 3: 
                return "Miércoles";
                break;
            case 4: 
                return "Jueves";
                break;
            case 5: 
                return "Viernes";
                break;
            case 6: 
                return "Sábado";
                break;
            case 7: 
                return "Domingo";
                break;
            default:
                return "Día inválido";
        }
    }

    echo "El número de día <b>".$number_day."</b> corresponde a: <em><b>".getNameDay($number_day)."</b></em><br/><hr style = 'margin: 30px 0 50px 0;'>";
    
    /* ============================================================================================================================================= */
    /* 
        Ejemplo 10: Escribir un programa que dados dos numeros enteros, escriba la suma de todos los números enteros desde el primer número hasta el segundo.
    */
    setHeader("Ejemplo 10: Escribir un programa que dados dos numeros enteros, escriba la suma de todos los números enteros desde el primer número hasta el segundo.");
    $first_number = 12;
    $second_number = 15;
    $array_number = getMinMax($first_number, $second_number);
    
    function getMinMax($first_number, $second_number){
        $array_number = [$first_number, $second_number];
        sort($array_number);
        return $array_number;
    }

    function showSum($min_number, $max_number){
        $total_sum = 0;
        $sum_details = " ";
        for($number = $min_number; $number <= $max_number; $number++){
            $total_sum += $number;
            $sum_details.= $number;
            if ($max_value != 13){
                $sum_details.= " + ";
            }
        }
        $sum_details[-2] = " ";
        $sum_details.= " = ".$total_sum;
        echo $total_sum."<br/>";
        echo "Detalle: <em>".$sum_details."</em><br/><hr>";
    }

    echo "La suma entre <b>".$array_number[0]."</b> y <b>".$array_number[1]."</b> es: ";
    showSum($array_number[0], $array_number[1]);
    echo "</div>";

    /* ============================================================================================================================================= */
    /* GENERAL FUNCTIONS */

    function setHeader($header){
        echo '<h3 style = "text-align: justify;"><em>'.$header.'</em></h3><br/>';
    }

    function printArray($array, $delimiter, $title){
        echo $title.": (";  
        for($position = 0; $position < sizeof($array); $position++){
            echo $array[$position];
            if ($position != sizeof($array) -1){
                echo " ".$delimiter." ";
            }
        }
        echo ")<br/>";
    }

    function setStructure(){
        echo '<div style = "margin: 20px 200px 50px 200px;">';
    }
?>