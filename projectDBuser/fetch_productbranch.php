<?php
  
    include('config.php');
    $request=$_POST['request'];
    $query="select product_id, name, information, price, amount, branch_name, image from product inner join branch on product.branch_code = branch.branch_code where branch_name ='$request'";
    $output=mysqli_query($conn,$query);
    echo '<div style="padding:6%;">';
    echo '<table class="table table-hover" id="myTable">';
    echo '<tr>
    <thead>
    <th scope="col width="60" ">Photo</th>
    <th scope="col">Name</th>
    <th scope="col">Information</th>
    <th scope="col">Price</th>
    <th scope="col">Amount</th>
    <th scope="col">Branch</th>
    <thead>
    </tr>';
    while($fetch = mysqli_fetch_assoc($output))
    {
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row"><a target="_blank" href="images_user/'.$fetch["image"].'" id="'.$fetch["product_id"].'" title=" "><img src="images_user/'.$fetch["image"].'" height="50" width="50"/></a></td>';
        // ให้เลือกecho '<th scope="row"><a target="_blank" href="img/'.$fetch["image"].'" id="'.$fetch["product_id"].'" title=" "><img src="img/'.$fetch["image"].'" height="50" width="50"/></a></td>';
        echo '<td>'.$fetch['name'].'</a></td>';
        echo '<td>'.$fetch['information'].'</td>';
        echo '<td>'.$fetch['price'].'</td>';
        echo '<td>'.$fetch['amount'].'</td>';
        echo '<td>'.$fetch['branch_name'].'</td>';
        echo '</tr>';
        echo '</tbody>';
    
  };
echo '</table>';
echo '</div>';

 ?>