<?php include "inc/header.php"; ?>
<?php
$login = Session::get("customerLogin");
if ($login == false) {
    header("Location:login.php");
}
?>
<div class="main">
    <div class="content">
        <div class="section group order-table">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Start date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>2011/04/25</td>
                        <td>
                            <input class="btn btn-primary" type="submit" value="Processing">
                            <input class="btn btn-primary" type="submit" value="Completed">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include "inc/footer.php"; ?>