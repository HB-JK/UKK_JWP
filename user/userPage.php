<?php
    require '../security.php';
    require '../functions.php';
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
<body onload="showData()">
    <div class="container">
        <a href="home.php" class="btn btn-danger">Back</a>
        <div class="posts p-2" id="posts"></div>
    </div>
    
<script>
        
    function showData(){
        $.ajax({
            type: 'post',
            url: 'tweet/showPost.php',
            dataType: 'html'
        }).done(res => {
            $('#posts').html(res);
        }).fail(res => {
            alert(res)
        })
    }
    
    function getPost(id){
        $.ajax({
            type: 'post',
            url: 'tweet/getPost.php',
            data: {id},
            dataType: "html"
        }).done(res => {
            $('#text-content').html(res)
        })
    }
    
    function updateTweet(id){
        const content = $('#content').val();
        $.ajax({
            type: 'post',
            url: 'tweet/updatePost.php',
            data: {id, content},
            dataType: 'json'
        }).done(res => {
            alert(res.message)
            showData();
        }).fail(res => {
            alert(res)
        })
    }
    
    function deletePost(id){
        $.ajax({
            type: 'post',
            url: 'tweet/deletePost.php',
            data: {id},
            dataType: 'json'
        }).done(res => {
            alert(res.message)
            showData()
        }).fail(res => {
            alert(res.response.message)
        })
    }
</script>
</body>
</html>