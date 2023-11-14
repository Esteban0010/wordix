<?php

/*********** ARCHIVOS UTILIZADOS *******/
include_once("wordix.php");
include_once("datosPredefinidos.php");
include_once("mensajes.php");
include_once("funcionesComplementarias.php");
include_once("esteban.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido,  Nombre.   | Legajo. | Carrera. |   mail.                       |   Usuario Github     */
/* Pilchuman  Esteban.  |  5052   |  TUDW    | estebanpilchuman02@gmail.com  |   Esteban0010        */
/* Cid        Guadalupe |  5028   |  TUDW    | cidguada4@gmail.com           |   guadacid4          */
/* Pacheco    Leonardo  |         |  TUDW    |                               |   pachecoleoo        */
/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
//boolean $finPartida, 
//int 
//float 

//Inicialización de variables:
$finPartida = false;

//Proceso:
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidasPredefinidas();




do {
    imprimirMsjOpciones();
    echo ("Ingrese una opcion: ");
    $opcion = solicitarNumeroEntre(1, 8);


    switch ($opcion) {

        case 1:
            $palabraUsada = false;

            //$nombreUsuario=solicitarUsuario();

            // echo ("Bienvenido, ingrese su nombre: ");
            // $nombreUsuario = trim(fgets(STDIN));
            // $nonombreMinuscula($) ;


            $cantPalabrasWordix = count($coleccionPalabras);
            $cantPartidas = count($coleccionPartidas);
            echo "Ingrese el número de la palabra con la que desea jugar: ";
            do {
                $numero = solicitarNumeroEntre(1, $cantPalabrasWordix);
                $indiceElegido = $numero - 1;
                $palabraElegida = $coleccionPalabras[$indiceElegido];
                $palabraUsada = verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indiceElegido);
                if ($palabraUsada) {
                    echo "Debe ingresar un numero de palabra que no hayas utilizadao: ";
                }
            } while ($palabraUsada);

            $partida = jugarWordix($palabraElegida, $nombreUsuario);
            $coleccionPartidas[]= $partida;
            break;

        case 2:
            echo "Ingrese por favor su nombre:";
            $nombreUsuario = trim(fgets(STDIN));
            $partida = jugarConPalabraAleatoria($coleccionPalabras,$coleccionPartidas,$nombreUsuario);
            $coleccionPartidas[] = $partida;
            break;

        case 3:

            echo "Ingrese el número de partida que desea ver: ";
            $numPartida = trim(fgets(STDIN));
            $numPartida = $numPartida - 1; //convierte el numero en indice del array
            mostrarPartida($numPartida, $coleccionPartidas);
            break;

        case 4:
            break;

        case 5:
             $estadisticas = estadisticasJugador($coleccionPartidas);
            msjEstadisticasJugador($estadisticas);
            break;

        case 6:
            $partidasOrdenadas = ordenaalfabeticamentePalabra($coleccionPartidas);
            print_r($partidasOrdenadas);
            break;

        case 7:
            $palabra = leerPalabra5Letras();
            $coleccionPalabras = agregarPalabra($coleccionPalabras,$palabra);
            break;

        case 8:
            $finPartida = true;
            break;

        default:
            echo ("\033[91mDebe ingresar un numero de opcion valido... \033[0m");
    }
} while (!$finPartida);
