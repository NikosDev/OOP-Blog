<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      </head>
    <body>
        <div class="container">
            <h1 class="text-center py-3">PHP Blog</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                  <label for="formGroupExampleInput">Paragraph:</label>
                  <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Type Title">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Main Text:</label>
                  <input type="text" name="body" class="form-control" id="formGroupExampleInput2" placeholder="Type Text">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>    
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>
</html>


<?php
include 'classes/post.php';
include 'classes/delete.php';
include 'classes/show.php';
include 'classes/database.php';

//ADD POST
$postarisma= new posts();
@@$title = $_POST['title'];
@@$body = $_POST['body'];
if (isset($_POST['submit']) AND ( $_POST['title'] != NULL )){
    $postarisma->addPost($conn, $title, $body);
}

//DELETE POST
$delete_posts= new delete();
if(isset($_POST['delete'])){
    $delete_posts-> deletePost($conn);
}

//SHOW ALL POSTS
$show_posts= new show();
$show_posts->showPost($conn);
 
?>