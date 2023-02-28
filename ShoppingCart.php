<?php

echo '<html>';
echo '<head>';
echo '<style>';
echo '  .imagen {';
echo '    width: 200px;';
echo '     height: 80px;';
echo '  }';
echo 'th {';
echo 'background-color: #333;';
echo 'color: #fff;';
echo 'border: 2px solid #000;';
echo 'width: 200px;';
echo 'height: 50px;';
echo '  }';
echo 'td {';
echo 'background-color: #333;';
echo 'color: white;';
echo 'border: 2px solid #000;';
echo 'width: 200px;';
echo 'height: 80px;';
echo '  }';
echo '</style>';
echo '</head>';
echo '<body>';


session_start(); // Iniciar la sesión

// Mostrar los productos en el carrito en una tabla
echo "<table>";
echo "<tr><th>Imagen</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th></tr>";
$total = 0;
if (!empty($_SESSION['carrito'])) {
 
    foreach ($_SESSION['carrito'] as $producto) {
       
      
        $subtotal = $producto['price'] * $producto['cantidad'];
        echo "<tr>";
      
       echo "<td><img src=" . $producto['img_url'] ." alt='Imagen' class='imagen'></td>";
       
        echo "<td>" . $producto['name'] . "</td>";
        echo "<td>$".$producto['price']."</td>";
        echo "<td>{$producto['cantidad']}</td>";
        echo "<td>$".$subtotal."</td>";
        echo "</tr>";
        $total += $subtotal;
    }

}
echo "</table>";

// Mostrar el total de la compra

echo "<h1>Total:$ ".$total."</h1>";

// Mostrar un botón para vaciar el carrito
echo "<form method='post' action='deletecart.php'>";
echo "<input type='submit' value='Vaciar carrito'>";
echo "</form>";
echo "<form method='post' action='pdf.php'>";
echo "<input type='submit' value='Generar PDF'>";
echo "</form>";
echo "<form method='post' action='handlingFormData.php'>";
echo "<input type='submit' value='Enviar Reporte Correo.'>";
echo "</form>";
echo "<form method='post' action='index.php'>";
echo "<input type='submit' value='Regresar'>";
echo "</form>";
echo '</body>';
echo '</html>';
?>