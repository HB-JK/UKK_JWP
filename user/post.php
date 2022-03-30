<?php
    require '../security.php';
    require '../functions.php';
    
    $user_id = $_SESSION['user_id'];
    
    $tweet = fetchData('tweets', 'id', $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body onload="showComment()">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="contain col-12">
            <a href="home.php" class="btn btn-danger">Back</a>
            <div class="card text-center p-3 m-2">
                <h3><?= $tweet['content'] ?></h3>
                <div><button class="btn btn-primary" onclick="openComment()">Add Comment</button></div>
                <div class="my-4" id="comments">
                    
                </div>
                <div class="commentForm m-3" id="commentForm" style="display: none">
                    <div class="d-flex">
                        <input type="hidden" id="user_id" value="<?= $user_id ?>">
                        <input type="hidden" id="post_id" value="<?= $tweet['id'] ?>">
                        <input type="text" class="form-control" id="comment" maxlength="250">
                        <button class="btn btn-success" onclick="addComment()">Comment</button>
                        <button class="btn btn-primary" onclick="closeComment()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>    
    const commentForm = document.getElementById('commentForm');
    function openComment(){commentForm.style.display = 'block'}
    function closeComment(){
        commentForm.style.display = 'none'
        $('#comment').val("");
    }
    
    function showComment(){
        const post_id = $("#post_id").val();
        $.ajax({
            type: 'post',
            url: 'comment/showComment.php',
            data: {post_id},
            dataType: 'html'
        }).done(res => {
            $('#comments').html(res)
        })
    }
    
    function addComment(){
        const user_id = $('#user_id').val();
        const post_id = $('#post_id').val();
        const comment = $("#comment").val();
        
        $.ajax({
            type: 'post',
            url: 'comment/createComment.php',
            data: {user_id, post_id, comment},
            dataType: 'json'
        }).done(res => {
            alert(res.message)
            showComment()
            closeComment()
        })
    }
    
    function getComment(id){
        $.ajax({
            type: 'post',
            url: 'comment/getComment.php',
            data: {id},
            dataType: 'html'
        }).done(res => {
            $('#text-comment').html(res)
        })
    }
    
    function updateComment(id){
        const comment = $('#commentUpdate').val()
        $.ajax({
            type: 'post',
            url: 'comment/updateComment.php',
            data: {comment, id},
            dataType: 'json'
        }).done(res => {
            alert(res.message)
            showComment()
        })
    }
    
    function deleteComment(id){
        $.ajax({
            type: 'post',
            url : 'comment/deleteComment.php',
            data: {id},
            dataType: 'json'
        }).done(res => {
            alert(res.message)
            showComment()
        }).fail(res => {
            alert(res.response.message)
        })
    }
</script>
</body>
</html>