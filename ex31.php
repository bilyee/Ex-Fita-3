<?php
    echo "<h1>Processa Contactes</h1>";

    $fichero_entrada = "contactes31.txt";
    $fichero_salida = "contactes31b.txt";

    // Abrimos el archivo de entrada para solo leer
    $in = fopen($fichero_entrada, "r");

    // Abrimos o creamos el archivo de salida para escribir
    $out = fopen($fichero_salida, "w");

    // Creación tabla
    echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
    echo "<tr><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Telefono</th></tr>";

    // Leemos el archivo línea por línea
    while (!feof($in)) {
        $linea = fgets($in);
        $linea = trim($linea); // Quitar los saltos
        
        // Saltar lineas vacias
        if ($linea == "") {
            continue;
        }

        // Dividimos la línea por comas
        $datos = explode(",", $linea);

        echo "<tr>";
        echo "<td>".$datos[0]."</td>";
        echo "<td>".$datos[1]."</td>";
        echo "<td>".$datos[2]."</td>";
        echo "<td>".$datos[3]."</td>";
        echo "</tr>";

        $nueva_linea = implode("#", $datos) . "\n"; // Guardar los datos con el separador '#'
        fwrite($out, $nueva_linea); // Escribimos el archivo con los datos nuevos
    }

    echo "</table>";

    fclose($in);
    fclose($out);

    echo "<p>Fichero '$fichero_salida' creado correctamente.</p>";
?>