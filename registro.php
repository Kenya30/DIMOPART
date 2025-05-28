<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - DimoPart</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Registro</h1>
        </header>
        <section>
            <form action="registro.php" method="POST">
                <label for="nuevousuario">Nuevo usuario:</label>
                <input type="text" name="nuevousuario" id="nuevousuario" required> <br><br>
                <label for="nuevacontra">Nueva contraseña:</label>
                <input type="password" name="nuevacontra" id="nuevacontra" required> <br><br>
                <label for="confirmarcontra">Confirmar contraseña:</label>
                <input type="password" name="confirmarcontra" id="confirmarcontra" required> <br><br>
                <button type="submit">Registrarse</button>
                <p><a href="inicarsesion.php">¿Ya tienes una cuenta? Inicia sesión</a></p>
                <p><a href="index.php">Volver a la página principal</a></p>
            </form>
        </section>
        <?php
        session_start();

        // Incluir el archivo de conexión a la base de datos
        include('conexion.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nuevoUsuario = $_POST["nuevousuario"];
            $nuevaContra = $_POST["nuevacontra"];
            $confirmarContra = $_POST["confirmarcontra"];

            if ($nuevaContra === $confirmarContra) {
                // Encriptar la contraseña antes de guardarla
                $contraseñaHash = password_hash($nuevaContra, PASSWORD_DEFAULT);

                // Insertar el nuevo usuario en la base de datos
                $sql = "INSERT INTO usuarios (nombre, contraseña) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("ss", $nuevoUsuario, $contraseñaHash);

                    if ($stmt->execute()) {
                        // Registro exitoso, preparamos un mensaje para JavaScript
                        echo '<script>alert("¡Registro exitoso!"); window.location.href = "panel.php";</script>';
                        exit();
                    } else {
                        // Error al registrar el usuario
                        echo "<p style='color:red;'>Error al registrar el usuario: " . $stmt->error . "</p>";
                    }

                    $stmt->close();
                } else {
                    echo "<p style='color:red;'>Error en la preparación de la consulta: " . $conn->error . "</p>";
                }
            } else {
                // Si las contraseñas no coinciden
                echo "<p style='color:red;'>Las contraseñas no coinciden.</p>";
                echo "<p><a href='javascript:history.back()'>Volver al registro</a></p>";
            }

            $conn->close(); // Cerrar la conexión después de la operación
        }
        ?>
    </div>
</body>
</html>