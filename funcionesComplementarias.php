<?php

function verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indicePalabra)
{
    $palabraUsada =false;
    $cantPartidas = count($coleccionPartidas);
    for ($i = 0; $i < $cantPartidas; $i++) {
        if ($nombreUsuario == $coleccionPartidas[$i]["jugador"]) {
            if ($coleccionPalabras[$indicePalabra] == $coleccionPartidas[$i]["palabraWordix"]) {
                $palabraUsada = true;
            }
        }
    }
    return $palabraUsada;
}

/************************************************************** */

/**
 * muestra los datos de una partida jugada 
 * @param int
 * @param array
 * 
 */
function mostrarPartida($indicePartida, $coleccionPartidas)  /*antes de invocar la funcion asegurarse que el numero elegido 
                                                              por el usuario (ej: partida n°6) coincida con el número de indice 
                                                              de la palabra (ej: $indicePartida=5)*/
{
      //int $auxiliarIndicePartida, $puntaje
      //string $msjIntento

   $auxiliarIndicePartida=$indicePartida+1 ;
   $puntaje=$coleccionPartidas[$indicePartida]["puntaje"] ;

   if ($puntaje==0) 
   {
      $msjIntento= "No adivinó la palabra\n" ;
   } else {
      $msjIntento= "Adivinó la palabra en ". $coleccionPartidas[$indicePartida]["intentos"]. " intentos\n" ;
   }

   echo "******************************************\n" ;
   echo "Partida WORDIX ". $auxiliarIndicePartida. ": palabra ". $coleccionPartidas[$indicePartida]["palabraWordix"]. "\n" ;
   echo "Jugador: ". $coleccionPartidas[$indicePartida]["jugador"]. "\n";
   echo "Puntaje: ". $puntaje. " puntos\n" ;
   echo "Intento: ". $msjIntento ;
   echo "******************************************\n" ;
}

/************************************************************** */


/**
 * Me permite jugar Wordix, con un palabra al azar
 * @param array $coleccionPalabras
 * @param array $numPalabrasUsadas
 * @return array 
 */
function jugarConPalabraAleatoria($coleccionPalabras, $coleccionPartidas,$nombreUsuario)
{
    $palabraUsada = false;
    $cantidadPalabras = count($coleccionPalabras);
    do {
        $numeroDePalabra = rand(0, $cantidadPalabras - 1);   
        $palabraUsada =verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $numeroDePalabra);
        ;
    } while ($palabraUsada);
    $partida = jugarWordix($coleccionPalabras[$numeroDePalabra - 1], strtolower($nombreUsuario));
    return ($partida);
}

/************************** Funcion NUMERO 8************************************ */
/**
 * Busca la primera partida ganada de un usuario, y devuelve un mensaje.
 * @param array $partidasPredefinidas
 * @param string
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