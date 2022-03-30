<?php
    require '../connection.php';
    $hashtag = $_POST['hashtag'];
    if($hashtag != ""){
    
        $searchPost = "SELECT * FROM tweets WHERE tag_name LIKE '%$hashtag%'";
        $querySearchPost = mysqli_query($conn, $searchPost);
        
        $searchComment = "SELECT * FROM comments WHERE tag_name LIKE '%$hashtag%'";
        $querySearchComment = mysqli_query($conn, $searchComment);
        
        while($showPost = mysqli_fetch_array($querySearchPost)): 
?>
    <div class="post my-3 border border-primary bg-light p-2">
        <div class="d-flex justify-content-between"><h2><?= $showPost['content'] ?></h2><a href="post.php?id=<?= $showPost['id'] ?>" class="btn btn-success">View</a></div>
    </div>
    <?php endwhile; 
        while($showComment = mysqli_fetch_array($querySearchComment)):
    ?>
    <div class="post my-3 border border-primary bg-light p-2">
        <div class="d-flex justify-content-between"><h2><?= $showComment['comment'] ?></h2><a href="post.php?id=<?= $showComment['id'] ?>" class="btn btn-success">View</a></div>
    </div>
    <?php endwhile; 
    }else{
        $sqlPosts = "SELECT tweets.*, users.nama FROM tweets LEFT JOIN users on tweets.user_id=users.id ";
        $queryPosts = mysqli_query($conn, $sqlPosts);
        while($posts = mysqli_fetch_array($queryPosts)) :
    ?>
            <div class="post my-3 border border-primary bg-light p-2">
                <div class="d-flex justify-content-between"><h2><?= $posts['content'] ?></h2><a href="post.php?id=<?= $posts['id'] ?>" class="btn btn-success">View</a></div>
                <h5><?= $posts['nama'] ?></h5>
            </div>
    <?php
        endwhile;
    }
    ?>