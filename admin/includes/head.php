<?php 
    session_start();
    ob_start();
    include("db.php");
    include_once("functions.php");
if(!$_SESSION["id"]){
    header("Location:../login.php");
}else{
   $activePage = basename($_SERVER['PHP_SELF'], ".php"); 
}
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HOOP TELECOMS</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/hubspot.ico" />
    
  <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="../addons/fontawesome-free/css/all.css" />
    <script type="text/javascript" src="../addons/fontawesome-free/js/all.js"></script>
    
    
  <!-- Start of datatable css and javascript -->
    <script type="text/javascript" src="../addons/datatables.js"></script> 
    <link rel="stylesheet" href="../addons/datatables.css" />
  <!-- End datatable css and javascript --> 
    
  <!-- Start of bootstrap css and javascript -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- End of datatable css and javascript -->  
    <!-- Adds the css if page is homepage -->
<link rel="stylesheet" type="text/css" href="<?= ($activePage == 'index') ? '../css/anime.css' : '' ?>" />
 

<style>
    
    body{
        padding-top: 4.5rem;
        
    }
</style>

    
    <script type="text/javascript">
    $(document).ready(function () {
        /* for the material type(mouse hover and click for other input*/
        $("#material").on({
            mouseenter:
            (function () {
            if ($(this).val() == 4) {
                $("#matother").show();
            } else {
                $("#matother").hide();
            }
        }),
            click:
            (function () {
            if ($(this).val() == 4) {
                $("#matother").show();
            } else {
                $("#matother").hide();
            }
        })});
        /* for the current location (mouse hover and click for other input*/
        $("#curloc").on({
            mouseenter:
            (function () {
            if ($(this).val() == 3) {
                $("#curlother").show();
            } else {
                $("#curlother").hide();
            }
        }),
            click:
            (function () {
            if ($(this).val() == 3) {
                $("#curlother").show();
            } else {
                $("#curlother").hide();
            }
        })});
        /* for the destination location (mouse hover and click for other input*/
        $("#desloc").on({
            mouseenter:
            (function () {
            if ($(this).val() == 3) {
                $("#deslother").show();
            } else {
                $("#deslother").hide();
            }
        }),
            click:
            (function () {
            if ($(this).val() == 3) {
                $("#deslother").show();
            } else {
                $("#deslother").hide();
            }
        })});
        
    });
</script>
      <style type="text/css">
          #matother{
              display: none;
          }
          #curlother{
              display: none;
          }
          #deslother{
              display: none;
          }
          
        </style>
</head>
<body>

<?php include("nav.php"); 
?>
      