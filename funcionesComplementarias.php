<?php

function verificarPalabraUsada($nombreUsuario, $coleccionPartidas, $coleccionPalabras, $indicePalabra)
{
    $palabraUsada =false;
    $cantPartidas = count($coleccionPartidas);
    for ($i = 0; $i < $cantPartidas; $i++) {
        if ($nombreUsuario == $coleccionPartidas[$i]["jugador"]) {
            print_r($coleccionPartidas[$i]["palabraWordix"]);
            if ($coleccionPalabras[$indicePalabra] == $coleccionPartidas[$i]["palabraWordix"]) {
                $palabraUsada = true;
            }
        }
    }
    return $palabraUsada;
}