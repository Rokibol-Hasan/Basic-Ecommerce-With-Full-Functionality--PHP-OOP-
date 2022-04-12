<?php
include "inc/header.php";
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf;
$dompdf->loadhtml('asdfasdf');


// if (isset($_GET['oid'])) {
//     $id = $_GET['oid'];
//     $getOrder = $ct->getOrderById($id);
//     $getOrder = mysqli_fetch_array($getOrder);
//         $html = '<h1>'. $getOrder['price'].'</h1>';
    
// }
// $dompdf = new Dompdf();

?>