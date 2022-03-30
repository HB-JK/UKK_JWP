<?php 
    session_start();
    require '../../functions.php';
    
    $comment_id = $_POST['id'];
    $findComment = "SELECT * FROM comments WHERE id=$comment_id";
    $queryFindComment = mysqli_query($conn, $findComment);
    $data = mysqli_fetch_array($queryFindComment);
?>
<div class="d-flex">
    <input type="text" id="commentUpdate" maxlength="250" class="form-control" value="<?= $data['comment'] ?>">
    <button class="btn btn-primary" onclick="updateComment(<?= $data['id'] ?>)">Update</button>
</div>