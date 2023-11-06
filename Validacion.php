<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se ha enviado un formulario POST

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $codigo_seguridad = $_POST['codigo_seguridad'];
    $monto = $_POST['monto'];
    if ($transaccion_exitosa) {
        // La transacción se realizó con éxito, puedes realizar acciones adicionales aquí si es necesario.
        echo "La transacción se ha procesado con éxito. ¡Gracias por su compra!";
    } else {
        // La transacción falló, puedes manejar errores y notificar al usuario.
        echo "Lo sentimos, la transacción ha fallado. Por favor, inténtelo de nuevo.";
    }
    // Función para validar el número de tarjeta utilizando el algoritmo de Luhn
    function validarNumeroTarjeta($numero_tarjeta) {
        // Eliminar espacios en blanco y guiones (si los hay)
        $numero_tarjeta = str_replace([' ', '-'], '', $numero_tarjeta);

        // Invertir el número de tarjeta
        $numero_tarjeta = strrev($numero_tarjeta);

        // Inicializar la suma total
        $total = 0;

        // Recorrer cada dígito de la tarjeta
        for ($i = 0, $j = strlen($numero_tarjeta); $i < $j; $i++) {
            $digito = (int)$numero_tarjeta[$i];

            // Si el índice es impar, duplicar el dígito
            if ($i % 2 == 1) {
                $digito *= 2;

                // Si el resultado es mayor que 9, restar 9
                if ($digito > 9) {
                    $digito -= 9;
                }
            }

            // Sumar el dígito a la suma total
            $total += $digito;
        }

        // La tarjeta es válida si la suma total es un múltiplo de 10
        return ($total % 10 == 0);
    }
    if (validarNumeroTarjeta($numero_tarjeta)) {
        // Mostrar una ventana emergente con un mensaje
        echo "<script>
            alert('La transacción se ha procesado con éxito. ¡Gracias por su compra!');
            window.location.href = 'otra_pagina.php'; // Redirigir a otra página
        </script>";
    } else {
        // El número de tarjeta no es válido
        echo "El número de tarjeta no es válido. Por favor, inténtelo de nuevo.";
    }
} else {
    // Si no se recibe una solicitud POST, redirigir o mostrar un mensaje de error.
    echo "No se ha enviado un formulario válido.";
}
?>

