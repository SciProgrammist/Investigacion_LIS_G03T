<!DOCTYPE html>
<!--Vegetables store for the pictures and eveything else you might want to know about them-->
<!--https://www.greenlanedelivery.com/products/yellow-potatoes-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Report Generator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <section>
     <?php

     

      // Página que muestra los productos disponibles
session_start(); // Iniciar la sesión

// Cargar los datos de los productos desde un archivo XML
$productos = simplexml_load_file("products.xml");


echo "<form method='post' action='ShoppingCart.php'>";
echo "<input type='submit' value='Mostrar Carrito'>";
echo "</form>";
// Mostrar los productos en una tabla
echo "<table>";
echo "<th>Imagen</th><th>Producto</th><th>Precio</th><th>Descripcion</th>";
foreach ($productos as $producto) {
    $url = $producto-> img_url;
    echo "<tr>";
    echo "<td><img src='{$url}'></td>";
    echo "<td>{$producto->name}</td>";
    echo "<td>$".$producto->price."</td>";
    echo "<td>{$producto->description}</td>";
    echo "<td><form method='post' action='AddCart.php'>";
    echo "<input type='hidden' name='id' value='{$producto->id}'>";
    echo "<input type='hidden' name='img_url' value='{$producto->img_url}'>";
    echo "<input type='hidden' name='name' value='{$producto->name}'>";
    echo "<input type='hidden' name='description' value='{$producto->description}'>";
    echo "<input type='hidden' name='price' value='{$producto->price}'>";
    echo "<input type='submit' value='Agregar al carrito'>";
    echo "</form></td>";
    echo "</tr>";
}
echo "</table>";
     ?>
     </secition>
    </body>
</html>