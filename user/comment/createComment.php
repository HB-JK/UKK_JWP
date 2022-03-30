<?php 
    include '../../functions.php';
    $comment = $_POST['comment'];
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    
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
        $insertComment = "INSERT INTO comments(user_id, post_id, comment, tag_name) VALUES($user_id, $post_id, '$comment', '$hashtags')";
        $queryInsertComment = mysqli_query($conn, $insertComment);
        
        echo json_encode(['message' => 'Berhasil Menambahkan Comment']);
    }else{
        $checkTag = checkData('tags', 'nama_tag', $findHashtag[1]);
        if(!$checkTag){
            $insertTag = "INSERT INTO tags(nama_tag) VALUES('$findHashtag[1]')";
            $queryInsertTag = mysqli_query($conn, $insertTag);
        }
        $hashtag = explode(" ", $findHashtag[1]);
        $insertComment = "INSERT INTO comments(user_id, post_id, comment, tag_name) VALUES($user_id, $post_id, '$comment', '$hashtag[0]')";
        $queryInsertComment = mysqli_query($conn, $insertComment);
        echo json_encode(['message' => 'Berhasil Menambahkan Comment']);
    }