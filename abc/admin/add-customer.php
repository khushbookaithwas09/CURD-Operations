
<?php
 include("header.php");?>
 
<?php
    if(isset($_POST['submit'])){ 
    $customer_name=$_POST["customer_name"];
    $email=$_POST["email"];
    $phone_no=$_POST["phone_no"];
    $company_name=$_POST["company_name"];
    $address=$_POST["address"];
    $state_code=$_POST["state_code"];
    $gstin=$_POST["gstin"];
    $pan_no=$_POST["pan_no"]; 
  
    $sql = "INSERT INTO customer (customer_name, email, phone_no, company_name, address, state_code, gstin, pan_no) VALUES ('$customer_name', '$email','$phone_no','$company_name','$address','$state_code','$gstin', '$pan_no')";
    if (mysqli_query($con, $sql)) {
    header("location:list-customer.php?msg=<span class='alert alert-success alert-dismissible fade show' role='alert'>Data is successfully created!</span>");
    }   
  }
?>
<div class="container mt-5">
 <div class="row">
    <div class="col-sm-6">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="customerForm">
		 
		      <div class="form-group">
		        <label>Customer Name<span class="mandatory">*</span></label>
		        <input type="text" name="customer_name" class=" form-control">
          </div>

          <div class="form-group">
            <label>Customer Email</label>
            <input type="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label>Phone no.<span class="mandatory">*</span></label>
            <input type="number" name="phone_no" class="form-control">   
          </div>

          <div class="form-group">
            <label>Company name<span class="mandatory">*</label>
            <input type="text" name="company_name" class="form-control">
          </div>

          <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
          </div>  
          
          <div class="form-group">
            <label>State <span class="mandatory">*</span></label>
            <select name="state_code" class="form-control">
              <option value="">Select</option>
              <option value="27" >Maharashtra</option>
            </select>
          </div>   

          <div class="form-group">
            <label>GSTIN</label>
            <input type="number" name="gstin" class="form-control"> 
          </div>
         
          <div class="form-group">
            <label>Pan no.</label>
            <input type="number" name="pan_no" class="form-control"> 
          </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>
<?php include("footer.php");?>     
 
<script>
$("#customerForm").validate({
        rules: {
            customer_name: "required",
            state_code:"required"
        },
        messages: {
            customer_name: "Enter Customer Name",
            state_code: "Select State"           

        },

         highlight: function(element) {
            $(element).parent().addClass('has-error');
          },
          unhighlight: function(element) {
            $(element).parent().removeClass('has-error');
          },
    })
</script>