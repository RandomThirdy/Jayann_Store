<?php
require_once('components/connect.php');
require_once('libs/fpdf.php');  

if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);

    $get_order = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $get_order->execute([$order_id]);

    if ($get_order->rowCount() > 0) {
        $order = $get_order->fetch(PDO::FETCH_ASSOC);

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Courier', 'B', 20);
        $pdf->Cell(0, 10, 'Jayann Store', 0, 1, 'C');
        
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(0, 10, 'Sapang I, Ternate, Cavite', 0, 1, 'C');
        $pdf->Cell(0, 10, 'contact@jayannstore.com', 0, 1, 'C');
        $pdf->Cell(0, 10, '+63 912 345 6789', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Courier', 'B', 16);
        $pdf->Cell(0, 10, 'Order Receipt', 0, 1, 'C');
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); 
        $pdf->Ln(5);

        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(0, 10, 'Customer Information', 0, 1, 'L');
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(0, 10, 'Name: ' . $order['name'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Email: ' . $order['email'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Address: ' . $order['address'], 0, 1, 'L');
        $pdf->Ln(5);

        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(5);
        $max_width = 190;
        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(0, 10, 'Order Summary', 0, 1, 'L');
        $pdf->SetFont('Courier', '', 12);
        $product_info = 'Total Products: ' . $order['total_products'];  
        $pdf->MultiCell($max_width, 10, $product_info, 0, 'L');
        $pdf->Cell(0, 10, 'Total Price: Php ' . number_format($order['total_price'], 2), 0, 1, 'L');
        $pdf->Cell(0, 10, 'Payment Method: ' . $order['method'], 0, 1, 'L');
        $pdf->Cell(0, 10, 'Order Date: ' . $order['placed_on'], 0, 1, 'L');
        $pdf->Ln(5);

        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(5);

        $pdf->SetFont('Courier', 'I', 14);
        $pdf->Cell(0, 10, 'Thank you for your purchase!', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->Output('D', 'receipt_' . $order['id'] . '.pdf');
    } else {
        echo "Order not found!";
    }
} else {
    echo "Invalid request!";
}
?>
