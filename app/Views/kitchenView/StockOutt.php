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
        <li><a href="/Dashboard/Stock">Stock</a></li>
        <li><a href="/Kitchen/StockIn">Stockin</a></li>
        <li><a href="/Kitchen/StockReq">Request</a></li>
        <li><a href="Delivered">Delivered</a></li>
        <li><a class="active" href="#">Stockout</a></li>
        <li><a href="<?= site_url('Kitchen/Logout'); ?>">Logout</a></li>
    </ul>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <form action="<?= base_url('/Kitchen/StockOutOp'); ?>" method="POST">
                <div class="form-group">
                    <label for=""><h2>Stock Out</h2></b></label>
                    <input type="hidden" class="form-control" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                </div>
                <div class="form-group">
                    <label for=""><b>Product Name</b></label>
                    <input type="text" class="form-control" readonly name="pro_name" value="<?php echo $row['pro_name']; ?>">
                </div>
                <div class="form-group">
                    <label for=""><b>Product Remained</b></label>
                    <input type="text" class="form-control" readonly name="pro_remain" value="<?php echo $row['pro_remain']; ?>">
                    <input type="hidden" class="form-control" name="pro_used" value="<?php echo $row['pro_used']; ?>">
                </div>
                <div class="form-group">
                    <label for=""><b>Product Remained</b></label>
                    <input type="text" class="form-control" placeholder="Product Quantity" name="pro_qua">
                </div>
                <div class="form-group">
                    <button type="submit" name="lgn" class="btn btn-primary btn-block">Stock Out</button>
                </div>
                <a href="<?= site_url("/Kitchen/StockOut");?>">Back</a>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>