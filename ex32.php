<?php
    echo "<h1>INTRODUEIX DADES</h1>";

    $archivo_guardado = "comentaris.txt";
    $out = fopen($archivo_guardado, "w");

    echo "<form method='post'>";
        echo "<label for='comentari'>Comentarios</label><br>";
        echo "<textarea id='comentari' name='comentari' rows='10' cols='50'></textarea><br><br>";
        echo "<label for='separador'>Separador</label><br>";
        echo "<input type='text' id='separador' name='separador'><br><br>";
        echo "<input type='submit' value='Guardar'>";
    echo "</form>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comentari = trim($_POST['comentari']);
        $linea = trim($comentari); // Quitar los saltos

        // Ponemos separador al comentario introducido anterior
        $palabras = explode(" ", $linea);

        $nueva_linea = implode($_POST['separador'], $palabras) . "\n"; // Guardar los datos con el separador que hayamos introducido
        fwrite($out, $nueva_linea); // Escribimos el archivo con los datos nuevos
        fclose($out);

        echo "<p>✅ Comentario guardado!</p>";
    }
?>