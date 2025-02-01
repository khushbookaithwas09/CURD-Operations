<?php include("header.php");?>
<style type="text/css">
  /*.has-error{
    color:red;
  }*/
 
</style>

 <?php

 if(!isset($_GET['id']))
 {
   header("Location:list-customer.php?msg=<span class='alert alert-success alert-dismissible fade show' role='alert'> Data not found!</span>");  
 }
  
   $id=$_GET['id'];
    $sql ="SELECT * from customer WHERE id=$id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
?>

<div class="container mt-5">
 <div class="row">
    <div class="col-sm-6">
      <form method="POST" action="update-customer.php" id="customerForm">
     
          <div class="form-group">
            <label>Customer Name<span class="mandatory">*</span></label>
             <input type="text" name="customer_name" class="form-control" value="<?php echo $row['customer_name']; ?>" >
          </div>

          <div class="form-group">
            <label>Customer Email</label>
           <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>" >
          </div>

          <div class="form-group">
            <label>Phone no.<span class="mandatory">*</span></label>
            <input type="number" name="phone_no" class="form-control" value="<?php echo $row['phone_no']; ?>" >
          </div>

          <div class="form-group">
            <label>Company name<span class="mandatory">*</span></label>
          <input type="text" name="company_name" class="form-control" value="<?php echo $row['company_name']; ?>" >
          </div>

          <div class="form-group">
            <label>Address</label>
           <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" >
          </div>  
          
          <div class="form-group">
            <label>State <span class="mandatory">*</span></label>
          <input type="text" name="state_code" class="form-control" value="<?php echo $row['state_code']; ?>" >

          </div>   

          <div class="form-group">
            <label>GSTIN</label>
            <input type="number" name="gstin" class="form-control" value="<?php echo $row['gstin']; ?>" >
          </div>
         
          <div class="form-group">
            <label>Pan no.</label>
            <input type="number" name="pan_no" class="form-control" value="<?php echo $row['pan_no']; ?>" >
         </div>
            
           <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>
<?php include("footer.php");
?>     
 
 


    