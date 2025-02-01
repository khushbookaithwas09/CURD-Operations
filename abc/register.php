<<?php
require_once("config.php");
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
     $uname =$_POST["username"];
     $password =$_POST["password"];
     //$pname =md5($_POST["password"]);
    $pname = password_hash($password, PASSWORD_DEFAULT); 
    $sql= "SELECT * FROM users WHERE username ='$uname'";

    $row =mysqli_query($con,$sql);
    if(mysqli_num_rows($row))
    {
        echo"Already user exits";
    }
    else
    {
        $sql="INSERT INTO users(`username`,`password`) VALUES('$uname','$pname')";
       
        if(mysqli_query($con,$sql))
        {
         
            header("location:login.php");
        }
    }
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Here</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }
        .wrapper {
            width: 360px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            background-color: white; 
            border-radius: 8px; 
        }
       
        body{ font: 14px sans-serif;
        background-color: #ccccff; }
        .card{ 
        	    
        	     margin: 120px auto;
                 padding: 50px; 
               
                 box-shadow: 14px 14px 7px  #9999ff;
                 border-radius:6px; 
         }
         .error{
         	color: red;
         }
         .form-control{
			padding: 10px;

         }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2 class="text-center">Sign Up</h2> <!-- Added text-center class -->
        <p class="text-center">Please fill this form to create an account!</p> <!-- Added text-center class -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required="" minlength="6">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Submit"> <!-- btn-block to make it full width -->
            </div>
        </form>
        <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
