<?php
session_start();

// Verificar si el usuario ha confirmado que desea vaciar el carrito
if (isset($_POST['confirmar_vaciar_carrito'])) {
    // Vaciar carrito
    
    session_unset();
    
}
session_destroy();
// Redirigir al usuario de vuelta al carrito
header('Location: index.php');
exit;
?>