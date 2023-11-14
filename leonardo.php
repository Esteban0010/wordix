<?

/**
 * Obtiene una colección de palabras
 * 
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "BORDO", "RATON", "GARRA", "MONOS", "MANOS",
    ];
    // Seleccioná aleatoriamente un elemento del array
    $palabraAlealtoria = $coleccionPalabras[array_rand($coleccionPalabras)];

    return ($palabraAlealtoria);
}

function cargarColeccionPartidas($partida){

         echo "los datos de su primera partida son:\n
         Nombre:". $partida["jugador"]. 
         "\n Su palabra era:". $partida["palabraWordix"].
         "\n Intentos: ". $partida["intentos"]. 
         "\n Puntaje:".$partida["puntaje"]. 
         "\n Palabra jugada".$partida ["palabraJugada"];
}


//programa principal
echo "Ingrese por favor su nombre:";
$nombreUsuario = trim(fgets(STDIN));
escribirMensajeBienvenida($nombreUsuario);
$palabraWordix = cargarColeccionPalabras();

//se inicia la partida
$partida = jugarWordix($palabraWordix, $nombreUsuario);
$datosFinales = cargarColeccionPartidas($partida);
