<?php 
require '../../connection.php';

$id = $_POST['id'];

$deleteComment = "DELETE FROM comments WHERE id=$id";
$queryDeleteComment = mysqli_query($conn, $deleteComment);

echo json_encode(['message' => "comment berhasil dihapus"]);