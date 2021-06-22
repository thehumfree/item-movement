<?php
    include("includes/head.php");
?>

        <!-- Begin Page Content -->
        <div class="container">

        <div class="row">
<div class="col-md-12">
         <table id="mytable" class="table table-striped table-hover table-sm">
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
       </tr>

    </thead>
    <tbody>
<?php
    $query = "SELECT * FROM material_movement";
    $sql=$conn->query($query);
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            $id = $row["id"];
            $matid = $row["material_id"];
            $mattype=$row["material_type"];
            $proname=$row["product_name"];
            $proserial=$row["product_serial"];
            $curlocation=$row["current_location"];
            $deslocation=$row["device_destination"];
            $authby=$row["authorised_by"];
            $assto=$row["assigned_to"];
            $date = $row["movement_date"];
            $mattypeother=$row["material_type_other"];
            $curlocationother = $row["current_location_other"];
            $deslocationother= $row["destination_location_other"];
            if($mattype==4){
                $matname = $mattypeother;
            }else{
                //displaying from another table
                $matquery="SELECT * FROM material_type WHERE id =$mattype";
                $matsql=$conn->query($matquery);
                while($row = $matsql->fetch_assoc()){
                    $matname=$row["material_type"];
                }
            }
            if($curlocation==3){
                 $clocname= $curlocationother;
            }else{
                //displaying from another table
                $clocquery="SELECT * FROM base_basestation WHERE id =$curlocation";
                $clocsql=$conn->query($clocquery);
                while($row = $clocsql->fetch_assoc()){
                    $clocname=$row["station_location"];
                }
            }
            if($deslocation==3){
                 $dlocname= $deslocationother;
            }else{
                //displaying from current location table
                $dlocquery="SELECT * FROM base_basestation WHERE id =$deslocation";
                $dlocsql=$conn->query($dlocquery);
                while($row = $dlocsql->fetch_assoc()){
                    $dlocname=$row["station_location"];
                }
            }
            ?>
        

        <tr>
            <td><?php echo $matid ?></td>
            <td><?php echo $matname ?></td>
            <td><?php echo $proname ?></td>
            <td><?php echo $proserial ?></td>
            <td><?php echo $clocname ?></td>
            <td><?php echo $dlocname ?></td>
            <td><?php echo $authby ?></td>
            <td><?php echo $assto ?></td>
            <td><?php echo $date ?></td>
        </tr>
   
        <?php }
    }

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
        responsive: true,
       
    });
} );
</script>
 <?php include("includes/foot.php"); ?>