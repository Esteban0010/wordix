<?php


                      
function imprimirMsjOpciones() {
    $msjOpciones ="\n ╭-━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━-╮\n ┃                ..::OPCIONES::..                ┃   ██╗    ██╗ ██████╗ ██████╗ ██████╗ ██╗██╗  ██╗\n ┃ 1)Jugar al wordix con una palabra elegida      ┃   ██║    ██║██╔═══██╗██╔══██╗██╔══██╗██║╚██╗██╔╝ \n ┃                                                ┃   ██║ █╗ ██║██║   ██║██████╔╝██║  ██║██║ ╚███╔╝  \n ┃ 2)Jugar al wordix con una palabra aleatoria.   ┃   ██║███╗██║██║   ██║██╔══██╗██║  ██║██║ ██╔██╗\n ┃                                                ┃   ╚███╔███╔╝╚██████╔╝██║  ██║██████╔╝██║██╔╝ ██╗\n ┃ 3)Mostrar una partida.                         ┃    ╚══╝╚══╝  ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝╚═╝  ╚═╝\n ┃                                                ┃ \n ┃ 4)Mostrar la primer partida ganadora.          ┃                 ███████╗ █████╗ ██╗    ██████╗     ██████╗\n ┃                                                ┃                 ██╔════╝██╔══██╗██║    ╚════██╗   ██╔═████╗\n ┃ 5)Mostrar resumen de Jugador.                  ┃                 █████╗  ███████║██║     █████╔╝   ██║██╔██║\n ┃                                                ┃                 ██╔══╝  ██╔══██║██║    ██╔═══╝    ████╔╝██║\n ┃ 6)Mostrar listado de partidas ordenadas        ┃                 ██║     ██║  ██║██║    ███████╗██╗╚██████╔\n ┃  por jugador y por palabra.                    ┃                 ╚═╝     ╚═╝  ╚═╝╚═╝    ╚══════╝╚═╝ ╚═════╝\n ┃                                                ┃ \n ┃ 7)Agregar una palabra de 5 letras a Wordix.    ┃\n ┃                                                ┃ \n ┃ 8)salir.                                       ┃\n ┃                                                ┃ \n ╰━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━╯\n";
        escribirVerde($msjOpciones);
   
}


function msjPartida($numPartida,$palabra,$jugador,$puntaje,$intentosMsj){
   $partidaMsj =  "**************************************************************\n   Partida WORDIX $numPartida: palabra $palabra        \n   Jugador: $jugador             \n   Puntaje: $puntaje puntos      \n   Intento: $intentosMsj                           \n**************************************************************";
   return $partidaMsj;
}

function msjPrimeraGanada($numPartida,$palabra,$jugador,$puntaje,$intentosMsj){
    $msj = "**************************************************************\n   Partida WORDIX $numPartida: palabra $palabra        \n   Jugador: $jugador             \n   Puntaje: $puntaje puntos      \n   Intento: $intentosMsj                           \n**************************************************************";
    return $msj;
}

function msjEstadisticasJugador($jugador,$contadorPartidas,$acumuladorPuntaje,$contadorVictorias,$porcentajeVictorias,$intento1,$intento2,$intento3,$intento4,$intento5,$intento6){
   $msj = "**************************************************************\n   Jugador: $jugador             \n   Partidas: $contadorPartidas       \n   Puntaje Total: $acumuladorPuntaje       \n   Vistorias: $contadorVictorias       \n   Porcentaje Victorias: $porcentajeVictorias%      \n   Adivinadas:       \n   Partidas: $contadorPartidas       \n             Intento 1: $intento1       \n             Intento 2: $intento2       \n             Intento 3: $intento3       \n             Intento 4: $intento4       \n             Intento 5: $intento5       \n             Intento 6: $intento6       \n                          \n**************************************************************";
   return $msj;
}
