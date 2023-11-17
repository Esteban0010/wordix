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

/* Apellido,  Nombre.   | Legajo. | Carrera. |   mail.                             | Usuario Github      */
/* Pilchuman  Esteban.  |  5052   |  TUDW    | estebanpilchuman02@gmail.com        | Esteban0010         */
/* Cid        Guadalupe |  5028   |  TUDW    | cidguada4@gmail.com                 | guadacid4           */
/* Pacheco    Leonardo  |  5050   |  TUDW    | leonardoandrespacheco1998@gmail.com | pachecoleoo         */



/*****************************************/
/*********** PROGRAMA PRINCIPAL **********/
/*****************************************/

//Declaración de variables:

// BOOLEAN $finPartida 
// STRING $nombreUsuario, $palabraElegida, $verPartida, $palabra
// INT $opcion, $indicePartida
// ARRAY $coleccionPalabras $coleccionPartidas, $partida, $estadisticas, $partidasOrdenadas


//Inicialización de variables:
$finPartida = false;
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidasPredefinidas();


//Proceso:


do {
    imprimirMsjOpciones();
    echo ("Ingrese una opcion: ");
    $opcion = solicitarNumeroEntre(1, 8);

    switch ($opcion) {

        case 1:

            $nombreUsuario = solicitarJugador();
            $palabraElegida = jugarWordixConPalabraElegida($coleccionPalabras ,$coleccionPartidas, $nombreUsuario) ;
            $partida = jugarWordix($palabraElegida, $nombreUsuario);
            $coleccionPartidas[] = $partida;

            break;
        case 2:

            $nombreUsuario = solicitarJugador();
            $partida = jugarConPalabraAleatoria($coleccionPalabras,$coleccionPartidas,$nombreUsuario);
            $coleccionPartidas[] = $partida;

            break;
        case 3:

            $indicePartida = solicitarIndicePartida($coleccionPartidas);
            $verPartida = mostrarPartida($indicePartida, $coleccionPartidas);
            echo $verPartida;
            
            break;
        case 4:

            $nombreUsuario = solicitarJugador();
            $nombreUsuario = verificarNombreUsuario($nombreUsuario, $coleccionPartidas);
            $indicePartida = IndicePrimeraPartidaGanada($coleccionPartidas, $nombreUsuario);
            $verPartida = mostrarPartida($indicePartida, $coleccionPartidas);
            echo $verPartida;

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
            $coleccionPalabras = agregarPalabra($coleccionPalabras, $palabra);
            echo "Su palabra ah sido agregada";
            break;
        case 8:
            
            $finPartida = true;
            echo "Gracias por jugar Wordix, vuelva pronto!";

            break;
        default:
            echo ("\033[91mDebe ingresar un numero de opcion valido... \033[0m");
    }
} while (!$finPartida);
