<?php
$filepath = realpath(dirname(__FILE__));
include "../classes/supplier.php";
$supplier = new Supplier();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $insertStock = $supplier->uomIdSuggestion($search);
}