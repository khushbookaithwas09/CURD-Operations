
<?php
require_once("../config.php");
 session_start();

  if(!isset($_SESSION["loggedin"])){
      header("location: ../login.php");//if session not set redirect dashboard page
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Logic Web</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  <style>
    .error{
    color:red;
  }
  .mandatory{
  color: red;
 }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logic Web</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>  

         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-customer.php">Customer</a>
         </li>  

         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-supplier.php">Suppier</a>
         </li>  

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-product.php">Product</a>
        </li> 

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-category.php">Category</a>
        </li> 
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-purchase.php">Purchase</a>
        </li> 
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-purchase.php">Sales</a>
        </li> 
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="list-purchase.php">Report</a>
        </li> 
                    
      </ul>

      
        <a class="d-flex"  href="logout.php">Logout</a>
      
    </div>
  </div>
</nav>