<?php
include_once("programaPilchumanPachecoCid.php");
include_once("datosPredefinidos.php");

/**********************************************************************************FUNCION 6*/

/**
 * muestra los datos de una partida jugada 
 * @param array
 */
function mostrarPartida($indicePartida, $coleccionPartidas) /*antes de invocar la funcion asegurarse que el numero elegido 
por el usuario (ej: partida n°6) coincida con el número de indice 
de la palabra (ej: $indicePartida=5)*/
{
    //int $auxiliarIndicePartida, $puntaje
    //string $msjIntento

    if ($indicePartida == -1) {
        $mensaje = msjSinPartidasGanadas();
        return $mensaje;
    }

    $auxiliarIndicePartida = $indicePartida + 1;
    $palabra = $coleccionPartidas[$indicePartida]["palabraWordix"];
    $jugador = $coleccionPartidas[$indicePartida]["jugador"];
    $puntaje = $coleccionPartidas[$indicePartida]["puntaje"];
    $intentos = $coleccionPartidas[$indicePartida]["intentos"];

    if ($puntaje == 0) {
        $msjIntento = "No adivinó la palabra\n";
    } else {
        $msjIntento = "Adivinó la palabra en " . $intentos . " intentos\n";
    }

    $mensaje =  "**************************************************************\n   
    Partida WORDIX $auxiliarIndicePartida: palabra $palabra        \n   
    Jugador: $jugador             \n   
    Puntaje: $puntaje puntos      \n   
    Intento: $msjIntento                           \n
    **************************************************************";

    return $mensaje;
}

/**********************************************************************************FUNCION 7*/

/**
 * agrega una palabra (elemento) a un array
 * @param array $coleccionPalabras
 * @param string $palabra 
 */
function agregarPalabra($coleccionPalabras, $palabra)
{
    $coleccionPalabras[] = $palabra;
    return $coleccionPalabras;
}

/**********************************************************************************FUNCION 8*/

/**
 * Busca la primera partida ganada de un usuario, y devuelve un mensaje.
 * @param array $partidasPredefinidas
 * @param string $nombreUsuario 
 * @return int
 */
function IndicePrimeraPartidaGanada($partidasPredefinidas, $nombreUsuario)
{
    //int $indice
    $indice = 0;
    foreach ($partidasPredefinidas as $partida) {
        if ($nombreUsuario == $partida["jugador"] && $partida["puntaje"] > 0) {
            return $indice;
        }
        $indice = $indice + 1;
    }
    return -1;
}

/**********************************************************************************FUNCION 9*/

/**
 * Me permite obtener las estadisticas generales de un jugador.
 * @param array $coleccionPartidas
 * @return array 
 */
function estadisticasJugador($coleccionPartidas)
{
    // int $contadorPartidas, $acumuladorPuntaje, $contadorVictorias, $intento, $intento1, $intento2, $intento3, $intento4, $intento5, $intento6
    // string $jugador 
    // boolean $jugadorEncontrado
    // array $arrayEstadisticas 
    $contadorPartidas = 0;
    $acumuladorPuntaje = 0;
    $contadorVictorias = 0;
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
                $jugadorEncontrado = true;
                $contadorPartidas = $contadorPartidas + 1;
                $acumuladorPuntaje = $acumuladorPuntaje + $partida["puntaje"];
                if ($partida["puntaje"] > 0) {
                    $contadorVictorias = $contadorVictorias + 1;
                }

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
        }

        if (!$jugadorEncontrado) {
            echo ("jugador no encontrado, intente nuevamente: ");
        }
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
        "intento6" => $intento6,
    );
    return $arrayEstadisticas;
}

/**********************************************************************************FUNCION 10*/

/**
 * @return string 
 */
function solicitarJugador()
{
    //string $nombreUsuario, $primeraLetra
    echo "Ingrese por favor su nombre: \n";
    do {
        $nombreUsuario = trim(fgets(STDIN));
        // Verificar si el nombre tiene solo letras
        $primeraLetra = $nombreUsuario[0];
        if (!ctype_alpha($primeraLetra)) {
            echo "Su nombre debe comenzar con una letra, ingrese un nombre valido: \n";
        }
    } while (!ctype_alpha($primeraLetra));
    $nombreUsuario = strtolower($nombreUsuario);
    return $nombreUsuario;
}

/**********************************************************************************FUNCION 11 PARTE 1*/

/** 
 * Compara entre sus dos parametro y retorna un numero dependiendo la condicion cumplida
 * @param array $partida
 * @param array $partidaComparacion
 * @return int
 */
function comparPartidas($partida, $partidaComparacion)
{
    // int $orden
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

/**********************************************************************************FUNCION 11 PARTE 2*/

/**
 * ordena alfabeticamente una parte del array
 * @param array $coleccionPartidas
 * @return array
 */
function ordenaalfabeticamentePalabra($coleccionPartidas)
{
    uasort($coleccionPartidas, "comparPartidas");
    uasort($coleccionPartidas, "comparPartidas");
    return ($coleccionPartidas);
}

/**********************************************************************************FUNCION 11 PARTE 3 (y ultima)*/

/**
 * Me ordena las partidas alabeticamente por nombre y palabras jugadas, luego imprime por pantalla.
 * @param array $coleccionPartidas
 */
function mostrarPartidasOrdenadas($coleccionPartidas)
{   
    // array $partidasOrdenadas 
    $partidasOrdenadas = ordenaalfabeticamentePalabra($coleccionPartidas);
    print_r($partidasOrdenadas);
}

/**********************************************************************************FUNCION EXTRA*/

/**
 * verifica si la palabra ya fue utilizada
 *@param string $nombreUsario 
 *@param array $coleccionPartida 
 *@param array $coleccionPalabras
 *@param int $indicePalabra 
 *@return boolean  
 */
function verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indicePalabra)
{
    //boolean $palabraUsada 
    //int $cantPartidas, $i
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

/**********************************************************************************FUNCION EXTRA*/
/**
 * @param array $coleccionPartidas 
 * @return int 
 */
function solicitarIndicePartida($coleccionPartidas)
{
    //Int $cantidadPartidas, $indicePartida 
    $cantidadPartidas = count($coleccionPartidas);
    echo "Ingrese el número de partida que desea ver: ";
    $indicePartida = solicitarNumeroEntre(1, $cantidadPartidas);
    $indicePartida = $indicePartida - 1;

    return ($indicePartida);
}

/**********************************************************************************FUNCION EXTRA*/

/**
 * Me permite jugar Wordix, con un palabra al azar
 * @param array $coleccionPalabras
 * @param array $coleccionPartidas
 * @param string $nombreUsario 
 * @return array 
 */
function jugarConPalabraAleatoria($coleccionPalabras, $coleccionPartidas, $nombreUsuario)
{
    //array $partida 
    //int $numeroDePalabra, $cantidadPalabras 
    //boolean $palabraUsada
    $palabraUsada = false;
    $cantidadPalabras = count($coleccionPalabras);
    do {
        $numeroDePalabra = rand(0, $cantidadPalabras - 1);
        $palabraUsada = verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $numeroDePalabra);;
    } while ($palabraUsada);
    $partida = jugarWordix($coleccionPalabras[$numeroDePalabra - 1], ($nombreUsuario));
    return ($partida);
}

/**********************************************************************************FUNCION EXTRA*/

/**
 * solicita al usuario el numero de la palabra con la que desea jugar y retorna la misma
 * @param array $coleccionPartidas
 * @param array $coleccionPalabras 
 * @param string $nombreUsuario 
 * @return string
 */
function jugarWordixConPalabraElegida($coleccionPalabras, $coleccionPartidas, $nombreUsuario)
{
    //boolean $palabraUsada
    //string $palabraElegida
    //int $cantPalabrasWordix, $palabraElegida, $numero, $indiceElegido

    $palabraUsada = false;
    $cantPalabrasWordix = count($coleccionPalabras);
    echo "Ingrese el número de la palabra con la que desea jugar: ";
    do {
        $numero = solicitarNumeroEntre(1, $cantPalabrasWordix);
        $indiceElegido = $numero - 1;
        $palabraElegida = $coleccionPalabras[$indiceElegido];
        $palabraUsada = verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indiceElegido);
        if ($palabraUsada) {
            echo "Debe ingresar un numero de palabra que no hayas utilizado: ";
        }
    } while ($palabraUsada);

    return $palabraElegida;
}

/**********************************************************************************FUNCION EXTRA*/

/**
 * verifica si un numbre de usuario se encuentra en el array $coleccionPartidas
 * @param string $nombreUsuario
 * @param array $coleccionPartidas
 * @return string
 */
function verificarNombreUsuario($nombreUsuario, $coleccionPartidas)
{
    //boolean $usuarioEncontrado
    $usuarioEncontrado = false;
    do {
        foreach ($coleccionPartidas as $partida) {
            if ($nombreUsuario == $partida["jugador"]) {
                $usuarioEncontrado = true;
            }
        }
        if (!$usuarioEncontrado) {
            echo "Nombre de usuario no existente. Asegurese de escribirlo correctamente: \n";
            $nombreUsuario = trim(fgets(STDIN));
        }
    } while (!$usuarioEncontrado);

    return $nombreUsuario;
}
