<?php require_once("config.php");
 session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: admin/dashboard.php");//if session not set redirect dashboard page
}

$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else
    {
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
     // Validate credentials
    if(empty($username_err) && empty($password_err)){
    	
 		$sql ="SELECT * FROM users WHERE username='$username'";

	    $result = mysqli_query($con,$sql);
	    if(mysqli_num_rows($result))
			{
				// while($row = $result->fetch_assoc()) {
 				while($row = mysqli_fetch_assoc($result)) {
				   
				      if(password_verify($password, $row["password"])){
				      	       session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $row["id"];
                            $_SESSION["username"] = $username;
                             // Redirect user to welcome page
                             header("location: admin/dashboard.php");
				      }else
				      {
				      	$login_err="Invalid username or password.";
				      }
				  }//while loop end
         }
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
	    <title>Inventory Management System</title>
	     <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="admin/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!--  <link rel="stylesheet" type="text/css" href="style.css"> -->
	  <style>
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
<body  class="bg-img">
   <div class="wrapper">
	   	
         <div class="container">
         	<div class="row">
         		<div class="col-md-4 offset-md-4 card ">
         			
					   		<?php if(isset($_GET['msg'])){?>
								   	   	<div class="alert alert-primary" role="alert">	  
										  	<?php echo $_GET['msg'];?>
					       
					        <?php }?>
								        <h2 style="text-align: center;">Inventory Management System</h2>
								         <p style="text-align: center;">Please fill in your credentials to login.</p>

									        <?php 
									        if(!empty($login_err)){
									            echo '<div class="alert alert-danger">' . $login_err . '</div>';
									        }        
									        ?>					  	

					   	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
					   		<div class="form-group">
					   			<label>Username</label>
					   			<input type="text" name="username" class="form-control"  value="<?php if(isset($_POST["username"])){ echo $_POST["username"];} ?>">

					   			<span class="error"><?php if(isset($username_err)){ echo $username_err;} ?></span>
					   		</div>

					   	    <div class="form-group">
					   	     	<label>Password</label>
					   			<input type="password" name="password" class="form-control"  value="<?php if(isset($_POST["password"])){ echo $_POST["password"];} ?>">

					   			<span class="error"><?php if(isset($password_err)){ echo $password_err;} ?></span>
					   		</div>        

                            <br/>
					   		<div class="form-group">
					   	     <input type="submit"  class="btn btn-primary" value="submit">
					   		</div>
					   	</form>
		 		   </div>
         	  </div>
           </div>
      </div>
    </body>
</html>






