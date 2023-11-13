<?php
//////////////////////////////////////////////////////ESTA EN datosPredefinidos
// /**
//  * Obtiene una colección de palabras
//  * @return array
//  */
// function cargarColeccionPalabras()
// {
//     $coleccionPalabras = [
//         "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
//         "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
//         "VERDE", "MELON", "YUYOS", "PIANO", "PISOS", 
//         "HELIO", "RIÑON", "HOJAS", "LIMÓN", "PICOS", 
//         "NUBLA", "MANGO", "PUNTO", "BUCEO", "ROBOT", 
//         "GENTE", "DULCE", "CIELO", "NIEVE", "MENTE",
//     ];

//     return ($coleccionPalabras);
// }

/*****************************/

//////////////////////////////////////////////////////ESTÁ EN funcionesComplementarias
// /**
//  * muestra los datos de una partida jugada 
//  * @param int
//  * @param array
//  * 
//  */
// function mostrarPartida($indicePartida, $coleccionPartidas)  /*antes de invocar la funcion asegurarse que el numero elegido 
//                                                               por el usuario (ej: partida n°6) coincida con el número de indice 
//                                                               de la palabra (ej: $indicePartida=5)*/
// {
//       //int $auxiliarIndicePartida, $puntaje
//       //string $msjIntento

//    $auxiliarIndicePartida=$indicePartida+1 ;
//    $puntaje=$coleccionPartidas[$indicePartida]["puntaje"] ;

//    if ($puntaje==0) 
//    {
//       $msjIntento= "No adivinó la palabra\n" ;
//    } else {
//       $msjIntento= "Adivinó la palabra en ". $coleccionPartidas[$indicePartida]["intentos"]. " intentos\n" ;
//    }

//    echo "******************************************\n" ;
//    echo "Partida WORDIX ". $auxiliarIndicePartida. ": palabra ". $coleccionPartidas[$indicePartida]["palabraWordix"]. "\n" ;
//    echo "Jugador: ". $coleccionPartidas[$indicePartida]["jugador"]. "\n";
//    echo "Puntaje: ". $puntaje. " puntos\n" ;
//    echo "Intento: ". $msjIntento ;
//    echo "******************************************\n" ;
// }