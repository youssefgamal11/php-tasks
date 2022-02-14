<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $Linkedin = $_POST['Linkedin'];
    $errors = [];

    $cleanName = htmlspecialchars($name);;
    $cleanEmail = htmlspecialchars($email);
    $cleanAddress = htmlspecialchars($address);
    //error
    // $cleanLinkedIn = filter_var($Linkedin , FILTER_SANITIZE_URL);

     if(empty($cleanName)){
        $errors['name'] = 'name string';
    }
    if(empty($cleanEmail)){
        $errors['email'] = 'email required';
    }
    if(empty($password)){
        $errors['password'] = 'password required';
    }elseif(strlen($password < 6)){
        $errors['Password'] = "Length Must be >= 6 chars";
    }

    if(empty($cleanAddress)){
        $errors['address'] = 'address required';
    }else if(strlen($address) < 10){
        $errors ['address'] = 'address must not be less than 10';
    }

    if(empty($Linkedin)){
        $errors['Linkedin'] = 'Linkedin required' ;
    }

    if(count($errors) > 0){
        foreach($errors as $key  => $value){
            echo'*'. $key.':'.$value.'<br>';
        }
    }else {
        echo 'valid data' ;
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
      
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"  >

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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <br>


    <!-- <a href="action.php?id=20130&name=testAccount">Student Info</a> -->



</body>






</html> 



