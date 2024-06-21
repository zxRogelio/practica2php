<?php
        // Inicializar variables y errores
        $email = $password1 = $password2 = "";
        $email_err = $password_err = "";
        $validacion_exitosa = false;

        // Validar y procesar formulario solo si se ha enviado
        if (isset($_POST["submit"])) {
            // Validar email
            if (empty($_POST["email"])) {
                $email_err = "El correo es obligatorio.";
            } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email_err = "Formato de correo inválido.";
            } else {
                $email = $_POST["email"];
            }
            // Validar contraseñas
            if (empty($_POST["password1"]) || empty($_POST["password2"])) {
                $password_err = "Ambas contraseñas son obligatorias.";
            } elseif ($_POST["password1"] != $_POST["password2"]) {
                $password_err = "Las contraseñas no coinciden.";
            } else {
                $password1 = $_POST["password1"];
                $password2 = $_POST["password2"];
            }

            // Verificar si la validación fue exitosa
            if (empty($email_err) && empty($password_err)) {
                $validacion_exitosa = true;
            }
            if ($validacion_exitosa) {
                echo '<h1 class="alert alert-success mt-4">Validación Exitosa. El correo y las contraseñas son correctos.</h1>';
            } elseif (isset($_POST["submit"])) {
                echo '<h1 class="alert alert-danger mt-4">Validación Fallida. Por favor, corrija los errores e intente nuevamente.</h1>';
            }
        }
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario de identificacion</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Formulario de Identificación</h2>
                    <form method="post" action="" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email);?>" required>
                            <div class="error">* <?php echo $email_err;?></div>
                        </div>
                        <div class="form-group">
                            <label for="password1">Contraseña:</label>
                            <input type="password" id="password1" name="password1" class="form-control" pattern=".{8,}" title="La contraseña debe tener al menos 8 caracteres" required>
                            <div class="error">* <?php echo $password_err;?></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password2">Repetir contraseña:</label>
                            <input type="password" id="password2" name="password2" class="form-control" pattern=".{8,}" title="La contraseña debe tener al menos 8 caracteres" required>
                        </div>
                        
                        <div class="text-center">
                            <input type="submit" name="submit" value="Validar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>