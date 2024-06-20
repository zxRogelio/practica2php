<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de datos</title>
</head>
<body>
        <form action="welcome.php" method="POST">
            Nombre: <input type="text" name="name" pattern="[A-Z|a-z|ñ|Ñ|ü|Ü|ü|é|á|í|ó|ú|Á|É|Í
|Ó|Ú| |]{1-30}" required><br><br>
            Edad: <input type="text" name="edad" pattern="[1-9]{1-99}"><br><br>
            <input type="submit">
        </form>
</body>
</html>