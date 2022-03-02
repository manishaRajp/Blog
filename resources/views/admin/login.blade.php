<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('./admin/assets/css/style-login.css')}}">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-md-5 mx-auto p-5">
            <div class="card">
                <div class="login-box">
                    <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Admin Login</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
                        <div class="login-space">
                            <div class="login">
                                
                                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('admin.login') }}">
                                    @csrf

                                    <div class="group">
                                        <label for="email" class="label">Email</label>
                                        <input id="email" type="text" name="email" class="input" placeholder="Enter your email">
                                    </div>
                                    <div class="group">
                                        <label for="password" class="label">Password</label>
                                        <input type="password" name="password" class="input" placeholder="Enter your password">
                                    </div>

                                    <div class="group"> <input type="submit" class="button" value="Sign In"> </div>
                                    <div class="hr"></div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>

</html>