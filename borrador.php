<?php
function solicitarJugador(){
    /*Inicialización*/
    echo "Ingrese por favor su nombre: \n";
   
                
    do {
        $nombreUsuario = trim(fgets(STDIN));
            // Verificar si el nombre tiene solo letras
           $primeraLetra = $nombreUsuario[0];
                if (!ctype_alpha($primeraLetra)){
                echo "Su nombre debe comenzar con una letra, ingrese un nombre valido: \n";
            }
        } 
    while ( !ctype_alpha($primeraLetra));
    $nombreUsuario = strtolower($nombreUsuario);
   return $nombreUsuario;
}