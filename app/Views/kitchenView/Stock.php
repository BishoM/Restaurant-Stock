<!doctype html>
<html lang="en">
<head>
    <title>
        ITUZE Restaurant
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('bootstrap/css/menu.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('bootstrap/css/main.css'); ?>" rel="stylesheet">
</head>

<body id="bd"><br>
<h1><b><p style="background-color: grey; width: 590px; border-radius: 20px;">Restaurant Stock Management</p></b></h1><hr>
<div class="row" style="margin-top:40px;margin-left:35%" >
    <ul>
        <li><a href="/Kitchen/Dashboard">Home</a></li>
        <li><a class="active" href="Stock">Stock</a></li>
        <li><a href="/Kitchen/Stockin">Stockin</a></li>
        <li><a href="/Kitchen/StockReq">Request</a></li>
        <li><a href="Delivered">Delivered</a></li>
        <li><a href="/Kitchen/Stockout">Stockout</a></li>
        <li><a href="<?= site_url('Kitchen/Logout'); ?>">Logout</a></li>
    </ul>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <table class="table table-hover" style="color: #e3ecf0;" bgcolor="darkslategray">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Used</th>
                    <th>Remain</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($mainModelInfo as $row) : ?>
                            <tr>
                                <td><?php echo $row['pro_id']; ?></td>
                                <td><?php echo $row['pro_name']; ?></td>
                                <td><?php echo $row['pro_quantity']; ?></td>
                                <td><?php echo $row['pro_price']; ?></td>
                                <td><?php echo $row['pro_used']; ?></td>
                                <td><?php echo $row['pro_remain']; ?></td>
                            </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>