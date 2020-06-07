<?php

include('config.php')

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
                            <input type="text" class="form-control py-4" name="name" placeholder="Name" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user "></i>
                                </span>
                            </div>
                            <input type="text" class="form-control py-4" name="surname" placeholder="Surname" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope "></i> 
                                </span>
                            </div>
                            <input type="email" class="form-control py-4" name="email" placeholder="Email address" required> 
                             
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-phone-square "></i>
                                </span>
                            </div>
                            <input type="tel" class="form-control py-4"  pattern="^\d{10}$" required title="10 digits required"  name="cellphone" placeholder="Phone number" required>
                        </div>

                       


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock "></i>
                                </span>
                            </div>
                            <input type="password" class="form-control py-4" name="password" pattern=".{8,}" required title="8 characters minimum" placeholder="Password" required>
                            
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock "></i>
                                </span>
                            </div>
                            <input type="password" class="form-control py-4" name="cpassword" placeholder="Confirm Password" required>
                            
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