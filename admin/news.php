<?php 

include('../path.php');
include('server.php');

if(isset($_GET['published'])){
    $published = $_GET['published'];
    $n_id = $_GET['n_id'];
    update('news', $n_id, ['published'=> $published]);
}

if(isset($_GET['delete'])){
    $u_id = $_GET['u_id'];
    delete('news', $u_id);
}
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
    <link rel="stylesheet" href="css/admin.css">
    
</head>
<body>
    
    <?php include("header.php"); ?>
    
    <main>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>

        <div class="form news">
            <form action="news.php" method="post" enctype="multipart/form-data">
                <h3>News</h3>

                <?Php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?>.</li>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                
                <input name="title" placeholder="Enter Title" value="<?php echo $title ?>">
                <textarea name="body" id="body"><?php echo $body; ?></textarea>
                
                <input type="file" name="image" placeholder="Select image">
                
                <button type="submit" name="news_submit">Submit</button>
            
            </form>
        </div>

        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i>News </div>
            <div class="container">
            <?php $news = selectAll('news'); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>title</th>
                        <th>Date_created</th>
                        <th colspan="2">Actions</th>
                        
                    </thead>
                    
                    <tbody>
                    <?php foreach ($news as $key => $new): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $new['id'] ?></td>
                            <td><?php echo $new['username'] ?></td>
                            <td><?php echo $new['title'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($new['created_at'])); ?></td>
                            <?php if($new['published'] === 0): ?>
                            <td><a href="news.php?published=1&n_id=<?php echo $new['id'] ?>">Publish</a></td>               
                            <?php else: ?>
                            <td><a href="news.php?published=0&n_id=<?php echo $new['id'] ?>">Unpublish</a></td>
                            <?php endif; ?>
                            
                            <td><a href="news.php?delete=1&u_id=<?php echo $new['id'] ?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
    <?php include("footer.php"); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="script.js"></script>
    
</body>
</html>