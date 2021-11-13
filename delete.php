<?php


$id=$_GET['id'];

include('config.php');

$query="DELETE FROM details WHERE id='$id'";

$result=mysqli_query($conn,$query);

if($result)
 {
     echo "<script>alert('Data Deleted Successfully')</script>";
     echo "<script>window.location.href='index.php'</script>";
 }else
 {
     echo "<script>alert('Failed to Delete Data')</script>";
     echo "<script>window.location.href='index.php'</script>";
 }



?>