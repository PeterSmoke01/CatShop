<?php
  
    include('config.php');
    $request=$_POST['request'];
    $query="select * from service inner join branch on service.branch_code = branch.branch_code where branch_name ='$request'; ";
    $output=mysqli_query($conn,$query);
    echo '<div style="padding:15%;">';
    echo '<table class="table table-hover" id="myTable">';
    echo '<tr>
    <thead>
    <th scope="col">Name</th>
    <th scope="col">Detail</th>
    <th scope="col">Price</th>
    <th scope="col">Branch</th>
    <thead>
    </tr>';
    while($fetch = mysqli_fetch_assoc($output))
    {
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row">'.$fetch['service_name'].'</a></td>';
        echo '<td>'.$fetch['service_detail'].'</td>';
        echo '<td>'.$fetch['service_price'].'</td>';
        echo '<td>'.$fetch['branch_name'].'</td>';
        echo '</tr>';
        echo '</tbody>';
  };
echo '</table>';
echo '</div>';

 ?>