<?php 
    session_start();
    require '../../functions.php';
    
    $user_id = $_SESSION['user_id'];
    $tweet_id = $_POST['id'];
    $dataTweet = fetchData('tweets', 'id', $tweet_id); //fetch data tweet
?>
<div class="d-flex ">
    <input type="text" id="content" maxlength="250" class="form-control" value="<?= $dataTweet['content'] ?>">
    <button class="btn btn-primary" onclick="updateTweet(<?= $dataTweet['id'] ?>)">Update</button>
</div>