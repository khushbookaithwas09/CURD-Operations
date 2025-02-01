
 <?php
require_once("../config.php");
if(isset($_POST['submit'])){
     $ids=$_POST["id"];
     $customer_name=$_POST["customer_name"];
     $email=$_POST["email"];
     $phone_no=$_POST["phone_no"];
     $company_name=$_POST["company_name"];
     $address=$_POST["address"];
     $state_code=$_POST["state_code"];
     $gstin=$_POST["gstin"];
     $pan_no=$_POST["pan_no"]; 
          
    $sql = "UPDATE customer SET customer_name='$customer_name', email='$email',  phone_no='$phone_no', company_name='$company_name', address='$address', state_code='$state_code',gstin='$gstin', pan_no='$pan_no'  WHERE id=$ids";
                   
                    
        if (mysqli_query($con, $sql)) {

         header("location:list-customer.php?msg=<span class='alert alert-success alert-dismissible fade show' role='alert'>Data is successfully Updated!</span>");
            }   
  
}
?>