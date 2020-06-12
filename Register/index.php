<?php

require_once "config.php";

if(isset($_POST['signup']))
{
  
     $name =$_POST['name'];
     $surname =$_POST['surname'];
     $email =$_POST['email'];
     $cellphone =$_POST['cellphone'];
     $password =$_POST['password'];
     $cpassword =$_POST['cpassword'];
      

      $result="";
     
     if($password==$cpassword)
       {
        $email= strip_tags(mysqli_real_escape_string($conn,trim($email)));
        $password= strip_tags(mysqli_real_escape_string($conn,trim($password)));

        $query="SELECT * from  queries WHERE email='$email'";
        $query_run=mysqli_query($conn,$query);
       
        if(mysqli_num_rows($query_run)>0)

        {
          // echo '<script type="text/javascript">alert("User already exist..try another email")</script>'; 
          $result='<div class="alert alert-danger">User already exist..try another email</div>'; 
        }
        else
        {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO  queries (name,surname,email,cellphone,password) values('$name' ,'$surname','$email','$cellphone','$hash')";
            $query_run= mysqli_query($conn,$query);
              

           // echo "Thank you ,you are now registered";
            $result='<div class="alert alert-success">Thank you ,you are now registered</div>';

        }
        


    
      }  
      else
      {
       // echo'<script type="text/javascript">alert("Password does not match")</script>';
        $result='<div class="alert alert-danger">Password does not match</div>'; 
       
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
        <div class="col-lg-5 m-auto sm-auto">
            <div class="card mt-2 bg-dark">
                <div class="card-title text-center mt-3">
                    <img src="img/img_avatar2.png" class="avatar" >
                    <h2 class=" text-white">Register</h2>
                </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                    <span class="result"> <?php echo $result;?></span>

                    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user fa-1x "></i>
                                </span>
                            </div>
                            <input type="text" class="form-control py-2" name="name" placeholder="Name" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user "></i>
                                </span>
                            </div>
                            <input type="text" class="form-control py-2" name="surname" placeholder="Surname" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope "></i> 
                                </span>
                            </div>
                            <input type="email" class="form-control py-2" name="email" placeholder="Email address" required> 
                             
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-phone-square "></i>
                                </span>
                            </div>
                            <input type="tel" class="form-control py-2"  pattern="^\d{10}$" required title="10 digits required"  name="cellphone" placeholder="Phone number" required>
                        </div>

                       


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock "></i>
                                </span>
                            </div>
                            <input type="password" class="form-control py-2" name="password" pattern=".{8,}" required title="8 characters minimum" placeholder="Password" required>
                            
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock "></i>
                                </span>
                            </div>
                            <input type="password" class="form-control py-2" name="cpassword" placeholder="Confirm Password" required>
                            
                        </div>
                       
                        <button type="submit" class="btn btn-success" name="signup" >Register</button>
        
                        <p class="float-right text-white">Already have an account? <a href="login.php">Sign In</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>

    

</body>

</html>