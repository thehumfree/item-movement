<?php

    include("includes/head.php");
    
?>
<?php
//To register item into database
    $message = "";
    if(isset($_POST["register"])){
        createItem($_POST["matcode"]); 
    }
        
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Register Device</h1>
          </div>

            <div class="col"> 
                <?php echo $message ?>
            <form role="form" action="" method="post">
                <div class="form-row">
                    <!--first field -->
                    <div class="form-group col-md-6">
                        <label><b>Item Code</b></label>
                        <input type="text" class="form-control col-7" name="matcode" required/>
                    </div>
                    <!--second field-->
                    <div class="form-group col-md-6">
                        <label><b>Product Name</b></label>
                        <input type="text" class="form-control col-7" name="pname" required/>
                    </div>
                    <!--third field-->
                    <div class="form-group col-md-6">
                        <label><b>Product Serial Number</b></label>
                        <input type="text" class="form-control col-7" name="pserial" required/>
                    </div>
                </div><br />
                <div class="form-row">
                    <!--third field-->
                    <div class="form-group col-md-6">
                        <label><b>Material Type</b></label>
                        <!--picking data as select option from database -->
                     
                        <select class="form-control col-3" name="mtype" id="material" required>
                        <?php
                            $query="SELECT * FROM material_type";
                            $sql=$conn->query($query);
                            if($sql->num_rows>0){
                                while($row = $sql->fetch_assoc()){
                                    $id = $row["id"];
                                    $mattype= $row["material_type"];
                                    echo"<option value='$id'>$mattype</option>";
                                }
                            }
                        ?>
                        </select><br />
                    
                        <div class="mtog"  id="matother">
                            <span><i>Specify the Material Type</i></span>
                            <input type="text" name="mtype_other" class="form-control col-7" />
                        </div>
                        
                    </div>
                    
                    <!--fifth field-->
                    <div class="form-group col-md-6">
                        <label><b>Authorised By*</b></label>
                        <input type="text" class="form-control col-7" name="authby" required/>
                    </div>
                </div><br />
                <div class="form-row">
                    <!--fifth field-->
                    <div class="form-group col-md-6">
                        <label><b>Assigned To*</b></label>
                        <input type="text" class="form-control col-7" name="assto" required/>
                    </div>
                    <!--sixth field-->
                    <div class="form-group col-md-6">
                        <label><b>Date of Movement*</b></label>
                        <input type="date" class="form-control col-7" name="dom" required/>
                    </div>
                </div><br /><br />
                <div class="d-flex justify-content-center">
                    <input type="submit" name="register" class="btn btn-success" />
                </div>
    
        </form>
    </div>
</div>

      
      <!-- End of Main Content -->

 <?php include("includes/foot.php"); ?>

