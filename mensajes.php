<?php
/***********************************************************************FUNCION 3*/

/**
 * Genera el menú de opciones
 * @return string $msjOpciones
 */
function imprimirMsjOpciones() 
{
    $msjOpciones ="\n\e[1;33;29m ╭-━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━-╮\n ┃                ..::OPCIONES::..                ┃   ██╗    ██╗ ██████╗ ██████╗ ██████╗ ██╗██╗  ██╗\n ┃ 1)Jugar al Wordix con una palabra elegida.     ┃   ██║    ██║██╔═══██╗██╔══██╗██╔══██╗██║╚██╗██╔╝ \n ┃                                                ┃   ██║ █╗ ██║██║   ██║██████╔╝██║  ██║██║ ╚███╔╝  \n ┃ 2)Jugar al Wordix con una palabra aleatoria.   ┃   ██║███╗██║██║   ██║██╔══██╗██║  ██║██║ ██╔██╗\n ┃                                                ┃   ╚███╔███╔╝╚██████╔╝██║  ██║██████╔╝██║██╔╝ ██╗\n ┃ 3)Mostrar una partida.                         ┃    ╚══╝╚══╝  ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝╚═╝  ╚═╝\n ┃                                                ┃ \n ┃ 4)Mostrar la primer partida ganadora.          ┃                 ███████╗ █████╗ ██╗    ██████╗     ██████╗\n ┃                                                ┃                 ██╔════╝██╔══██╗██║    ╚════██╗   ██╔═████╗\n ┃ 5)Mostrar resumen de Jugador.                  ┃                 █████╗  ███████║██║     █████╔╝   ██║██╔██║\n ┃                                                ┃                 ██╔══╝  ██╔══██║██║    ██╔═══╝    ████╔╝██║\n ┃ 6)Mostrar listado de partidas ordenadas        ┃                 ██║     ██║  ██║██║    ███████╗██╗╚██████╔\n ┃  por jugador y por palabra.                    ┃                 ╚═╝     ╚═╝  ╚═╝╚═╝    ╚══════╝╚═╝ ╚═════╝\n ┃                                                ┃ \n ┃ 7)Agregar una palabra de 5 letras a Wordix.    ┃\n ┃                                                ┃ \n ┃ 8)Salir.                                       ┃\n ┃                                                ┃ \n ╰━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╯\e\n";
    echo $msjOpciones;    
    // escribirVerde($msjOpciones);
}

/***********************************************************************FUNCION EXTRA*/

/**
 * Genera un mensaje con las estadísticas de un jugador
 * @param array $estadisticas
 * @return string $msj
 */
function msjEstadisticasJugador($estadisticas)
{
    $jugador = $estadisticas["jugador"];
    $contadorPartidas = $estadisticas["partidas"];
    $acumuladorPuntaje = $estadisticas["puntaje"];
    $contadorVictorias = $estadisticas["victorias"];
    $porcentajeVictorias = $estadisticas["porcentajeVictorias"];
    $intento1 = $estadisticas["intento1"];
    $intento2 = $estadisticas["intento2"];
    $intento3 = $estadisticas["intento3"];
    $intento4 = $estadisticas["intento4"];
    $intento5 = $estadisticas["intento5"];
    $intento6 = $estadisticas["intento6"];
    $porcentajeVictorias = ($contadorVictorias * 100) / $contadorPartidas;

    $msj = "***************************************\n   Jugador: $jugador             \n   Partidas: $contadorPartidas       \n   Puntaje Total: $acumuladorPuntaje       \n   Victorias: $contadorVictorias       \n   Porcentaje Victorias: $porcentajeVictorias%      \n   Adivinadas:\n      Intento 1: $intento1\n      Intento 2: $intento2\n      Intento 3: $intento3\n      Intento 4: $intento4\n      Intento 5: $intento5\n      Intento 6: $intento6
    \n***************************************";
    echo $msj;
}

/***********************************************************************FUNCION EXTRA*/

/**
 * Genera un mensaje para el caso que no hayan ganado ninguna partida
 * @return string $mensaje
 */
function msjSinPartidasGanadas() 
{
    $mensaje = "******************************************\n No ganó ninguna partida. Seguí intentando! \n ******************************************" ;
    return $mensaje;
}