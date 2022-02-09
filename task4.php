<?php 
session_start();

function clean($input , $ispassword = 0){
    $input = trim($input);
    if($ispassword == 0){
    $input = htmlspecialchars($input);}

    return $input ;

    
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $password = clean($_POST['password'] , 1);
    $address = $_POST['address'];
    $Linkedin = $_POST['Linkedin'];
    $gender = clean($_POST['gender']);
    $errors = [];

    // $cleanName = htmlspecialchars($name);;
    // $cleanEmail = htmlspecialchars($email);
    // $cleanAddress = htmlspecialchars($address);


    if (!empty($_FILES['image']['name'])) {

        $imgName  = $_FILES['image']['name'];
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

   

     if(empty($name)){
        $errors['name'] = 'name string';
    }
    if(empty($email)){
        $errors['email'] = 'email required';
    }
    if(empty($password)){
        $errors['password'] = 'password required';
    }elseif(strlen($password < 6)){
        $errors['Password'] = "Length Must be >= 6 chars";
    }

    if(empty($address)){
        $errors['address'] = 'address required';
    }else if(strlen($address) < 10){
        $errors ['address'] = 'address must not be less than 10';
    }

    if(empty($Linkedin)){
        $errors['Linkedin'] = 'Linkedin required' ;
    }
    if(empty($gender)){
        $errors['gender'] = 'gender required' ;
    }

    if(count($errors) > 0){
        foreach($errors as $key  => $value){
            echo'*'. $key.':'.$value.'<br>';
        }
    }else {
        echo 'valid data' ;
        $_SESSION['userData'] =['name' =>$name , 'email'=>$email ,'password'=>$password , 'address'=>$address ,'linkedin'=>$Linkedin ,'gender' =>$gender ];

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
      
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby=""   name="name" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1"   name="password" placeholder="Password">
            </div>


            <div class="form-group">
                <label for="exampleInputAddress">address</label>
                <input type="text" class="form-control" id="exampleInputAddress" aria-describedby="" name="address" placeholder="Enter address">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">linkedIn URL</label>
                <input type="text" class="form-control" id="exampleInputLinkedin" aria-describedby="urlHelp" name="Linkedin" placeholder="Enter Linkedin">
            </div>
            <div class="form-group">
                <label for="exampleInputgender">Gender</label>
                <input type="text" class="form-control" id="exampleInputgender" aria-describedby="urlHelp" name="gender" placeholder="Enter your gender">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <br>


    <!-- <a href="action.php?id=20130&name=testAccount">Student Info</a> -->



</body>






</html> 



