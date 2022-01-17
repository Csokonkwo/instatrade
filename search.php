<?php 
include("path.php");
$pageName = 'Tips/Search';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;
}

include(ROOT_PATH . "/admin/server/topics.php");

$results_per_page = 25;

$check = "SELECT * FROM posts WHERE published = 1";
$checkresult = mysqli_query($conn, $check);
$number_of_results = mysqli_num_rows($checkresult);

$number_of_pages = ceil($number_of_results/$results_per_page);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "/includes/head.php"); ?>

    <link rel="stylesheet" href="css/search.css">

</head>
<body>

<?php include(ROOT_PATH . "/includes/header.php")?>
    
    <!----------- Main section ---------------->
    <main>
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
                <br>
            </div>
        <?php endif ?>
        
        <section class="latest-cont" id="hero">
            <h2><?php echo $postsTitle ?></h2>
            <?php foreach ($posts as $post): ?>
                <?php $comment = calculateAll('comments', $post['id']); ?>
            <div class="latest clearfix">
                <img src="<?php echo BASE_URL . '/admin/guide/'. $post['image']; ?>" alt="">
                <div>
                    <h3>
                        <a href="about/single.php?id=<?php echo $post['id'];?>"> <?php echo $post['title']; ?> </a>
                    </h3>
                    <i class="fa fa-calendar"> <?php echo date('F j, Y.', strtotime($post['created_at'])); ?> </i>  <i class="fa fa-comment-o"> <?php echo $comment;?> Comment<?php if($comment >= 2){echo('s');} ?></i>
                    <p>
                    <?php echo html_entity_decode(substr($post['body'], 0, 100). '...'); ?>
                        <a href="about/single.php?id=<?php echo $post['id'];?>">Read More</a>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if(!isset($_GET['t_id']) && !isset($_GET['search_term'])): ?>
            <div class="pagination">
            <?php for($i=1; $i<= $number_of_pages; $i++):
                if($i == $page): ?>
                    <a class="pager active" href="guide.php?page=<?php echo $i ?>"> <?php echo $i ?></a>
                <?php else: ?>
                    <a  class="pager" href="guide.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
        </section>
        
        
        </main>
        
        <?php include(ROOT_PATH . "/includes/footer.php")?>
    
</body>
</html>