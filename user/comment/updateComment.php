<?php 
    include '../../functions.php';
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    
    $findHashtag = explode('#', $comment);
    if(preg_match_all("/(\w*#)/", $comment, $matches) > 1){
        $i = 0; //counter
        $index = 1;
        $hashtagArray = [];
        while($i < count($matches[0])){
            $checkTag = checkData('tags', 'nama_tag', $findHashtag[$index]);
            if(!$checkTag){
                $insertTag = "INSERT INTO tags(nama_tag) VALUES('$findHashtag[$index]')";
                $queryInsertTag = mysqli_query($conn, $insertTag);
            }
            $hashtag = explode(" ", $findHashtag[$index]);
            array_push($hashtagArray, $hashtag[0]);
            $i++;
            $index++;   
        }
        $hashtags = implode(",", $hashtagArray);
        $updateComment = "UPDATE comments SET comment='$comment', tag_name='$hashtags' WHERE id=$id";
        $queryUpdateComment = mysqli_query($conn, $updateComment);
        
        echo json_encode(['message' => "Berhasil"]);
    }else{
        $checkTag = checkData('tags', 'nama_tag', $findHashtag[1]);
        if(!$checkTag){
            $insertTag = "INSERT INTO tags(nama_tag) VALUES('$findHashtag[1]')";
            $queryInsertTag = mysqli_query($conn, $insertTag);
        }
        $hashtag = explode(" ", $findHashtag[1]);
        $updateComment = "UPDATE comments SET comment='$comment', tag_name='$hashtag[0]' WHERE id=$id";
        $queryUpdateComment = mysqli_query($conn, $updateComment);
        
        echo json_encode(["message" => "Berhasil"]);
    }