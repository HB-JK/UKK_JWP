<?php 
    session_start();
    require '../../functions.php';
    
    $user_id = $_SESSION['user_id'];
    $showUserPost = "SELECT * FROM tweets WHERE user_id=$user_id";
    $queryShowUserpost = mysqli_query($conn, $showUserPost);
    
    while($data = mysqli_fetch_array($queryShowUserpost)) : ?>
        <div class="border border-primary my-2 p-2">
            <h2 id="text-content"><?= $data['content'] ?></h2>
            <div class="buttons">
                <button class="btn btn-warning" onclick="getPost('<?= $data['id'] ?>')">Edit</button>
                <button class="btn btn-danger" onclick="deletePost('<?= $data['id'] ?>')">Delete</button>
            </div>
        </div>
    <?php endwhile; ?>