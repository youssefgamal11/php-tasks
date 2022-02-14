<?php
require 'dbConnection.php' ;
require 'helper.php' ;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = clean($_POST['title']);
    $content = clean($_POST['content']);
    $date = $_POST['date'] ;
    $errors = [];


    if (!empty($_FILES['image']['title'])) {

        $imgName  = $_FILES['image']['title'];
        $imgTemp  = $_FILES['image']['tmp_name'];
        $imgType  = $_FILES['image']['type']; 

        $nameArray =  explode('.', $imgName);
        $imgExtension =  strtolower(end($nameArray));

        $imgFinalName = time() . rand() . '.' . $imgExtension;



        $allowedExt = ['png', 'jpg'];

        if (in_array($imgExtension, $allowedExt)) {

            $disPath = 'uploads/' . $imgFinalName;

            if (move_uploaded_file($imgTemp, $disPath)) {
                echo 'File Uploaded' . '<br>';
            } else {
                echo 'Error In Uploading Try Again' . '<br>';
            }
        } else {
            echo 'InValid Extension'. '<br>';
        }
    } else {

        echo ' * Image Required' . '<br>';
    }

   

     if(empty($title)){
        $errors['title'] = 'title required';
    }
    if(empty($content)){
        $errors['content'] = 'content required ';
    }
    if(empty($date)){
        $errors['date'] = 'date required ';
    }
    


  
  
    if(count($errors) > 0){
        foreach($errors as $key  => $value){
            echo'*'. $key.':'.$value.'<br>';
        }
    }else {
        $sql =  "insert into users(title,content,date,image) values ('$title','$content','$date','$imgFinalName')";
        $op  =  mysqli_query($con,$sql);
        mysqli_close($con);
        if($op){
            echo 'Raw Inserted';
        }else{
            echo 'Error Try Again '.mysqli_error($con);
        }
    }

}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Register</h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputTitle">title</label>
                <input type="title" class="form-control" required id="exampleInputTitle" aria-describedby="" name="title" placeholder="Enter title">
            </div>


            <div class="form-group">
                <label for="exampleInputContent">content</label>
                <input type="content" class="form-control" required id="exampleInputContent" aria-describedby="emailHelp" name="content" placeholder="Enter content">
            </div>

            <div class="form-group">
                <label for="exampleInputDate">date</label>
                <input type="date" class="form-control" required id="exampleInputDate" aria-describedby="" name="date" placeholder="Enter date">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
            </div>

            


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>