<?php
session_start();
require('fpdf185/fpdf.php');

// Se verifica si la matriz 'carrito' está definida
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

    // Se inicializa la instancia de FPDF
    $pdf = new FPDF();
    // Se agrega una página al documento
    $pdf->AddPage();

// Se agrega contenido a la página
   $pdf->SetFont('Arial', 'B',16);
   $pdf->Cell(150, 10, 'Carrito de Compras');
   $pdf->Ln();
   $pdf->Cell(100, 10,'Producto',1);
   $pdf->Cell(30,10,'Precio',1);
   $pdf->Cell(30,10,'cantidad',1);
   $pdf->Cell(30,10,'Subtotal',1);
   $pdf->Ln();
   $total=0;
    // Se recorren los elementos de la matriz 'carrito'
    foreach ($_SESSION['carrito'] as $producto) {
        // Se agregan los datos del producto al PDF
       $subtotal = $producto['price'] * $producto['cantidad'];
        $total += $subtotal;
        $pdf->Cell(100, 15,$producto['name'], 1  );
        $pdf->Cell(30, 15,' $' .$producto['price'], 1);
        $pdf->Cell(30, 15, '  '.$producto['cantidad'], 1);
        $pdf->Cell(30,15,' $' .number_format($subtotal, 2),1);
        $pdf->Ln();
    }
    $pdf->Cell(160,10,'Total:',0,0,'R');
    $pdf->Cell(40,10,' $' .number_format($total, 2));
    // Se genera el PDF
    // $dir ='C:\wamp64\www\LIS_Theory\Lenguages-Interprestados-en-el-Servidor\BackEnd_TheoryExercises\
    // Trabajo_de_Investigacion_\Investigacion\Investigacion\PDFs';
    // $filename = "Reporte.pdf";
    // $pdf->Output($dir.$filename);

    $pdf->Output();
//  send_email($pdf);
} else {
    // Si la matriz 'carrito' no está definida o está vacía, se muestra un mensaje de error
    echo "No se encontraron productos en el carrito.";
}

//  function send_email($file) {
//     $from_email = 'sender@abc.com'; //Ya configurado en la perte de ficheros de email.
//      $recipient_email = $_POST['recipient_email'];
//      $subject = 'Reporte de Compra de verduras';
//      mail($recipient_email, $subject, $file);
//  }
echo '</body>';
echo '</html>';

?>