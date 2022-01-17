<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Plans";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/plan.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
    
        <div class="sustain plan">
            <h1>Our Investment Plans</h1>
            <div class="container">
                <div class="left">
                </div>
                <div class="right">
                    <h1>Sustainable Investment Management</h1>
                    <p> Building a portfolio involves more than just choosing an investment plan to put money in. You have to consider your current financial situation and your goals. It’s also important to define your timeline and how much risk you’re willing to take on in order to determine your optimal asset allocation. </p>
                </div>
                
            </div>
        </div>
        
        <!-------------- Plans ----------->
      
        <?php include(ROOT_PATH . "/includes/plans.php"); ?>

      
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>