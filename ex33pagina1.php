<?php
    echo "<h1>Introdueix dades 2</h1>";

    $archivo_guardado = "ex33.txt";
    $out = fopen($archivo_guardado, "a");

    echo file_get_contents("ex33.txt");
    echo "<form method='post'>";
        echo "<label for='textarea'>Introdueix un text qualsevol</label><br>";
        echo "<textarea id='textarea' name='textarea' rows='10' cols='50'></textarea><br>";
        echo "<input type='submit' value='Guardar'>";
    echo "</form>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $textarea = trim($_POST['textarea']);
        $linea = trim($textarea);

        $datos = explode(" ", $textarea);

        $nueva_linea = implode(" ", $datos) . " |";
        fwrite($out, $nueva_linea);
        fclose($out);
    }
?>