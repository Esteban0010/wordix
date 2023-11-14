<?php
include_once("programaPilchumanPachecoCid.php") ;
include_once("datosPredefinidos.php");


function verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indicePalabra)
{
    $palabraUsada = false;
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
function mostrarPartida($indicePartida, $coleccionPartidas) /*antes de invocar la funcion asegurarse que el numero elegido 
por el usuario (ej: partida n°6) coincida con el número de indice 
de la palabra (ej: $indicePartida=5)*/
{
    //int $auxiliarIndicePartida, $puntaje
    //string $msjIntento

    $auxiliarIndicePartida = $indicePartida + 1;
    $puntaje = $coleccionPartidas[$indicePartida]["puntaje"];

    if ($puntaje == 0) {
        $msjIntento = "No adivinó la palabra\n";
    } else {
        $msjIntento = "Adivinó la palabra en " . $coleccionPartidas[$indicePartida]["intentos"] . " intentos\n";
    }

    echo "******************************************\n";
    echo "Partida WORDIX " . $auxiliarIndicePartida . ": palabra " . $coleccionPartidas[$indicePartida]["palabraWordix"] . "\n";
    echo "Jugador: " . $coleccionPartidas[$indicePartida]["jugador"] . "\n";
    echo "Puntaje: " . $puntaje . " puntos\n";
    echo "Intento: " . $msjIntento;
    echo "******************************************\n";
}

/************************************************************** */


/**
 * Me permite jugar Wordix, con un palabra al azar
 * @param array $coleccionPalabras
 * @param array $numPalabrasUsadas
 * @return array 
 */
function jugarConPalabraAleatoria($coleccionPalabras, $coleccionPartidas, $nombreUsuario)
{
    $palabraUsada = false;
    $cantidadPalabras = count($coleccionPalabras);
    do {
        $numeroDePalabra = rand(0, $cantidadPalabras - 1);
        $palabraUsada = verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $numeroDePalabra);
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
function primeraPartidaGanada($partidasPredefinidas, $nombreUsuario)
{
    $indice = 0;
    foreach ($partidasPredefinidas as $partida) {
        if ($nombreUsuario == $partida["jugador"] && $partida["puntaje"] > 0) {
            return $indice;
        }
        $indice = $indice + 1;
    }
    return -1;

}



/************************************************************** */

function agregarPalabra($coleccionPalabras, $palabra)
{
    $coleccionPalabras[] = $palabra;
    return $coleccionPalabras;
}

/************************************************************** */

/**
 * Me permite obtener las estadisticas generales de un jugador.
 * @param array $coleccionPartidas
 * @return array
 */
function estadisticasJugador($coleccionPartidas)
{
    $contadorPartidas = 0;
    $acumuladorPuntaje = 0;
    $contadorVictorias = 0;
    $porcentajeVictorias = 0;
    $jugadorEncontrado = false;
    $intento1 = 0;
    $intento2 = 0;
    $intento3 = 0;
    $intento4 = 0;
    $intento5 = 0;
    $intento6 = 0;

    echo ("Ingrese el nombre de jugador: ");
    do {
        $jugador = trim(fgets(STDIN));

        foreach ($coleccionPartidas as $partida) {
            if ($jugador == $partida["jugador"]) {
                $intento = $partida["intentos"];
                echo $intento;
                $jugadorEncontrado = true;
                $contadorPartidas = $contadorPartidas + 1;
                $acumuladorPuntaje = $acumuladorPuntaje + $partida["puntaje"];
                if ($partida["puntaje"] > 0) {
                    $contadorVictorias = $contadorVictorias + 1;
                }
                ;
                switch ($intento) {
                    case 1:
                        $intento1 = $intento1 + 1;
                        break;
                    case 2:
                        $intento2 = $intento2 + 1;
                        break;
                    case 3:
                        $intento3 = $intento3 + 1;
                        break;
                    case 4:
                        $intento4 = $intento4 + 1;
                        break;
                    case 5:
                        $intento5 = $intento5 + 1;
                        break;
                    case 6:
                        $intento6 = $intento6 + 1;
                        break;


                }
            }
            ;
        }

        if (!$jugadorEncontrado) {
            echo ("jugador no encontrado, intente nuevamente: ");
        }
        ;
    } while (!$jugadorEncontrado);
    $arrayEstadisticas = array(
        "jugador" => $jugador,
        "partidas" => $contadorPartidas,
        "puntaje" => $acumuladorPuntaje,
        "victorias" => $contadorVictorias,
        "intento1" => $intento1,
        "intento2" => $intento2,
        "intento3" => $intento3,
        "intento4" => $intento4,
        "intento5" => $intento5,
        "intento6" => $intento
    );
    return $arrayEstadisticas;
}

/*****************************OPCION 1******************************** */

/**
 * solicita al usuario el numero de la palabra con la que desea jugar y retorna la misma
 * @return string
 */
function jugarWordixConPalabraElegida($coleccionPalabras, $coleccionPartidas) 
{
    //boolean $palabarUsada
    //string $nombreUsuario, $palabraElegida
    //int $cantPalabrasWordix, $cantPartidas, $numero, $indiceElegido


    $palabraUsada = false;
    $nombreUsuario = solicitarJugador();
    $cantPalabrasWordix = count($coleccionPalabras);
    $cantPartidas = count($coleccionPartidas);
    echo "Ingrese el número de la palabra con la que desea jugar: ";
    do {
        $numero = solicitarNumeroEntre(1, $cantPalabrasWordix);
        $indiceElegido = $numero - 1;
        $palabraElegida = $coleccionPalabras[$indiceElegido];
        $palabraUsada = verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indiceElegido);
        if ($palabraUsada) {
            echo "Debe ingresar un numero de palabra que no hayas utilizadao: ";
        }
    } while ($palabraUsada);

    return ($palabraElegida) ;
}

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
