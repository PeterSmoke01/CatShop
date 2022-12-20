<?php
$SuccessMessage = "";
include('server.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $service_name = $_POST['service_name'];
    $service_detail = $_POST['service_detail'];
    $service_price = $_POST['service_price'];
    $branch_code = $_POST['branch_code'];
    mysqli_query($conn, "INSERT INTO service ( service_name, service_detail, service_price, branch_code)
                    VALUES ( '$service_name', '$service_detail', '$service_price', '$branch_code')");
                    $SuccessMessage = "Service has been added!";
};
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserting...</title>

    <script src="jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

    <body>
    <br>
    <h1 style="padding-left:3%;">Add Service</h1>


    <form style="margin:3%;" method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Name</label>
      <input type="text" class="form-control" name="service_name" placeholder="name" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault05">Price</label>
      <input type="number" class="form-control" name="service_price" placeholder="Price" required>
    </div>

  </div>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationDefault03">Information</label>
      <input type="text" class="form-control" name="service_detail" placeholder="information" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault04">Branch</label>
      <!-- <input type="text" class="form-control" name="branch_code" placeholder="Branch"0
       required> -->
       <select class="form-control" name="branch_code" required>
        <option value="" disabled="" selected="">Select Branch</option>
        <option value=1>Bang Mod</option>
        <option value=2>Bang Na</option>
        <option value=3>Bang Bo</option>
        </select>
    </div>
  </div>
  <br>
  <a href="index.php" class="btn btn-primary" style="margin-right:1%;">&laquo; Back</a>
  <button class="btn btn-primary" type="submit">Submit</button>
</form>
<?php
    if(!empty($SuccessMessage)){
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert' style='margin:3%;'>
        $SuccessMessage
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
        ";
    };
?>
  </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>