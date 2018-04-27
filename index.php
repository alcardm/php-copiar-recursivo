<?php

/* Copiar recursivamente */

$proyectos = [
    0 => 'proyectoA',
    1 => 'proyectoB',
    2 => 'proyectoC',
    3 => 'proyectoD',
];
$carpeta_origen = 'origen/';
$base = 'destino/';

$contador = 0;
foreach ($proyectos as $value) {
    $contador++;

    $carpeta_destino = $base . $value . '';
    full_copy($carpeta_origen, $carpeta_destino);

    echo '<div style="clear:both; color: tomato;">';
    echo '<span style="color: green;">' . $contador . '</span> ' . $value;
    echo '</div>';
}

function full_copy($source, $target) {
    if (is_dir($source)) {
        @mkdir($target);
        $d = dir($source);
        while (FALSE !== ( $entry = $d->read() )) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $Entry = $source . '/' . $entry;
            if (is_dir($Entry)) {
                full_copy($Entry, $target . '/' . $entry);
                continue;
            }
            copy($Entry, $target . '/' . $entry);
        }

        $d->close();
    } else {
        copy($source, $target);
    }
}
