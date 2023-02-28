<?php

session_start(); // Iniciar la sesión

// Obtener los datos del producto seleccionado
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$url = $_POST['img_url'];

// Verificar si el producto ya está en el carrito
if (isset($_SESSION['carrito'][$id])) {
    // Si el producto ya está en el carrito, incrementar la cantidad
    $_SESSION['carrito'][$id]['cantidad']++;
} else {
    // Si el producto no está en el carrito, agregarlo con una cantidad de 1
    $_SESSION['carrito'][$id] = array(
        'id' => $id,
        'name' => $name,
        'img_url' => $url,
        'price' => $price,
        'description' => $description,
        'cantidad' => 1
    );
}

// Redirigir al usuario de vuelta a la página de productos
header("Location: index.php");

exit;



?>
