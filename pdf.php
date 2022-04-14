<?php
include 'classes/cart.php';
require 'vendor/autoload.php';
$ct = new Cart;

use Dompdf\Dompdf;

if (isset($_GET['oid'])) {
    $id = $_GET['oid'];
    $getOrder = $ct->getOrderById($id)->fetch_assoc();

    $html = '<!DOCTYPE html>
<html>
<style>
thead{
    text-align:center;
}

</style>
<body>
<table>
<thead>
<tr>
<td>Price</td>
</tr>
</thead>
<tbody>
<tr>
<td><h1>' . $getOrder['price'] . '</h1></td>
</tr>
</tbody>
</table>
</body>
</html>';
}
$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf');
