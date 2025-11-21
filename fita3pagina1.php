<?php

    echo "<h1>FITA 3 - COMPARADOR DE FRASES (ARXIUS)</h1>";
    $archivo_guardado = "frases.txt";

    echo "<form method='post'>";
        echo "<label for='frase1'>Frase 1 (guardar):</label><br>";
        echo "<textarea id='frase1' name='frase1' rows='6' cols='50'></textarea><br><br>";

        echo "<label for='frase2'>Frase 2 (comparar):</label><br>";
        echo "<textarea id='frase2' name='frase2' rows='6' cols='50'></textarea><br><br>";

        echo "<input type='submit' name='guardar1' value='Guardar Frase 1'> ";
        echo "<input type='submit' name='guardar2' value='Comparar con Frase Guardada'>";
    echo "</form>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['guardar1'])) {
            $frase1 = $_POST['frase1'];
            $linea = trim($frase1);

           file_put_contents($archivo_guardado, $frase1);

            echo "<p>✅ Frase guardada <p>";
        }

        if (isset($_POST['guardar2'])) {
            if (file_exists($archivo_guardado)) {
                $frase1 = file_get_contents($archivo_guardado);
            } else {
                echo "<p>❌ No hay frase guardada todavía.</p>";
            }

            $frase2 = $_POST['frase2'];

            $palabras1 = explode(" ", strtolower($frase1));
            $palabras2 = explode(" ", strtolower($frase2));

            $coinciden = array_intersect($palabras1, $palabras2);

            if (count($coinciden) > 0) {
                foreach ($coinciden as $palabra) {
                    echo "🔸 $palabra <br>";
                }
            } else {
                echo "<p>❌ No hay palabras iguales.</p>";
            }

        }
    }
?>
