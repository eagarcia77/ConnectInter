
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $user_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['mensaje']);

    // Configuración del correo
    $to = "eileen.rivera@guayama.inter.edu";
    $subject = "Soporte de CONNECT - Mensaje de un estudiante";
    $headers = "From: $user_email\r\n";
    $headers .= "Reply-To: $user_email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Mensaje enviado por: $user_email\n\n";
    $body .= "Mensaje:\n$message\n";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Hubo un problema al enviar el mensaje. Inténtalo de nuevo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
