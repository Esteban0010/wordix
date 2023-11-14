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

//  BOO
//  STRING
//  FLOAT 


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

            $palabraElegida=jugarWordixConPalabraElegida($coleccionPalabras ,$coleccionPartidas) ;
            $partida = jugarWordix($palabraElegida, $nombreUsuario);
            $coleccionPartidas[]= $partida;

            break;
        case 2:

            echo "Ingrese por favor su nombre:";
            $nombreUsuario =solicitarJugador();
            $partida = jugarConPalabraAleatoria($coleccionPalabras,$coleccionPartidas,$nombreUsuario);
            $coleccionPartidas[] = $partida;

            break;
        case 3:

            echo "Ingrese el número de partida que desea ver: " ;
            $numPartida = trim(fgets(STDIN)) ;
            $numPartida = $numPartida - 1 ;  //convierte el numero en un indice del array $coleccionPartidas 
            mostrarPartida($numPartida, $coleccionPartidas) ;
            
            break;
        case 4:

            $nombreUsuario = solicitarJugador() ;
            $indicePartida = primeraPartidaGanada($coleccionPartidas, $nombreUsuario) ;
            $verPrimerPartidaGanada = $coleccionPalabras[$indicePartida] ;
            echo ($verPrimerPartidaGanada) ;

            break;

        case 5:

            $nombreUsuario =solicitarJugador();
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

            break;
        case 8:

            $finPartida = true;
            
            break;
        default:
            echo ("\033[91mDebe ingresar un numero de opcion valido... \033[0m");
    }
} while (!$finPartida);
