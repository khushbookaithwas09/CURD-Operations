 <?php require_once "../config.php";?>
<?php
    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $sql = "DELETE FROM customer WHERE id=$id";
        if (mysqli_query($con, $sql)) {
        header("location:list-customer.php?msg=<span class='bg-danger'>Data is successfully Deleted!</span>");
        }   
    }
?>