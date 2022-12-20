<?php 
    
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petshop Admin</title>
    <script src="jquery.js"></script>

    <script>
        $(document).ready(function()
                        {
            $("#fetchval").on('change',function()
                            {
                var keyword = $(this).val();
                $.ajax(
                {
                    url:'fetch.php',
                    type:'POST',
                    data:'request='+keyword,
                    success:function(data)
                    {
                        $("#table-container").html(data);
                    },
                });
            });
        });
    </script>

    <script>
        $(document).ready(function()
                        {
            $("#fetchvall").on('change',function()
                            {
                var keyword = $(this).val();
                $.ajax(
                {
                    url:'fetch1.php',
                    type:'POST',
                    data:'request='+keyword,
                    success:function(data)
                    {
                        $("#table-container").html(data);
                    },
                });
            });
        });
    </script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
  </head>
    <body>
    <div class="homeheader">
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p><a href=""> Admin</a> <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>
    <br>

    <div class="col" style="width: 500px; left: 100px;" >
      <input type="text" class="form-control" placeholder="Search" id="myInput" onkeyup="myFunction()">
    </div>

    <div class="col" style="width:500px; position: relative; left: 700px; top:-38px;">
      <select class="form-control" id="fetchval" name="fetchby" >
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

    <div class="col" style="width:500px; position: relative; left: 1300px; top:-76px;">
      <select class="form-control" id="fetchvall" name="fetchby" >
        <option value="" disabled="" selected="">Select Branch</option>
        <option value="Bang Mod">Bang Mod</option>
        <option value="Bang Na">Bang Na</option>
        <option value="Bang Bo">Bang Bo</option>
    </select>
    </div>     

    <div class="col" style="position: relative; left: 855px;">
      <a href="newproduct.php" class="btn btn-primary">Add New Product</a>
    </div>

    <div class="col" style="position: relative; left: 855px; top:2px;">
      <a href="newservice.php" class="btn btn-primary">Add New Services</a>
    </div>

  <div id="table-container">
  <?php
  include('server.php');
  $query="select * from product inner join branch on product.branch_code = branch.branch_code;";
  $output=mysqli_query($conn,$query);
  echo '<div style="padding:1.5%;">';
  echo '<table class="table table-hover" id="myTable">';
      echo '<tr>
      <thead>
      <th scope="col">Photos</th>
      <th scope="col">Name</th>
      <th scope="col">Information</th>
      <th scope="col">Branch</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
      <thead>
      </tr>';
  while($fetch = mysqli_fetch_assoc($output))
  {
    echo '<tbody>';
    echo '<tr>';
    echo '<th scope="row"><a href="#" id="'.$fetch["product_id"].'" title=" "><img src="images/'.$fetch["image"].'" alt="images/'.$fetch["image"].'" height="50" width="50"/></a></td>';
    echo '<td>'.$fetch['name'].'</td>';
    echo '<td>'.$fetch['information'].'</td>';
    echo '<td>'.$fetch['branch_name'].'</td>';
    echo '<td>'.$fetch['type_product'].'</td>';
    echo '<td>'.$fetch['price'].'</td>';
    echo '<td>'.$fetch['amount'].'</td>';
    echo '<td>
    <a class="btn btn-info" href="edit.php?product_id='.$fetch['product_id'].'" style="color:white;">Edit</a>
    <a class="btn btn-danger" href="delete.php?product_id='.$fetch['product_id'].'" style="color:white;">Delete</a>
    </td>';
    echo '</tr>';
    echo '</tbody>';
  };
  echo '</table>';
  echo '</div>';
  ?>
  </div>

  <script src="js/bootstrap.min.js"></script>
    <script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
  </body>
</html>