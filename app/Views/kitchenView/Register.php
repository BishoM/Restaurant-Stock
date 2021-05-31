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
            <h4><b>Create Account</b></h4><hr>
            <form action="<?= base_url('Kitchen/InsertUser'); ?>" method="POST" ioutocomplete="off">
                <?= csrf_field();?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger" >
                        <?= session()->getFlashdata('Fail');  ?>
                    </div>
                <?php endif ?>
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success" >
                        <?= session()->getFlashdata('success');  ?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <label for=""><b>Full Name</b></label>
                    <input type="text" class="form-control" placeholder="Full Name"  name="name" value="<?= set_value('name');?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                </div>
                <div class="form-group">
                    <label for=""><b>Username</b></label>
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username');?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
                </div>
                <div class="form-group">
                    <label for=""><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Password"  name="password" value="<?= set_value('password');?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                </div>
                <div class="form-group">
                    <label for=""><b>Confirm Password</b></label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?= set_value('name');?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
                </div>
                <div class="form-group">
                    <label for=""><b>Email</b></label>
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email');?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="lgn" value="login" class="btn btn-primary btn-block">Sign Up</button>
                </div>
                <a href="<?= site_url("Kitchen");?>">Already have account Sign In</a>
            </form>
        </div>
    </div>
</div>
</div>
</body>
</html>