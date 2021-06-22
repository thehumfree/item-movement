<?php
    include("includes/head.php");
?>

        <!-- Begin Page Content -->
        <div class="container">
<div class="row">
    <div class="col-md-12">

    <table id="mytable" class="table table-striped table-hover responsive" style="width:100%">
    <thead class="thead-dark">
       <tr>
        <th>Material Code</th>
        <th>Material Type</th>
        <th>Product Name</th>
        <th>Product Serial No</th>
        <th>Current Location</th>
        <th>Destination Location</th>
        <th>Authorised By</th>
        <th>Assigned To</th>
        <th>Date</th> 
        <th>Edit</th> 
        <th>Delete</th> 
       </tr>

    </thead>
    <tbody>
<?php
//preview items in an editable manner
editPage();
?>
    </tbody>
</table>
</div> 
    </div>
</div>


      <!-- End of Main Content -->
<script type="text/javascript">
    $(document).ready( function () {
    $('#mytable').DataTable({
        responsive: true
    });
} );
</script>
 <?php 
    if(isset($_GET["did"])){
        $did = $_GET["did"];
        $query = "DELETE FROM material_movement WHERE id ={$did}";
        $sqlDelete = $conn->query($query);
        header("Location:editPage.php");
    }
    include("includes/foot.php"); 
?>