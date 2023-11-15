<?php


                      
function imprimirMsjOpciones() {
    $msjOpciones ="\n\e[1;33;29m ╭-━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━-╮\n ┃                ..::OPCIONES::..                ┃   ██╗    ██╗ ██████╗ ██████╗ ██████╗ ██╗██╗  ██╗\n ┃ 1)Jugar al wordix con una palabra elegida      ┃   ██║    ██║██╔═══██╗██╔══██╗██╔══██╗██║╚██╗██╔╝ \n ┃                                                ┃   ██║ █╗ ██║██║   ██║██████╔╝██║  ██║██║ ╚███╔╝  \n ┃ 2)Jugar al wordix con una palabra aleatoria.   ┃   ██║███╗██║██║   ██║██╔══██╗██║  ██║██║ ██╔██╗\n ┃                                                ┃   ╚███╔███╔╝╚██████╔╝██║  ██║██████╔╝██║██╔╝ ██╗\n ┃ 3)Mostrar una partida.                         ┃    ╚══╝╚══╝  ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝╚═╝  ╚═╝\n ┃                                                ┃ \n ┃ 4)Mostrar la primer partida ganadora.          ┃                 ███████╗ █████╗ ██╗    ██████╗     ██████╗\n ┃                                                ┃                 ██╔════╝██╔══██╗██║    ╚════██╗   ██╔═████╗\n ┃ 5)Mostrar resumen de Jugador.                  ┃                 █████╗  ███████║██║     █████╔╝   ██║██╔██║\n ┃                                                ┃                 ██╔══╝  ██╔══██║██║    ██╔═══╝    ████╔╝██║\n ┃ 6)Mostrar listado de partidas ordenadas        ┃                 ██║     ██║  ██║██║    ███████╗██╗╚██████╔\n ┃  por jugador y por palabra.                    ┃                 ╚═╝     ╚═╝  ╚═╝╚═╝    ╚══════╝╚═╝ ╚═════╝\n ┃                                                ┃ \n ┃ 7)Agregar una palabra de 5 letras a Wordix.    ┃\n ┃                                                ┃ \n ┃ 8)salir.                                       ┃\n ┃                                                ┃ \n ╰━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╯\e\n";
    echo $msjOpciones;    
    // escribirVerde($msjOpciones);
   
}


function msjPartida($numPartida,$palabra,$jugador,$puntaje,$intentosMsj){
   $partidaMsj =  "**************************************************************\n   Partida WORDIX $numPartida: palabra $palabra        \n   Jugador: $jugador             \n   Puntaje: $puntaje puntos      \n   Intento: $intentosMsj                           \n**************************************************************";
   return $partidaMsj;
}

function msjPrimeraGanada($indicePartida,$partida){
    $numPartida =$indicePartida;
    $palabra = $partida["palabraWordix"];
    $jugador =$partida["jugador"];
    $puntaje=$partida["puntaje"];
    $intentosMsj=$partida["intentos"];
    $msj = "**************************************************************\n   Partida WORDIX $numPartida: palabra $palabra        \n   Jugador: $jugador             \n   Puntaje: $puntaje puntos      \n   Intento: $intentosMsj                           \n**************************************************************";
    return $msj;
}

function msjEstadisticasJugador($Estadisticas){
    $jugador = $Estadisticas["jugador"];
    $contadorPartidas =$Estadisticas["partidas"];
    $acumuladorPuntaje = $Estadisticas["puntaje"];
    $contadorVictorias = $Estadisticas["victorias"];
    $porcentajeVictorias = $Estadisticas["porcentajeVictorias"];
    $intento1 = $Estadisticas["intento1"];
    $intento2 = $Estadisticas["intento2"];
    $intento3 = $Estadisticas["intento3"];
    $intento4 = $Estadisticas["intento4"];
    $intento5 = $Estadisticas["intento5"];
    $intento6 = $Estadisticas["intento6"];
    $porcentajeVictorias = ($contadorVictorias * 100) / $contadorPartidas;
   $msj = "**************************************************************\n   Jugador: $jugador             \n   Partidas: $contadorPartidas       \n   Puntaje Total: $acumuladorPuntaje       \n   Vistorias: $contadorVictorias       \n   Porcentaje Victorias: $porcentajeVictorias%      \n   Adivinadas:       \n   Partidas: $contadorPartidas       \n             Intento 1: $intento1       \n             Intento 2: $intento2       \n             Intento 3: $intento3       \n             Intento 4: $intento4       \n             Intento 5: $intento5       \n             Intento 6: $intento6       \n                          \n**************************************************************";
   echo $msj;
}

function msjSinPartidasGanadas() {
    $mensaje = "******************************************\n No ganó ninguna partida. Seguí intentando! \n ******************************************" ;
    return $mensaje;
}