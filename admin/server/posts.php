<?php

include(ROOT_PATH .'/includes/dbFunctions.php');

function validatePost($post){
    $errors = array();

    if (empty($post['title'])){
        array_push($errors, 'Title is required');
    }

    if (empty($post['body'])){
        array_push($errors, 'Body is required');
    }

    if (empty($post['topic_id'])){
        array_push($errors, 'Please select a topic');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if($existingPost){
        if(isset($_POST['update_post']) && $existingPost['id'] != $_POST['id']){
            array_push($errors, 'Post with this title already exists');
        }

        if(isset($_POST['add_post'])){
            array_push($errors, 'Post with title already exists');
        }
        
    }

    return $errors;
}

$table = 'posts';

//gets the topic and its relation
$topics = selectAll('topics');
$posts = selectAll($table);

$errors = array();
$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';

$goPostIndex = 'posts.php';

//adds post
if(isset($_POST['add_post'])){
    $errors = validatePost($_POST);

    if(count($errors)==0){

        if(!empty($_FILES['image']['name'])){
            $image_name = time(). "_" . $_FILES['image']['name'];
            $destination = "guide/" .$image_name;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    
            if($result){
                $_POST['image'] = $image_name;
            }
            else{
                array_push($errors, 'Failed to upload image');
            }
        }
    
        else{
            array_push($errors, "Post Image required");
        }
    
        if(count($errors)==0){
            unset($_POST['add_post']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
            $post_id = createUser($table, $_POST);
            $_SESSION['message'] = 'Post created successfully';
            $_SESSION['type'] = 'success';
            header('location: '. $goPostIndex);
        }
    
        else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }

    }

}

//gets auto fill edit form
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = selectOne($table, ['id' => $id]);
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
    
}

//gets and update posts
if(isset($_POST['update_post'])){

    if (empty($_POST['title'])){
        array_push($errors, 'Title is required');
    }

    if (empty($_POST['body'])){
        array_push($errors, 'Body is required');
    }

    if (empty($_POST['topic_id'])){
        array_push($errors, 'Please select a topic');
    }

    $existingPost = selectOne('posts', ['title' => ($_POST['title'])]);
    if($existingPost){
        if(isset($_POST['update_post']) && $existingPost['id'] != $_POST['id']){
            array_push($errors, 'Post with this title already exists');
        }
        
    }

    if(count($errors) == 0){

        if(!empty($_FILES['image']['name'])){
            $image_name = time(). "_" . $_FILES['image']['name'];
            $destination = "img/img/" .$image_name;
            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    
            if($result){
                $_POST['image'] = $image_name;
            }
            else{
                array_push($errors, 'Failed to upload image');
            }
        }
    
        if(empty($_FILES['image']['name'])){
            unset($_POST['image']);
        }
    
        if(count($errors) == 0){
            $id = $_POST['id'];
            unset($_POST['update_post'], $_POST['id']);
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['published'] = isset($_POST['published']) ? 1 : 0;
            $_POST['body'] = htmlentities($_POST['body']);
    
            $post_id = update($table, $id, $_POST);
            $_SESSION['message'] = 'Post updated successfully';
            $_SESSION['type'] = 'success';
            header('location: '. $goPostIndex);
        }
    
        else{
            $title = $_POST['title'];
            $body = $_POST['body'];
            $topic_id = $_POST['topic_id'];
            $published = isset($_POST['published']) ? 1 : 0;
        }
    } 
    
}


//delete post
if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Post deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: '. $goPostIndex);
    exit();
}

//published and unpublished
if(isset($_GET['published']) && isset($_GET['p_id'])){
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    //..... update published
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = 'Post published state changed';
    $_SESSION['type'] = 'success';
    header('location: '. $goPostIndex);
    exit();

}
