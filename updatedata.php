<?php


include('config.php');

$id=$_GET['id'];

$query="SELECT * FROM details WHERE id='$id'";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>CURD APP IN PHP</title>
</head>
<body>
    

<div class="container">
    <div class="jumbotron">
      <h2>PHP CURD: Update Data</h2>
      <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
          <label for="">First Name</label>
          <input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname']; ?>">  
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname']; ?>">
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-danger">CANCEL</a>
      </form>
    </div>
  </div>
  </body>
</html>
<?php



if(isset($_POST['update']))
 {
     $firstname=$_POST['firstname'];
     $lastname=$_POST['lastname'];
     $address=$_POST['address'];

     $query="UPDATE details SET firstname='$firstname', lastname='$lastname', address='$address' WHERE id='$id'";

     $result=mysqli_query($conn,$query);

     if($result)
      {
          echo "<script>alert('Details updated successfully')
          window.location='index.php';
          </script>";
       
         
      }else
      {
          echo "<script>alert('Failed to update details')
          window.location='updatedata.php';
          </script>";
      }
 }


?>