	  
<?php
 include("header.php");?>
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">

    	<a href="add-customer.php" class="btn btn-primary">Add Customer</a><br/><br/><br/>    	
    	 <?php if(isset($_GET['msg'])){echo $_GET['msg']; }?></span><br/>
        <table class="table">
		  <thead>
		    <tr>
		      <th>Sr No.</th>
		      <th>Customer Name</th>
		      <th>Email</th>
		      <th>Phone no.</th>
		      <th>Company Name</th>
		      <th>State</th>
		      <th>GSTIN</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$sql = "SELECT * FROM customer";
				$result = mysqli_query($con, $sql);
                 
				if (mysqli_num_rows($result) > 0) {
					$sr=1;
					  while($row = mysqli_fetch_assoc($result)) {?>
					     <tr>
					      <th><?php echo $sr; ?></th>
					      <td><?php echo $row["customer_name"]; ?></td>
					      <td><?php echo $row["email"]; ?></td>
					      <td><?php echo $row["phone_no"]; ?></td>
					      <td><?php echo $row["company_name"]; ?></td>
					      <td><?php echo $row["state_code"]; ?></td>
					      <td>
					      	<a class="btn btn-success" href="edit-customer.php?id=<?php echo $row["id"]; ?>">Edit</a>
					      	<a class="btn btn-danger" href="delete-customer.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
					      </td>
					    </tr>
					<?php  $sr=$sr++;
				      }
				} else {?>
				   <tr>
				      <th colspan="5" style="text-align: center">Not Found Data</th>
				    </tr>
				<?php }
				?>
		   </tbody>
		</table>
    </div>
  </div>
</div>
		   
<?php include("footer.php");
?>
<script type="text/javascript"> 
$(document).ready(function(){
  // alert("hello");
});
</script>
     