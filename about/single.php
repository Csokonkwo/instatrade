<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Single";

if(isset($_GET['id'])){
    $single = selectOne('posts', ['id' => $_GET['id']]);
    $user = selectOne('users', ['id' => $single['user_id']]);
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
      
        <div class="terms">
                <h1><?php echo $single['title']; ?></h1>
            <div class="container">
                <div class="box">
                    <h3 style="text-transform: capitalize"><?php echo $user['username']; ?> • <?php echo date('F j, Y.', strtotime($single['created_at'])); ?></h3>
                    
                    <?php echo html_entity_decode($single['body']); ?>
                    
                </div>
                
            </div>
        </div>
      
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>