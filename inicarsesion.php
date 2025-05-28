<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - MovilPart</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Iniciar sesión</h1>
        </header>
        <section>
            <form action="" method="POST">
                <?php
                session_start(); // Iniciamos la sesión aquí también para mostrar errores si los hay

                // Incluimos el archivo de conexión a la base de datos
                include('conexion.php');

                if (isset($_SESSION['usuario_nombre'])) {
                    // Si ya hay una sesión activa, redirigimos al panel directamente
                    header("Location: panel.php");
                    exit();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Verificamos si se han enviado datos por el formulario
                    if (isset($_POST['usuario']) && isset($_POST['contra'])) {
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contra'];

                        // Preparamos la consulta SQL para buscar al usuario por su nombre
                        $sql = "SELECT nombre, contraseña FROM usuarios WHERE nombre = '$usuario'";
                        $resultado = $conn->query($sql);

                        if ($resultado->num_rows == 1) {
                            // Si se encontró un usuario con ese nombre
                            $fila = $resultado->fetch_assoc();
                            $contraseñaHashAlmacenada = $fila['contraseña'];

                            // Verificamos si la contraseña ingresada coincide con la contraseña hasheada de la base de datos
                            if (password_verify($contraseña, $contraseñaHashAlmacenada)) {
                                // La contraseña es correcta, iniciamos la sesión y guardamos información del usuario
                                $_SESSION['usuario_nombre'] = $fila['nombre']; // Guardamos el nombre de usuario en la sesión

                                // Redirigimos al usuario a panel.php
                                header("Location: panel.php");
                                exit();
                            } else {
                                // La contraseña es incorrecta, mostramos un mensaje de error
                                $error_inicio_sesion = "Contraseña incorrecta.";
                            }
                        } else {
                            // No se encontró ningún usuario con ese nombre
                            $error_inicio_sesion = "El usuario no existe.";
                        }
                    } else {
                        // Si no se enviaron el usuario o la contraseña, mostramos un mensaje de error
                        $error_inicio_sesion = "Por favor, introduce tu usuario y contraseña.";
                    }
                }

                // Si hay un error de inicio de sesión, lo mostramos en el formulario
                if (isset($error_inicio_sesion)) {
                    echo "<p style='color: red;'>$error_inicio_sesion</p>";
                }

                $conn->close();
                ?>
                
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario"> <br><br>
                <label for="contra">Contraseña:</label>
                <input type="password" name="contra" id="contra"> <br><br>
                <button type="submit">Iniciar sesión</button>
                <p><a href="registro.php">¿No tienes cuenta? Regístrate aquí</a></p>
                <p><a href="index.php">Volver a la página principal</a></p>
            </form>
        </section>




        
    </div>
</body>
</html>