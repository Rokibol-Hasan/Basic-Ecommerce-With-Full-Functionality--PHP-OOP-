<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");
include_once($filepath . "/../helpers/format.php");
?>
<?php

class Supplier
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function insertSupplier($data)
    {
        $supplierName = mysqli_real_escape_string($this->db->link, $data['supplierName']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $mail = $data['mail'];
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $msg = "<h6 class='error'>Invalid Mail</h6>";
            return $msg;
        }
        if ($supplierName == '' || $address == '' || $phone == '' || $mail == '') {
            $msg = "<h6 class='error'>Field Must Not Be Empty</h6>";
            return $msg;
        } else {
            $getSupplier = $this->getAllSupplier();
            $row = mysqli_fetch_array($getSupplier);
            $insertedName = $row['supplierName'];
            $insertedMail = $row['mail'];
            if ($supplierName == $insertedName || $mail == $insertedMail) {
                $msg = "<h6 class='error'>Vendor Already Added</h6>";
                return $msg;
            } elseif (empty($supplierName)) {
            } else {
                $query = "INSERT INTO tbl_supplier(supplierName,address,phone,mail)VALUES ('$supplierName','$address','$phone','$mail')";
                $insertSupplier = $this->db->insert($query);
                if ($insertSupplier) {
                    $msg = "<h6 class='success'>Supplier Inserted Successfully</h6>";
                    return $msg;
                } else {
                    $msg = "<h6 class='error'>Supplier Not Inserted!!</h6>";
                    return $msg;
                }
            }
        }
    }
    public function getAllSupplier()
    {
        $query = "SELECT * FROM tbl_supplier ORDER BY supplierId DESC";
        $getSupplier = $this->db->select($query);
        return $getSupplier;
    }

    public function deleteSupplierById($id)
    {
        $query = "DELETE FROM tbl_supplier WHERE supplierId = $id";
        $deleteSupplier = $this->db->delete($query);
        if ($deleteSupplier) {
            $msg = "<h6 class='success'>Supplier Deleted Successfully</h6>";
            return $msg;
        } else {
            $msg = "<h6 class='error'>Supplier Not Deleted!!</h6>";
            return $msg;
        }
    }

    public function insertUom($data)
    {
        $shortCode = mysqli_real_escape_string($this->db->link, $data['shortCode']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);
        $relativeFactor = mysqli_real_escape_string($this->db->link, $data['rf']);
        if ($shortCode == '' || $description == '' || $relativeFactor == '') {
            $msg = "<h6 class='error'>Field Must Not Be Empty!!</h6>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_uom (shortCode,description,rf)VALUES('$shortCode','$description','$relativeFactor')";
            $insertUom = $this->db->insert($query);
            if ($insertUom) {
                $msg = "<h6 class='success'>UOM Added Successfully</h6>";
                return $msg;
            } else {
                $msg = "<h6 class='error'>UOM Not Added!!</h6>";
                return $msg;
            }
        }
    }
    public function getAllUom()
    {
        $query = "SELECT * FROM tbl_uom ORDER BY uomId DESC";
        $getAllUom = $this->db->select($query);
        return $getAllUom;
    }
    public function delUomById($id)
    {
        $query = "DELETE FROM tbl_uom WHERE uomId = '$id'";
        $delUom = $this->db->delete($query);
        if ($delUom) {
            $msg = "<h6 class='success'>UOM Deleted Successfully</h6>";
            return $msg;
        } else {
            $msg = "<h6 class='error'>UOM Not Deleted!!</h6>";
            return $msg;
        }
    }
}



?>