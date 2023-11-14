<?php
/******************************************************************** FUNCION 3*/
include_once("datosPredefinidos.php");
include_once("mensajes.php");
include_once("funcionesComplementarias.php");


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
/** 
 * Compara entre sus dos parametro y retorna un numero dependiendo la condicion cumplida
 * @param array $partida
 * @param array $partidaComparacion
 * @return int
*/
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
/******************************************************************** Funcion Optcio 4*/


/**
 * Busca la primera partida ganada de un usuario, y devuelve un mensaje.
 * @param array $partidasPredefinidas
 * @return int
 */
// Una función que dada una colección de partidas y el nombre de un jugador, retorne el índice de la primer
// partida ganada por dicho jugador. Si el jugador ganó ninguna partida, la función debe retornar el valor -1.
// (debe utilizar las instrucciones vistas en la materia, no utilizar funciones predefinidas de php)
function primeraPartidaGanada($partidasPredefinidas,$nombreUsuario)
{
    $indice = 0;
    foreach ($partidasPredefinidas as $partida) {
        if ( $nombreUsuario == $partida["jugador"] && $partida["puntaje"] > 0) {
            return $indice;
        } 
        $indice = $indice+1;
    }
    return -1;
    
}