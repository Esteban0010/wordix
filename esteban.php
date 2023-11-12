<?php
/******************************************************************** FUNCION 3*/
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

/********************************************************************  FUNCION 6*/


function comparPartidas($partida, $partidaComparacion)
{
    $orden = 0;
    if (ord($partida["jugador"]) > ord($partidaComparacion["jugador"])) {
        $orden = 1;
    } elseif ($partida["jugador"] == $partidaComparacion["jugador"]) {

        if ($partida["palabraWordix"] < $partidaComparacion["palabraWordix"]) {
            $orden = -1;
        } else {
            $orden = 1;
        }
    } elseif (ord($partida["jugador"]) < ord($partidaComparacion["jugador"])) {
        $orden = -1;
    }
    return $orden;
}
function ordenaalfabeticamentePalabra($coleccionPartidas)
{
    uasort($coleccionPartidas, "comparPartidas");
    uasort($coleccionPartidas, "comparPartidas");
    return ($coleccionPartidas);
}

/**
 * Me ordena las partidas alabeticamente por nombre y palabras jugadas, luego imprime por pantalla.
 * @param array $coleccionPartidas
 */
function mostrarPartidasOrdenadas($coleccionPartidas)
{
    $partidasOrdenadas = ordenaalfabeticamentePalabra($coleccionPartidas);
    print_r($partidasOrdenadas);
}
/******************************************************************** */