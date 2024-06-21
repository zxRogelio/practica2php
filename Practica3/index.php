<?php
    // Inicializar variables y errores
    $altura = $edad = $responsabilidad = "";
    $altura_err = $edad_err = $responsabilidad_err = "";
    $validacion_exitosa = false;

    // Validar y procesar formulario solo si se ha enviado
    if (isset($_POST["submit"])) {
        // Validar altura
        if (empty($_POST["altura"])) {
            $altura_err = "La altura es obligatoria.";
        } elseif (!is_numeric($_POST["altura"]) || $_POST["altura"] < 120) {
            $altura_err = "Debe ser un número y mayor a 120.";
        } else {
            $altura = $_POST["altura"];
        }

        // Validar edad
        if (empty($_POST["edad"])) {
            $edad_err = "La edad es obligatoria.";
        } elseif (!is_numeric($_POST["edad"]) || $_POST["edad"] < 16) {
            $edad_err = "Debe ser un número y mayor a 16 años.";
        } else {
            $edad = $_POST["edad"];
        }

        // Validar responsabilidad
        if (empty($_POST["responsabilidad"])) {
            $responsabilidad_err = "Debe aceptar la cláusula.";
        } else {
            $responsabilidad = $_POST["responsabilidad"];
        }

        // Verificar si la validación fue exitosa
        if (empty($altura_err) && empty($edad_err) && empty($responsabilidad_err)) {
            $validacion_exitosa = true;
        }
        if ($validacion_exitosa) {
            echo "<h2>Validación Exitosa</h2>";
            echo "<p>Todos los requisitos se cumplieron. Aquí está su ticket.</p>";
            echo "<img src='https://img.freepik.com/vector-premium/boletos-cine-dibujados-mano-garabato-boleto-entrada-pelicula-estilo-boceto_563464-275.jpg' alt='Ticket'>";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Validor Montaña Rusa</title>
</head>
<body>
<h2>Formulario de Validación para Montaña Rusa</h2>
<form method="post" action="">
        <label for="altura">Altura (cm):</label>
        <input type="text" id="altura" name="altura" value="<?php echo $altura;?>" pattern="[0-9]{3,4}" title="La altura debe ser un número entre 100 y 9999 cm" required>
        <span class="error">* <?php echo $altura_err;?></span>
        <br><br>
        
        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" value="<?php echo $edad;?>" pattern="[0-9]+" title="La edad debe ser un número entero" required>
        <span class="error">* <?php echo $edad_err;?></span>
        <br><br>
        
        <label>¿Rechaza llevarnos a juicio por daños y perjuicios de un mal mantenimiento?</label>
        <input type="radio" name="responsabilidad" value="Sí" <?php if ($responsabilidad=="Sí") echo "checked";?>> Sí
        <input type="radio" name="responsabilidad" value="No" <?php if ($responsabilidad=="No") echo "checked";?>> No
        <span class="error">* <?php echo $responsabilidad_err;?></span>
        <br><br>
        
        <input type="submit" name="submit" value="Validar">
</body>
</html>