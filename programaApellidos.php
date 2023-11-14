<?php

/*********** ARCHIVOS UTILIZADOS *******/
include_once("wordix.php");
include_once("datosPredefinidos.php");
include_once("mensajes.php");
include_once("funcionesComplementarias.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido,  Nombre.   | Legajo. | Carrera. |   mail.                       |   Usuario Github     */
/* Pilchuman  Esteban.  |  5052   |  TUDW    | estebanpilchuman02@gmail.com  |   Esteban0010        */
/* Cid        Guadalupe |         |  TUDW    |                               |   guadacid4          */
/* Pacheco    Leonardo  |         |  TUDW    |                               |   pachecoleoo        */
/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
$finPartida = false;

//Inicialización de variables:


//Proceso:
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidasPredefinidas();




do {
    imprimirMsjOpciones();
    echo("Ingrese una opcion: ");
    $opcion = solicitarNumeroEntre(1, 8);

    
    switch ($opcion) {
        case 1: 
            $palabraUsada = false;
            echo ("Bienvenido, ingrese su nombre: ");
            $nombreUsuario = trim(fgets(STDIN));
            $cantPalabrasWordix=count($coleccionPalabras);
            $cantPartidas = count($coleccionPartidas);
            echo "Ingrese el número de la palabra con la que desea jugar: ";
            do {
            $numero=solicitarNumeroEntre(1, $cantPalabrasWordix) ;
            $indiceElegido=$numero-1 ;
            $palabraElegida=$coleccionPalabras[$indiceElegido];
            $palabraUsada= verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indiceElegido);
            if($palabraUsada){
                echo "Debe ingresar un numero de palabra que no hayas utilizadao: ";
            }
            } while ($palabraUsada);
            
            $partida = jugarWordix($palabraElegida, $nombreUsuario) ;
            $coleccionPartidas=array($partida) ;
            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
            case 3: 
                $partidaBuscada =buscarPartida($coleccionPartidas);
                echo($partidaBuscada);
                break;
            case 4: 
               
                 break;
            case 5: 
              
                break;
            case 6: 
                $partidasOrdenadas = ordenaalfabeticamentePalabra($coleccionPartidas);
                print_r($partidasOrdenadas);
                break;
            case 7: 
                $palabra = leerPalabra5Letras();
                $coleccionPalabras[] = $palabra;
                echo ("Su palabra ah sido agregada");
                break;
            case 8: 
                $finPartida=true;
                break;
            default:
            echo ("\033[91mDebe ingresar un numero de opcion valido... \033[0m");
        
    }
} while (!$finPartida);
