<?php
// Configuración de la conexión a la base de datos
$servername = " mysql-nicolasv.alwaysdata.net";
$username = "nicolasv";
$dbname = "user";

// Crear conexión
$conn = new mysqli($servername, $username, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consultar la base de datos para verificar el usuario
    $sql = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    // Verificar si se encontró un usuario
    if ($result->num_rows > 0) {
        echo "Inicio de sesión exitoso";
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}

// Cerrar la conexión
$conn->close();
?>

<section class="iniciarsesion" id="iniciarsesion"> 
    <h1 class="heading">Iniciar Sesión</h1>
    
    <div class="row">
        <div class="form-container">
            <form method="post" action="">
                <input type="email" name="correo" placeholder="Correo">
                <input type="password" name="contrasena" placeholder="Contraseña">
                <input type="submit" value="Confirmar">
            </form>
        </div>
    </div>
</section>
