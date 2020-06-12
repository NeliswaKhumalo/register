<?php


require_once "config.php";



if(isset($_POST['login_user']))
{
    $email =$_POST['email'];
    $password =$_POST['password'];
  

  $email= strip_tags(mysqli_real_escape_string($conn,trim($email)));
  $password= strip_tags(mysqli_real_escape_string($conn,trim($password))); 
 

  $query= "SELECT * FROM  queries WHERE email='$email' ";
  $query_run=mysqli_query($conn,$query);



  $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
 

 // $password= strip_tags(mysqli_real_escape_string($conn,trim($row["Password"])));

  if(password_verify($password, $row['Password']))
  {
    $result='<div class="alert alert-success">You are now logged in...</div>';
  }
  else{
    $result='<div class="alert alert-danger">Please check your inputs</div>';
  }


  

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css ">

    <title>Document</title>
</head>

<body>

    <div class="row">
        <div class="col-lg-5 m-auto">
            <div class="card mt-5 bg-dark">
                <div class="card-title text-center mt-3">
                    <img src="img/img_avatar2.png" class="avatar" >
                    <h2 class=" text-white">Sign In</h2>
                </div>
                <div class="card-body">
                    <form action="login.php" METHOD="post">
                      
                      <span class="result"> <?php echo $result;?></span>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user fa-2x"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control py-4" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock fa-2x"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control py-4" name="password" placeholder="Password" required>
                        </div>

                        <button name="login_user" class="btn btn-success">Login</button>
                        <p class="float-right text-white">Don't have an account? <a href="index.php">Sign Up</a></p>
                        

                           

 
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>