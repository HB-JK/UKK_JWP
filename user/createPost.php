<?php 
    require '../security.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tweet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="content col-6">
            <a href="home.php" class="btn btn-danger">Back</a>
            <form action="actionPost.php" method="post">
                <h2>Create post</h2>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                <div class="content">
                    <label for="post">Content</label>
                    <textarea type="text" class="form-control" maxlength="250" rows="5" name="content"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" name="action" value="create">
            </form>
        </div>
    </div>
</body>
</html>