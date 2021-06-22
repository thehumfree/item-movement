<?php
    include("includes/head.php");       
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Item</h1>
          </div>
        <?php
            //getting the data from database to display on editable form
            if(isset($_GET["eid"])){
                editDevice($_GET["eid"]);
            }
            
            //updating the edited item
            if(isset($_POST["update"])){
                updateDevice($_GET["eid"]);

            }

        ?>
            
            
            <div class="col"> 
            <form role="form" action="" method="post">
                <div class="form-row">
                    <!--first field -->
                    <div class="form-group col-md-6">
                        <label><b>Item Code</b></label>
                        <input type="text" class="form-control col-7" name="matcode" value="<?php echo $matcode; ?>" disabled/>
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Product Name</b></label>
                        <input type="text" class="form-control col-7" name="pname" value="<?php echo $proname ?>" required/>
                    </div>
                    <!--second field-->
                    <div class="form-group col-md-6">
                        <label><b>Product Serial Number</b></label>
                        <input type="text" class="form-control col-7" name="pserial" value="<?php echo $proserial ?>" required/>
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
                                    $mid = $row["id"];
                                    $matname= $row["material_type"];
                             ?>       
                                <option value="<?php  echo $mid; ?>" <?php if($mid==$mattype){echo "selected";} ?>><?php echo $matname;?></option>    
                                <?php }
                            }
                        ?>
                        </select><br />
                    
                        <div class="mtog"  id="matother">
                            <span><i>Specify the Material Type</i></span>
                            <input type="text" name="mtype_other" class="form-control col-7" value="<?php echo $matalt; ?>"/>
                        </div>
                    </div>
                    <!--fourth field-->
                    <div class="form-group col-md-6">
                        <label><b>Current Location*</b></label>
                        <!--picking data as select option from database -->
                        <select class="form-control col-2" name="mloc" id="curloc" required>
                        <?php
                            $query="SELECT * FROM base_basestation";
                            $sql=$conn->query($query);
                            if($sql->num_rows>0){
                                while($row = $sql->fetch_assoc()){
                                    $mid = $row["id"];
                                    $location= $row["station_location"];
                                    ?>       
                                <option value="<?php echo $mid; ?>" <?php if($mid==$curlocation){echo "selected";} ?>><?php echo $location;?></option>    
                                <?php }
                            }
                        ?>
                        </select><br />
                        <div id="curlother">
                            <span><i>Specify the Current Location</i></span>
                            <input type="text" name="mloc_other" class="form-control col-7" value="<?php echo $curlalt; ?>"/>
                        </div>
                    </div>
                </div><br />
                <div class="form-row">  
                    <!--fifth field -->
                    <div class="form-group col-md-6">
                        <label><b>Device Destination*</b></label>
                        <!--picking data as select option from database -->
                        <select class="form-control col-2" name="mdes" id="desloc" required>
                            <?php
                                $query="SELECT * FROM base_basestation";
                                $sql=$conn->query($query);
                                if($sql->num_rows>0){
                                    while($row = $sql->fetch_assoc()){
                                        $mid = $row["id"];
                                        $location= $row["station_location"];
                                       ?>       
                                    <option value="<?php echo $mid; ?>" <?php if($mid==$deslocation){echo "selected";} ?>><?php echo $location;?></option>    
                                    <?php }
                                }
                            ?>
                        </select><br />
                        <div id="deslother">
                            <span><i>Specify the Destination Location</i></span>
                            <input type="text" name="mdes_other" class="form-control col-7" value="<?php echo $desalt; ?>"/>
                        </div>
                    </div>
                    <!--sixth field-->
                    <div class="form-group col-md-6">
                        <label><b>Authorised By*</b></label>
                        <input type="text" class="form-control col-7" name="authby"  value="<?php echo $authby ?>" required/>
                    </div>
                </div><br />
                <div class="form-row">
                    <!--seventh field-->
                    <div class="form-group col-md-6">
                        <label><b>Assigned To*</b></label>
                        <input type="text" class="form-control col-7" name="assto"  value="<?php echo $assto ?>" required/>
                    </div>
                    <!--eighth field-->
                    <div class="form-group col-md-6">
                        <label><b>Date of Movement*</b></label>
                        <input type="date" class="form-control col-7" name="dom" value="<?php echo $date ?>" required/>
                    </div>
                </div><br /><br />
                <div class="d-flex justify-content-center">
                    <input type="submit" name="update" class="btn btn-success" />
                </div>
    
        </form>
    </div>  
          

      </div>
      <!-- End of Main Content -->

 <?php include("includes/foot.php"); ?>

