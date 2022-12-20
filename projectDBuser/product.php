<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeTSHoP</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,400;1,600;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    

    <script src="jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function()
                        {
            $("#fetchval").on('change',function()
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
            td = tr[i].getElementsByTagName("td")[1];
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


</head>


<body>

    <header>
        <h1 class="logo" style="text-align: center;">PeTSHoP</h1>
        <div class="bx bx-menu" id = "menu-icon"></div>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="product_branch.php">By Branch</a></li>
            <li><a href="service.php">Service</a></li>
            <li><a href="contact.php">Contact & Branch</a></li>
        </ul>
    </header>

    <div class="col" style="top: 200px; padding: 50px;" >
      <input type="text" class="form-control" placeholder="ค้นหาข้อมูลสินค้า" id="myInput" onkeyup="myFunction()">
    </div>
    
    
    <div class="col" style="top: 120px; padding: 50px;">
      <select class="form-control" id="fetchval" name="fetchby" >
        <option value="" disabled="" selected="">เลือกชนิคสินค้า . . . </option>
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

    
    <div id="table-container">
        <?php
        include('config.php');
        $query="select product_id, name, information, price, amount, branch_name, image from product inner join branch on product.branch_code = branch.branch_code";
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
            echo '<td>'.$fetch['name'].'</td>';
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
    </div>

  

</body>
</html>