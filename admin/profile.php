<?php 
    include("includes/head.php"); 
    $pid = $_SESSION["id"];
    $uquery = "SELECT * FROM users WHERE id = $pid";
    $user = $conn->query($uquery);
    if($user->num_rows > 0){
        while($row = $user->fetch_assoc()){
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $email = $row["email"];
            $role = $row["role"];
        }
    }

    //updating profile
    if(isset($_POST["update"]) || !empty($_POST["update"])){
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $role=ucfirst($_POST["role"]);
        $update_query = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email', role='$role' WHERE id = $pid";
        $sql = $conn->query($update_query);
        if($sql){
            
               $_SESSION["fname"] = $fname;
               $_SESSION["lname"] = $lname;
               $_SESSION["role"] = $role;
               $_SESSION["email"] = $email;
               header("Location:profile.php");
                
        }
    }
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3"> 
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
            <form class="row" action="" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" name="fname" value="<?php echo $fname; ?>" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" name="lname" value="<?php echo $lname; ?>" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email" name="email" value="<?php echo $email; ?>" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Role</label>
                        <input class="form-control" type="text" name="role" id="account-phone" value="<?php echo $role; ?>" required="">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        
                        <button class="btn btn-style-1 btn-dark" type="submit" name="update" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/foot.php"); ?>