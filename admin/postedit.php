<?php 
include("../path.php");
include("server/posts.php");
include("server/server.php");
$pageName = "Post Edit";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
    <link rel="stylesheet" href="css/form.css">
    
</head>
<body>
    <?php include("header.php") ?>
    <main>
        
        <div class="admin-content">
            <div class="button-group">
                <a href="postadd.php" class="btn btn-big">Add post</a>
                <a href="index.php" class="btn btn-big">Manage post</a>
            </div>
            
            <div class="form-container">
                <br>
                <h2 class="page-title">Edit post</h2>
                <?php include("server/errors.php") ?>
                <form action="postedit.php" method="post" enctype="multipart/form-data">
                    <div>
                    <input type="hidden" name="id" value= "<?php echo $_GET['id']; ?>" >
                        <label>Title</label>
                        <input type="text" name="title" value= "<?php echo $title; ?>" class="text-input">
                        
                         <label>Body</label>
                        <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    </div>
                    
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($topics as $key => $topic): ?>
                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                                    <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>

                                <?php endif; ?>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="">
                        <?php if(empty($published)): ?>
                        <label>
                            <input type="checkbox" name="published"> Publish
                        </label>
                        <?php else: ?>
                        <label>
                            <input type="checkbox" checked name="published"> Publish
                        </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update_post" class="btn btn-big">Update post</button>
                    </div>
                </form>
            </div>
        
        </div>
    </main>
    
    <?php include("footer.php"); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="script.js"></script>
</body>
</html>