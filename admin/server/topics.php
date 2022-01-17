<?php 

include(ROOT_PATH . "/includes/dbFunctions.php");

function validateTopic($topics){
    $errors = array();

    if (empty($topics['name'])){
        array_push($errors, 'Name is required');
    }

    $existingTopic = selectOne('topics', ['name' => $topics['name']]);
    if($existingTopic){
        if(isset($_POST['update_topic']) && $existingTopic['id'] != $_POST['id']){
            array_push($errors, 'Topic with this Name already exists');
        }

        if(isset($_POST['add_topic'])){
            array_push($errors, 'Topic with this Name already exists');
        }
    }

return $errors;
}

$table = 'topics';

$errors = array();
$id = '';
$name = '';
$description = '';

$topics = selectAll($table);

$goTopicIndex = 'topics.php';

if(isset($_POST['add_topic'])){
    $errors = validateTopic($_POST);

    if(count($errors)===0){
       
        unset($_POST['add_topic']);
        $topic_id = createUser($table, $_POST);
        $_SESSION['message'] = 'Topic created successfully';
        $_SESSION['type'] = 'success';
        header('location: '. $goTopicIndex);
        exit();
    }

    else{    
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

//gets and auto fill topic edit form
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

if(isset($_GET['tdel_id'])){
    $id = $_GET['tdel_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Topic deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: '. $goTopicIndex);
    exit();
}


if(isset($_POST['update_topic'])){
    $errors = validateTopic($_POST);

    if(count($errors)===0){
        $id = $_POST['id'];
        unset($_POST['id'], $_POST['update_topic']);
        $topic_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Topic updated successfully';
        $_SESSION['type'] = 'success';
        header('location: '. $goTopicIndex);
        exit();
    }
    else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}


//This section displays all topics on main page

$posts = array();
$postsTitle = 'Recent Articles';

if(isset($_GET['t_id'])){
    $posts = getPostsByTopic($_GET['t_id']);
    $postsTitle = "Posts on ". $_GET['name']; 
}
else if(isset($_POST['search_term'])){
    $postsTitle = "Results for: ". $_POST['search_term']; 
    $posts = searchPosts($_POST['search_term']);
    $_GET['search_term'] = 1;
} 
else{
    $posts = getPublishedPosts();

}


?>