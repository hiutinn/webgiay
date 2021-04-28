<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/frontend/logintemplate/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/frontend/logintemplate/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/logintemplate/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/frontend/logintemplate/css/style.css">

    <title>Login #5</title>
</head>
<body>


<div class="d-md-flex half">
    <div class="bg" style="background-image: url('/image/something.png');"></div>
    <div class="contents">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="form-block mx-auto">
                        <div class="text-center mb-5">
                            <h3 class="text-uppercase">Login to <strong>SomeThing</strong></h3>
                        </div>
                        <form action="{{ route('admin.postLogin') }}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Username</label>
                                <input name="email" type="text" class="form-control" placeholder="your-email@gmail.com" id="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Mật Khẩu</label>
                                <input name="password" type="password" class="form-control" placeholder="Your Password" id="password">
                            </div>

                            <div class="d-sm-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                                    <input name="remember" type="checkbox" value="1"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Quên Mật Khẩu</a></span>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>

                            <span class="text-center my-3 d-block">or</span>


                            <div class="">
                                <a href="#" class="btn btn-block py-2 btn-facebook">
                                    <span class="icon-facebook mr-3"></span> Login with facebook
                                </a>
                                <a href="#" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> Login with Google</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



<script src="/frontend/logintemplate/js//jquery-3.3.1.min.js"></script>
<script src="/frontend/logintemplate/js//popper.min.js"></script>
<script src="/frontend/logintemplate/js//bootstrap.min.js"></script>
<script src="/frontend/logintemplate/js//main.js"></script>
</body>
</html>
