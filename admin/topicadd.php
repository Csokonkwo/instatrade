<?php 
include("../path.php");
include("server/topics.php");
include("server/server.php");

if($_SESSION['admin'] <= 2){
    header("location: index.php");
    exit();
}

$pageName = "Topic add";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body>
    <?php include("header.php"); ?>
    
    <!----------- Main section ---------------->
    
    <main>
    <div class="admin-content">
            <div class="button-group">
                <a href="topicadd.php" class="btn btn-big">Add topic</a>
                <a href="topics.php" class="btn btn-big">Manage topic</a>
            </div>
            
            <div class="form-container">
                <br>
                <h2 class="page-title">Add Topic</h2>
                <?php include("server/errors.php") ?>
                <form action="topicadd.php" method="post">
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value= "<?php echo $name; ?>" class="text-input">
                        
                         <label>Description</label>
                        <textarea name="description" id="body"><?php echo $description; ?></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" name="add_topic" class="btn btn-big">Add Topic</button>
                    </div>
                </form>
            </div>
        </div>

</main>
<?php include("footer.php"); ?>

    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="script.js"></script>