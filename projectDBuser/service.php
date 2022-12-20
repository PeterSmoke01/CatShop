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
    <script type="text/javascript" src="script/getData.js"></script>
    <script src="jquery.js"></script>
    <script>
        $(document).ready(function()
                        {
            $("#fetchval").on('change',function()
                            {
                var keyword = $(this).val();
                $.ajax(
                {
                    url:'fetch_service.php',
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
</head>
</head>
<body>

    <header>
        <h1 class="logo" style="text-align: center;">PeTSHoP</h1>
        <div class="bx bx-menu" id = "menu-icon"></div>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="">Service</a></li>
            <li><a href="contact.php">Contact & Branch</a></li>
        </ul>
    </header>


    <div class="col" style="top: 250px; padding: 50px;">
        <select class="form-control" id="fetchval" name="fetchby" >
            <option value="" disabled="" selected="">เลือกรับชมบริการ</option>
            <option value="Bang Mod">Bang Mod</option>
            <option value="Bang Na">Bang Na</option>
            <option value="Bang Bo">Bang Bo</option>
        </select>
    </div>
    
    <div id="table-container">
        <?php
        include('config.php');
        $query="select * from service inner join branch on service.branch_code = branch.branch_code;";
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
            echo '<th scope="row"><a href = "https://www.thecathospital.com/">'.$fetch['service_name'].'</a></td>';
            echo '<td>'.$fetch['service_detail'].'</td>';
            echo '<td>'.$fetch['service_price'].'</td>';
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