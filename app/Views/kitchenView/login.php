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
    <link href="<?= base_url('bootstrap/css/main.css'); ?>" rel="stylesheet">
</head>
<body id="bd">
<div class="container">
    <div class="row" style="margin-top:45px;margin-left:30%" >
        <div class="col-md-4 col-md-offset-4">
            <h4><b>Login</b></h4><hr>
                <form action="<?= base_url('Kitchen/CheckLogin'); ?>" method="POST" outocomplete="off">
                    <?= csrf_field();?>
                    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger" >
                            <?= session()->getFlashdata('fail');  ?>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for=""><b>Email</b></label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email');?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for=""><b>Password</b></label>
                        <input type="password" class="form-control" placeholder="Password"  name="password">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="login" class="btn btn-primary btn-block">login</button>
                    </div>
                    <a href="<?= site_url("Kitchen/Register");?>">Create new account</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>