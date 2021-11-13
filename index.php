
<?php

include('config.php');

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



<!-- Modal -->
<div class="modal fade" id="detailsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Person Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
       
       <div class="form-group">
           <label>First Name</label>
           <input type="text" name="firstname" class="form-control" placeholder="First Name">
       </div>

       <div class="form-group">
           <label>Last Name</label>
           <input type="text" name="lastname" class="form-control" placeholder="Last Name">
       </div>

       <div class="form-group">
           <label>Address</label>
           <input type="text" name="address" class="form-control" placeholder="Address">
       </div>

       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal End-->


 <div class="container">
     <div class="jumbotron">
         <div class="card">
             <h2>PHP CURD APP USING BS POPUP MODAL</h2>
             
         </div>
         <div class="card">
             
             <div class="card-body">
             <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#detailsmodal">
             ADD DATA
             </button>
             <br>
             <br>
             <table class="table table-dark">
          <thead class="table-dark">
       <tr>
           <th>ID</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Address</th>
           <th>Edit</th>
           <th>Delete</th>
       </tr>
   </thead>

            <tbody>
        <?php
    
        $query = "SELECT * FROM details";
        $result=mysqli_query($conn,$query);
       
        while($row=mysqli_fetch_array($result))
        {

        ?>
           
            <tr>
             <th><?php echo $row['id']; ?></th>
             <th><?php echo $row['firstname']; ?></th>
             <th><?php echo $row['lastname']; ?></th>
             <th><?php echo $row['address']; ?></th>
             <th><a style="color:white" href="updatedata.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit Data</a></th>
             <th><a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></th>
            </tr>
        <?php
      
        }  
          
         ?>
  
             </tbody>
             </table>  

             </div>

         </div>
     </div>
 </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</script>    
</body>
</html>


<?php

if(isset($_POST["submit"]))
 {
   $firstname=$_POST["firstname"];
   $lastname=$_POST["lastname"];
   $address=$_POST["address"];

   $query="INSERT INTO details(firstname,lastname,address) VALUES('$firstname', '$lastname', '$address')";

   $result=mysqli_query($conn,$query);

   if($result)
    {
        echo "<script>alert('Records Inserted Sucessfully!')
        window.location='index.php';
        </script>";
    }else
    {
        echo "<script>alert('Failed to Insert Records!')
        window.location='index.php';
        </script>";
    }

 }



?>



