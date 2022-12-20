<?php
$SuccessMessage = "";
include('server.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $type_product = $_POST['type_product'];
    $information = $_POST['information'];
    $branch_code = $_POST['branch_code'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $image = $_POST['image'];
    mysqli_query($conn, "INSERT INTO product ( name, type_product, information, branch_code, price, amount, image)
                    VALUES ( '$name', '$type_product', '$information', '$branch_code', '$price', '$amount', '$image')");
                    $SuccessMessage = "Product has been added!";
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
    <h1 style="padding-left:3%;">Add Product</h1>


    <form style="margin:3%;" method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Type</label>
      <select class="form-control" name="type_product" required>
        <option value="" disabled="" selected="">Select Type</option>
        <option value="wet food">wet food</option>
        <option value="dry food">food pellets</option>
        <option value="sandcat">cat sand</option>
        <option value="snack">snack</option>
        <option value="toilet">toilet</option>
        <option value="bed">bed for cat</option>
        <option value="shower">shower for cat</option>
        <option value="vitamin">vitamin</option>
        <option value="medicine">medicine</option>
        <option value="toy">toy</option>
      </select>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault05">Price</label>
      <input type="number" class="form-control" name="price" placeholder="Price" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault05">Amount</label>
      <input type="number" class="form-control" name="amount" placeholder="Amount" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationDefault03">Information</label>
      <input type="text" class="form-control" name="information" placeholder="Information" required>
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
    <div class="col-md-2 mb-3">
      <label for="validationDefault06">image</label>
      <input type="text" class="form-control" name="image" placeholder="image" required>
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