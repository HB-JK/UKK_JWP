<?php 
require '../../connection.php';

$id = $_POST['id'];

$deleteTweet = "DELETE FROM tweets WHERE id=$id";
$queryDeleteTweet = mysqli_query($conn, $deleteTweet);

$deleteComment = "DELETE FROM comments WHERE id=$id";
$queryDeleteComment = mysqli_query($conn, $deleteComment);

echo json_encode(['message' => "post berhasil dihapus"]);