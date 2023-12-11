<?php
// Configuración de la conexión a la base de datos
$host = " mysql-nicolasv.alwaysdata.net";
$usuario = 'nicolasv';
$base_datos = 'user';

// Conectar a la base de datos
$conexion = new mysqli($host, $usuario, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error al conectar a la base de datos: ' . $conexion->connect_error);
}
echo 'Conexión exitosa a la base de datos';

// Obtener los valores del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena=$_POST['contrasena'];
    $apellido=$_POST['apellido'];
    $AD_Inf=$_POST['AD_Inf']

    // Verificar si los campos están vacíos
    if (empty($nombre) || empty($correo)) {
        echo 'Por favor, completa todos los campos obligatorios.';
    } else {
        // Agregar usuario a la base de datos
        $stmt = $conexion->prepare('INSERT INTO usuario (nombre, correo, contrasena, apellido, AD_Inf) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sss', $nombre, $correo);

        if ($stmt->execute()) {
            echo 'Usuario agregado con éxito. ID: ' . $stmt->insert_id;
        } else {
            echo 'Error al agregar usuario: ' . $stmt->error;
        }

        $stmt->close();
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

