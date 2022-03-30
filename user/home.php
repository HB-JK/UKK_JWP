<?php 
    require '../functions.php';
    require '../security.php';
    $sqlPosts = "SELECT tweets.*, users.nama FROM tweets LEFT JOIN users on tweets.user_id=users.id ";
    $queryPosts = mysqli_query($conn, $sqlPosts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">\
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">        
        <div class="user d-flex justify-content-between">
            <a href="logout.php" class="btn btn-danger">Log out</a>
            <a href="userPage.php" class="btn btn-primary">user page</a>
            <a href="createPost.php" class="btn btn-primary">Create post</a>
        </div>
        <div class="search col-12 d-flex my-5">
            <input type="text form-control col-12 " style="width: 100%" id="search" onkeyup="searchHashtag(this.value)">
            <!-- <button onclick="searchHashtag()" class="btn btn-primary">Search</button> -->
        </div>
        
        <div class="posts" id="posts">
            <?php 
                while($posts = mysqli_fetch_array($queryPosts)){ 
            ?>
                <div class="post my-3 border border-primary bg-light p-2">
                    <div class="d-flex justify-content-between"><h2><?= $posts['content'] ?></h2><a href="post.php?id=<?= $posts['id'] ?>" class="btn btn-success">View</a></div>
                    <h5><?= $posts['nama'] ?></h5>
                </div>
            <?php  } ?>
        </div>
    </div>
    
    <script>
        function searchHashtag(){
            const hashtag = $('#search').val();
            
            $.ajax({
                type: 'post',
                url: 'searchPost.php',
                data : {hashtag},
                dataType: 'html'
            }).done(res => {
                $('#posts').html(res)
            })
        }
    </script>
</body>
</html>
