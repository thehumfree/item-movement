<?php
include("db.php");
    //login system function
    function login($email, $password){
        global $conn;
        $email = trim($email);
        $password = trim($password);
        $query ="SELECT * FROM users WHERE email = '$email'";
        $sql= $conn->query($query);
        if($sql->num_rows > 0){
            $row = $sql->fetch_assoc();
            $verify = password_verify($password, $row["user_password"]);
            if($verify){
                $_SESSION["id"] = $row["id"];
                $_SESSION["fname"] = $row["first_name"];
                $_SESSION["lname"] = $row["last_name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role"];
                if($_SESSION["role"] == "Admin"){
                    header("Location:admin/index.php");
                }else{
                    header("Location:users/index.php");
                }
                   
            }else{
                echo "<script type='text/javascript'>
                    alert('Wrong Password!!');
                    window.location.href = 'login.php';
                </script>";
            }
              
        }else{
            $_SESSION["id"] = false;
            echo "<script type='text/javascript'>
                    alert('Login was not successful! No user found');
                </script>";
        }
        
    }

    //register a new user account 
    function registerUser($first, $last, $email, $password, $role){
        global $conn;
        $first = $conn->real_escape_string($first);
        $last = $conn->real_escape_string($last);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $role = $role;
        
        //checks if user exist using the email
        $check = "SELECT * FROM users WHERE email = '$email'";
        $sqlcheck = $conn->query($check);
        
        //if user exist, echo message and redirect back to register page
        if($sqlcheck->num_rows >0){
            echo "<script type='text/javascript'>
                    alert('Email Address already exist!');
                    window.location.href = 'register.php';
                </script>";
        }else{
            //if user doesnt exist carry on with registration
            $query ="INSERT INTO users(first_name, last_name, email, user_password, role) ";
            $query.="VALUE('$first', '$last', '$email', '$hashpassword', '$role')";
            $sql= $conn->query($query);
            if($sql){
                echo "<script type='text/javascript'>
                    alert('Registration was successful! press ok to be redirected to login page');
                    window.location.href = 'login.php';
                    </script>"; 
            }else{
                header("Location:./register.php");
            } 
        }
        
    }


  
    //create an item
    function createItem($matcode){
        global $conn;
        $matcode = $matcode;
        $check_query ="SELECT * FROM material_movement WHERE material_id ='$matcode' LIMIT 1";
        $check = $conn->query($check_query);
        if($check->num_rows >0){
            $message="Material Code already exist";
        }else{
            $materialtype= $_POST['mtype'];
            if($materialtype=="4"){
                $materialtypeother=$_POST["mtype_other"];
            }else{
                $materialtypeother="";
            }

            $productname= $_POST["pname"];

            $productserial= $_POST["pserial"];

            $materiallocation= "1";

            $materiallocationother="";

            $materialdestination= "1";

            $materialdestinationother="";

            $authorisedby= $_POST["authby"];

            $assignedto= $_POST["assto"];

            $dateofmovement= $_POST["dom"];
            $query ="INSERT into material_movement ";
            $query.="(material_id, material_type, product_name, product_serial, current_location, device_destination, authorised_by, assigned_to, movement_date, material_type_other, current_location_other, destination_location_other) ";
            $query.="VALUES ('$matcode','$materialtype', '$productname', '$productserial', '$materiallocation', '$materialdestination', '$authorisedby', '$assignedto', '$dateofmovement', '$materialtypeother', '$materiallocationother', '$materialdestinationother')";

            $insert=$conn->query($query);
            if(!$insert){
                die("failed insert".$conn->error);
            }else{
                #header("Location:./preview.php");
            } 
        }
    }

    //editing page retrieval from database
    function editPage(){
        global $conn;
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
                echo "<tr>
                        <td>$matid</td>
                        <td>$matname</td>
                        <td>$proname</td>
                        <td>$proserial</td>
                        <td>$clocname</td>
                        <td>$dlocname</td>
                        <td>$authby</td>
                        <td>$assto</td>
                        <td>$date</td>
                        <td><a href='./editDevice.php?eid=$id'><i class='far fa-edit'></i></a></td>
                        <td><a href='./editPage.php?did=$id'><i class='far fa-trash-alt'></i></a></td>
                    </tr>";
            }
            
        }
    }

    //Editing individual item from edit button
    function editDevice($id){
        global $conn;
        $id = $id;
        $query = "SELECT * FROM material_movement WHERE id = $id";
        $sql=$conn->query($query);
        if($sql->num_rows>0){
            while($row = $sql->fetch_assoc()){
                $id = $row["id"];
                global $matcode;
                global $mattype;
                global $proname;
                global $proserial;
                global $curlocation;
                global $deslocation;
                global $authby;
                global $assto;
                global $date;
                global $matother;
                global $curlother;
                global $desother;
                global $matalt;
                global $curlalt;
                global $desalt;
                $matcode= $row["material_id"];
                $mattype=$row["material_type"];
                $proname=$row["product_name"];
                $proserial=$row["product_serial"];
                $curlocation=$row["current_location"];
                $deslocation=$row["device_destination"];
                $authby=$row["authorised_by"];
                $assto=$row["assigned_to"];
                $date = $row["movement_date"]; 
                $matother=$row["material_type_other"];
                $curlother = $row["current_location_other"];
                $desother = $row["destination_location_other"];
                if($mattype==4){
                    $matalt=$matother;
                }else{
                    $matalt="";
                }
                if($curlocation==3){
                    $curlalt=$curlother;
                }else{
                    $curlalt="";
                }
                if($deslocation==3){
                    $desalt=$desother;
                }else{
                    $desalt="";
                }
            }
        }
    }

    //update individual item
    function updateDevice($id){
        global $conn;
        $id = $id;
        $materialtype=$_POST["mtype"];
        if($materialtype=="4"){
            $materialtypeother=$_POST["mtype_other"];
        }else{
            $materialtypeother="";
        }
        $productname= $_POST["pname"];
        $productserial= $_POST["pserial"];
        $materiallocation= $_POST["mloc"];
        if($materiallocation=="3"){
            $materiallocationother=$_POST["mloc_other"];
        }else{
            $materiallocationother="";
        }
        $materialdestination= $_POST["mdes"];
        if($materialdestination=="3"){
            $materialdestinationother=$_POST["mdes_other"];
        }else{
            $materialdestinationother="";
        }
        $authorisedby= $_POST["authby"];
        $assignedto= $_POST["assto"];
        $dateofmovement= $_POST["dom"];
    //update query to sql
        $query="UPDATE material_movement SET ";
        $query.="material_type='$materialtype', ";
        $query.="product_name='$productname', ";
        $query.="product_serial='$productserial', ";
        $query.="current_location='$materiallocation', ";
        $query.="device_destination='$materialdestination', ";
        $query.="authorised_by='$authorisedby', ";
        $query.="assigned_to='$assignedto', ";
        $query.="movement_date='$dateofmovement', ";
        $query.="material_type_other='$materialtypeother', ";
        $query.="current_location_other='$materiallocationother', ";
        $query.="destination_location_other='$materialdestinationother' ";
        $query.="WHERE id = $id";
        $sql = $conn->query($query);
        if($sql){
            header("Location:./editPage.php");
        }
    }
?>