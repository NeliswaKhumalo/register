<?php

$conn=mysqli_connect("localhost","root","","register") ;

//Check connection

if(!$conn)
{
    die("connection failed: ".mysqli_connect_error());
}

if(isset($_POST['signup']))
{
  
     $name =$_POST['name'];
     $surname =$_POST['surname'];
     $email =$_POST['email'];
     $cellphone =$_POST['cellphone'];
     $password =$_POST['password'];
     $cpassword =$_POST['cpassword'];

     
     if($password==$cpassword)
       {
        $query="SELECT * from  queries WHERE email='$email'";
        $query_run=mysqli_query($conn,$query);
       
        if(mysqli_num_rows($query_run)>0)

        {
           echo '<script type="text/javascript">alert("User already exist..try another email")</script>'; 
           exit();
        }
        
        $query = "INSERT INTO  queries (name,surname,email,cellphone,password) values('$name' ,'$surname','$email','$cellphone','$password')";
        $query_run= mysqli_query($conn,$query);
      
        if($query_run)
        {
         echo "Thank you ,you are now registered";
        }
        else{
            echo "Error:" .$query .mysqli_error($conn);
        }

    
      }  
      else
      {
        echo'<script type="text/javascript">alert("Password does not match")</script>'; 
        exit();
      }
    }




    ///LOGIN USER

    
    $result="";

    if(isset($_POST['login_user']))
    {
      $email=$_POST['email'];
      $password=$_POST['password'];

      $query="SELECT * FROM  queries WHERE email='$email' AND password='$password'";
      $query_run= mysqli_query($conn,$query);

     

       if(mysqli_num_rows($query_run)==1) {
        $result='<div class="alert alert-success">Welcome</div>';
        }else {
            $result='<div class="alert alert-danger">Email/Password is invalid</div>';
        }

     

    }
?>