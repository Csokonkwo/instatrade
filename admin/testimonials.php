<?php 

include('../path.php');
include('server.php');

if(isset($_GET['published'])){
    $published = $_GET['published'];
    $t_id = $_GET['t_id'];
    update('testimonials', $n_id, ['published'=> $published]);
}

if(isset($_GET['delete'])){
    $u_id = $_GET['u_id'];
    delete('testimonials', $u_id);
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
            <form action="testimonials.php" method="post" enctype="multipart/form-data">
                <h3>testimonials</h3>

                <?Php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?>.</li>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                
                <input name="fullname" placeholder="Enter fullname" class="text-input" value="<?php echo $fullname ?>">
                <textarea name="body" id="body"><?php echo $body; ?></textarea>
                <input name="city" placeholder="Enter city" value="<?php echo $city ?>">
                
                <button type="submit" name="testimonials_submit">Submit</button>
            
            </form>
        </div>

        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Testimonials </div>
            <div class="container">
            <?php $testimonials = selectAll('testimonials'); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>City</th>
                        <th>Date_created</th>
                        <th colspan="2">Actions</th>
                        
                    </thead>
                    
                    <tbody>
                    <?php foreach ($testimonials as $key => $testimonial): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $testimonial['id'] ?></td>
                            <td><?php echo $testimonial['username'] ?></td>
                            <td><?php echo $testimonial['fullname'] ?></td>
                            <td><?php echo $testimonial['city'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($testimonial['created_at'])); ?></td>
                            <?php if($testimonial['published'] === 0): ?>
                            <td><a href="testimonials.php?published=1&t_id=<?php echo $testimonial['id'] ?>">Publish</a></td>               
                            <?php else: ?>
                            <td><a href="testimonials.php?published=0&t_id=<?php echo $testimonial['id'] ?>">Unpublish</a></td>
                            <?php endif; ?>
                            
                            <td><a href="testimonials.php?delete=1&u_id=<?php echo $testimonial['id'] ?>">Delete</a></td>
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