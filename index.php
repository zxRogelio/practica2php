<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <title>Conversión de Decimal</title>

</head>
<body>
    <div class="container">
        <h1 class="text-center">Conversión de Decimal a</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="numero" class="form-label">Ingrese un número decimal:</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div><br>
            <div class="mb-3">
                <label for="conversion" class="form-label">Seleccione una opción:</label>
                <select class="form-select" id="conversion" name="conversion" required>
                    <option value="binario">Convertir a binario</option>
                    <option value="octal">Convertir a octal</option>
                    <option value="hexadecimal">Convertir a hexadecimal</option>
                </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Convertir</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $decimal = intval($_POST["numero"]);
            $conversion = $_POST["conversion"];
            $resultado = "";

            function decimal_a_binario($decimal) {
                return decbin($decimal);
            }

            function decimal_a_octal($decimal) {
                return decoct($decimal);
            }

            function decimal_a_hexadecimal($decimal) {
                return dechex($decimal);
            }

            if ($conversion == "binario") {
                $resultado = decimal_a_binario($decimal);
                echo "<div class='result'>El número decimal $decimal en binario es: $resultado</div>";
            } elseif ($conversion == "octal") {
                $resultado = decimal_a_octal($decimal);
                echo "<div class='result'>El número decimal $decimal en octal es: $resultado</div>";
            } elseif ($conversion == "hexadecimal") {
                $resultado = decimal_a_hexadecimal($decimal);
                echo "<div class='result'>El número decimal $decimal en hexadecimal es: $resultado</div>";
            } else {
                echo "<div class='result'>Opción no válida. Por favor, intente de nuevo.</div>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>