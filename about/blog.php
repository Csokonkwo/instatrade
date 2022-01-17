<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Blog";

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
            <h1>Recent Posts</h1>
            <div class="container">
            <?php $news = selectStaz('news', 20 , ['published' => 1]); 
                foreach($news as $new):
                ?>
                <div class="box">
                    <div class="content">
                        <h2><a href="<?php echo BASE_URL . '/about/read_blog.php?id=' ?> <?php echo $new['id'] ?> "><?php echo $new['title'] ?></a></h2>
                        
                        <p><?php echo html_entity_decode(substr($new['body'], 0, 60). '...'); ?></p>

                        <span style="text-transform: capitalize"><?php echo $new['username'] ?> • <?php echo date('F j, Y.', strtotime($new['created_at'])); ?></span>
                    </div>

                    <img src="<?php echo BASE_URL . '/admin/blog/'. $new['image']; ?>">
                </div>
                
                <?php endforeach; ?>
            </div>
        </div>
      
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>