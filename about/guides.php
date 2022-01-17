<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Financial Guides";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/blog.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
    
        <div class="blog">
            <h1>Recent Articles</h1>
            <div class="container">
                <div class="box">
                    <div class="content">
                        <h2><a href="">Athletes disqualification: Administration were busy fighting over power, says Okagbare</a></h2>

                        <p>Athletes disqualification: Administration were busy fighting over power, says Okagbare</p>

                        <span>Admin . 23 July, 2021</span>
                    </div>

                    <img src="<?php echo BASE_URL . '/admin/blog/blog.jpg' ?>">
                </div>
                
                <div class="box">
                    <div class="content">
                        <h2><a href="">Athletes disqualification: Administration were busy fighting over power, says Okagbare</a></h2>

                        <p>Athletes disqualification: Administration were busy fighting over power, says Okagbare</p>

                        <span>Admin . 23 July, 2021</span>
                    </div>

                    <img src="<?php echo BASE_URL . '/admin/blog/blog.jpg' ?>">
                </div>
            </div>
        </div>
      
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>