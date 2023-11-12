<?php
/******************************************************************** */
include_once("datosPredefinidos.php");
function msjPartida($numPartida,$palabra,$jugador,$puntaje,$intentosMsj){
    $partidaMsj =  "**************************************************************\n   Partida WORDIX $numPartida: palabra $palabra        \n   Jugador: $jugador             \n   Puntaje: $puntaje puntos      \n   Intento: $intentosMsj                           \n**************************************************************";
    return $partidaMsj;
 }

 /**
 * Busca una partida especifica al ingresar un numero, y devuelve un mensaje.
 * @param array $coleccionPartidas
 * @return string
 */
function buscarPartida($coleccionPartidas)
{
    $cantidadPartidas = count($coleccionPartidas);
    $intentosMsj = "";
    echo ("Ingre el numero de partida que desea Buscar: ");
    $numPartida = solicitarNumeroEntre(1, $cantidadPartidas);
    
    $partidaBuscada = $coleccionPartidas[$numPartida - 1];
    $palabra = $partidaBuscada["palabraWordix"];
    $jugador = $partidaBuscada["jugador"];
    $puntaje = $partidaBuscada["puntaje"];
    $intentos = $partidaBuscada["intentos"];

    if ($intentos == 0) {
        $intentosMsj = "No adivino la palabra";
    } else {
        $intentosMsj = "Adivino la palabra en $intentos intentos";
    }
    $mensanjePartida = msjPartida($numPartida, $palabra, $jugador, $puntaje, $intentosMsj);
    return ($mensanjePartida);
}

/******************************************************************** */