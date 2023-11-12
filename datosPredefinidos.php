<?php

function cargarPartidasPredefinidas()
{
    $partidasPredefinidas = array(
        array("palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0),
        array("palabraWordix"=> "PIANO" , "jugador" => "guadalupe", "intentos"=> 3, "puntaje" => 4),
        array("palabraWordix"=> "PULSO" , "jugador" => "esteban", "intentos"=> 5, "puntaje" => 1),
        array("palabraWordix"=> "PULSO" , "jugador" => "eeteban", "intentos"=> 5, "puntaje" => 1),
        array("palabraWordix"=> "VERDE" , "jugador" => "leonardo", "intentos"=> 6, "puntaje" => 10),
        array("palabraWordix"=> "GATOS" , "jugador" => "leonardo", "intentos"=> 0, "puntaje" => 0),
        array("palabraWordix"=> "CELDA" , "jugador" => "pablo", "intentos"=> 3, "puntaje" => 6),
        array("palabraWordix"=> "NAVES" , "jugador" => "guadalupe", "intentos"=> 1, "puntaje" => 3),
        array("palabraWordix"=> "LUCHA" , "jugador" => "priscila", "intentos"=> 2, "puntaje" => 9),
        array("palabraWordix"=> "RASGO" , "jugador" => "esteban", "intentos"=> 4, "puntaje" => 8),
        array("palabraWordix"=> "LUNAR" , "jugador" => "guadalupe", "intentos"=> 5, "puntaje" => 10),
        array("palabraWordix"=> "TINTO" , "jugador" => "leonardo", "intentos"=> 5, "puntaje" => 14),
        array("palabraWordix"=> "HUEVO" , "jugador" => "esteban", "intentos"=> 4, "puntaje" => 9),
        array("palabraWordix"=> "GOTAS" , "jugador" => "guadalupe", "intentos"=> 6, "puntaje" => 19),
        array("palabraWordix"=> "AAAAA" , "jugador" => "zzsss", "intentos"=> 6, "puntaje" => 19),
        array("palabraWordix"=> "ZZZZZ" , "jugador" => "zasss", "intentos"=> 6, "puntaje" => 19),
        array("palabraWordix"=> "AAAAA" , "jugador" => "zasss", "intentos"=> 6, "puntaje" => 19),
    );

    return ($partidasPredefinidas);
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

/*******************************************************/