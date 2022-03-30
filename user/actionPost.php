<?php 
    include '../functions.php';
    $content = $_POST['content'];
    $user_id = $_POST['user_id'];
    
    $findHashtag = explode('#', $content);
    if(preg_match_all("/(\w*#)/", $content, $matches) > 1){
        $i = 0; //counter
        $index = 1;
        $hashtagArray = [];// array yang digunakan untuk menampung hashtag yang telah dipisah
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
        $hashtags = implode(",", $hashtagArray);// string yang digunakan untuk dimasukkan ke tag_name
        $insertTweet = "INSERT INTO tweets(user_id, content, tag_name) VALUES($user_id, '$content', '$hashtags')";
        $queryInsertTweet = mysqli_query($conn, $insertTweet);
        $i = 0;
    }else{
        $checkTag = checkData('tags', 'nama_tag', $findHashtag[1]);
        if(!$checkTag){
            $insertTag = "INSERT INTO tags(nama_tag) VALUES('$findHashtag[1]')";
            $queryInsertTag = mysqli_query($conn, $insertTag);
        }
        $hashtag = explode(" ", $findHashtag[1]);
        $insertTweet = "INSERT INTO tweets(user_id, content, tag_name) VALUES($user_id, '$content', '$hashtag[0]')";
        $queryInsertTweet = mysqli_query($conn, $insertTweet);
        
        if($queryInsertTweet){
            print_r($queryInsertTweet);
        }
    }
    
    // header('location: home.php');