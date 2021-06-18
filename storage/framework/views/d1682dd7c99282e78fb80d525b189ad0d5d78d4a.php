<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Haider2100</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>Haider2100</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="<?php echo e(route('register')); ?>" method="POST">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3>
            <div class="form-group">
                <?php echo e(csrf_field()); ?>

                <label class="control-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="User name" name="username" value="<?php echo e(old('username')); ?>" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>">
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>

            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="<?php echo e(route('LoginB')); ?>" ><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
        </form>

    </div>
</section>


</body>
</html>
<?php /**PATH D:\xampp\htdocs\CTG-ONLINE-159\LaravelProject\ctg-online-159\resources\views/register.blade.php ENDPATH**/ ?>