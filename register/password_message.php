<?php 
$pageName = 'Password Message';
include("../path.php");
require_once 'server.php'; 

if(isset($_GET['ref'])){
    $ref = $_GET['ref'];
}

else{
    $ref = 'N/A';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
        
<?php  include("head.php"); ?>

</head>

<body>
    
    <?php  include("../includes/header.php"); ?>

    <!-------------- Hero Section --------->
        
    <?php include(ROOT_PATH . "/includes/hero.php"); ?>


<div class="form">
           <div class="container">

                <p> A recovery email has been sent to your address</p> 
           </div>
           
           <div class="right"></div>
       </div>




    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>