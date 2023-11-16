<?php
/**
 * Obtiene una colección de partidas
 * @return array
 */
function cargarPartidasPredefinidas()
{
    $coleccionPartidas[0]=["palabraWordix" => "VERDE", "jugador" => "guadalupe",  "intentos" => "3", "puntaje" => "14"] ;
    $coleccionPartidas[1]=["palabraWordix" => "QUESO", "jugador" => "esteban",  "intentos" => "6", "puntaje" => "10"] ;
    $coleccionPartidas[2]=["palabraWordix" => "ROBOT", "jugador" => "leonel",  "intentos" => "5", "puntaje" => "12"] ;
    $coleccionPartidas[3]=["palabraWordix" => "ROBOT", "jugador" => "guadalupe",  "intentos" => "2", "puntaje" => "16"] ;
    $coleccionPartidas[4]=["palabraWordix" => "VERDE", "jugador" => "leonel",  "intentos" => "5", "puntaje" => "12"] ;
    $coleccionPartidas[5]=["palabraWordix" => "PUNTO", "jugador" => "esteban",  "intentos" => "1", "puntaje" => "17"] ;
    $coleccionPartidas[6]=["palabraWordix" => "MELON", "jugador" => "guadalupe",  "intentos" => "6", "puntaje" => "0"] ;
    $coleccionPartidas[7]=["palabraWordix" => "PICOS", "jugador" => "leonel",  "intentos" => "6", "puntaje" => "0"] ;
    $coleccionPartidas[8]=["palabraWordix" => "PIANO", "jugador" => "esteban",  "intentos" => "0", "puntaje" => "0"] ;
    $coleccionPartidas[9]=["palabraWordix" => "MANGO", "jugador" => "esteban",  "intentos" => "6", "puntaje" => "10"] ;
    $coleccionPartidas[10]=["palabraWordix" => "VERDE", "jugador" => "esteban",  "intentos" => "6", "puntaje" => "0"] ;
    $coleccionPartidas[11]=["palabraWordix" => "HUEVO", "jugador" => "guadalupe",  "intentos" => "6", "puntaje" => "9"] ;
    $coleccionPartidas[12]=["palabraWordix" => "RIÑON", "jugador" => "guadalupe",  "intentos" => "2", "puntaje" => "16"] ;
    $coleccionPartidas[13]=["palabraWordix" => "GOTAS", "jugador" => "leonel",  "intentos" => "5", "puntaje" => "12"] ;

    return ($coleccionPartidas);
}

/*******************************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS", 
        "HELIO", "RIÑON", "HOJAS", "LIMÓN", "PICOS", 
        "NUBLA", "MANGO", "PUNTO", "BUCEO", "ROBOT", 
        "GENTE", "DULCE", "CIELO", "NIEVE", "MENTE",
    ];

    return ($coleccionPalabras);
}