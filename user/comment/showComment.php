<?php 
    session_start();
    require '../../functions.php';
    
    $post_id = $_POST['post_id'];
    $showComment = "SELECT * FROM comments WHERE post_id=$post_id";
    $queryShowComment = mysqli_query($conn, $showComment);
?>
  <h2 class="d-flex justify-content-start">Comments</h2>
  
    <?php while($data = mysqli_fetch_array($queryShowComment)) : ?>
        <div class="border border-primary my-2 p-2 text-left">
            <h4 id="text-comment"><?= $data['comment'] ?></h4>
            <div class="buttons">
                <button class="btn btn-warning" onclick="getComment('<?= $data['id'] ?>')">Edit</button>
                <button class="btn btn-danger" onclick="deleteComment('<?= $data['id'] ?>')">Delete</button>
            </div>
        </div>
    <?php endwhile; ?>