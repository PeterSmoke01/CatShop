<?php
  
  include('server.php');
  $request=$_POST['request'];
  $query="select * from product inner join branch on product.branch_code = branch.branch_code where type_product='$request';";
  $output=mysqli_query($conn,$query);
  echo '<div style="padding:1%;">';
  echo '<table class="table table-hover" id="myTable">';
  echo '<tr>
  <thead>
  <th scope="col">Photo</th>
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
    <a class="btn btn-primary" href="edit.php?product_id='.$fetch['product_id'].'" style="color:white;">Edit</a>
    <a class="btn btn-danger" href="delete.php?product_id='.$fetch['product_id'].'" style="color:white;">Delete</a>
    </td>';
    echo '</tr>';
    echo '</tbody>';
    
  };
echo '</table>';
echo '</div>';

 ?>