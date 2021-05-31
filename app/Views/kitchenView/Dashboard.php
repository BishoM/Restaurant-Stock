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
        <li><a class="active" href="#">Home</a></li>
        <li><a href="/Dashboard/Stock">Stock</a></li>
        <li><a href="/Kitchen/StockIn">Stockin</a></li>
        <li><a href="/Kitchen/StockReq">Request</a></li>
        <li><a href=Delivered">Delivered</a></li>
        <li><a href="/Kitchen/StockOut">Stockout</a></li>
        <li><a href="<?= site_url('Kitchen/Logout'); ?>">Logout</a></li>
    </ul>
<div class="container">
        <div class="col-md-4 col-md-offset-4">
            <table class="table table-hover" style="color: #e3ecf0;" bgcolor="darkslategray">
                <thead>
                <tr>
                    <th>FullName</th>
                    <th> Username</th>
                    <th> Email</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= ucfirst($userInfo['full_name']);?></td>
                    <td><?= $userInfo['username']; ?></td>
                    <td><?= $userInfo['email']; ?></td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>