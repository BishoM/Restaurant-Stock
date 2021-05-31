<!doctype html>
<html lang="en">
<head>
    <title>
        ITUZE Restaurant
    </title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="main.css">-->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('bootstrap/css/menu.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('bootstrap/css/main.css'); ?>" rel="stylesheet">
</head>
<body id="bd"><br>
<h1><b><p style="background-color: grey; width: 590px; border-radius: 20px;">Restaurant Stock Management</p></b></h1><hr>
<div class="row" style="margin-top:40px;margin-left:35%" >
    <ul>
        <li><a href="Dashboard">Home</a></li>
        <li><a href="Stock">Stock</a></li>
        <li><a class="active" href="#">Stockin</a></li>
        <li><a href="/Kitchen/StockReq">Request</a></li>
        <li><a href="Delivered">Delivered</a></li>
        <li><a href="Stockout">Stockout</a></li>
        <li><a href="<?= site_url('Kitchen/Logout'); ?>">Logout</a></li>
    </ul>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <form action="<?= base_url('Kitchen/StockIn2'); ?>" method="POST">
                <div class="form-group">
                    <label for=""><h2>Insert Products</h2></b></label>
                    <input type="text" class="form-control" placeholder="Product Name"  name="pro_name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Product Quantity" name="pro_qua">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Product Price"  name="pro_price" >
                </div>
                <div class="form-group">
                    <button type="submit" name="lgn" class="btn btn-primary btn-block">Register</button>
                </div>
                <a href="<?= site_url("Kitchen/StockIn");?>">Back</a>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>