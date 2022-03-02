<html>

<head>
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="frontend/assest/assets/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
    body {
        margin: 0;
        color: #6a6f8c;
        /* background: #c8c8c8; */
        /* background: content-box radial-gradient(pink, white); */
        background-image: radial-gradient(pink, #99ffff, #4db8ff);
        font: 600 16px/18px 'Open Sans', sans-serif
    }

    .login-box {
        top: 19px;
        left: 600;
        width: 100%;
        height: 868px;
        bottom: 10px;
        position: fixed;
        margin: auto;
        max-width: 525px;
        min-height: 670px;
        position: relative;
        background: url(https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80) no-repeat center;
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19)
    }

    .login-snip {
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 90px 70px 50px 70px;
        background: rgba(0, 77, 77, .9)
    }

    .login-snip .login,
    .login-snip .sign-up-form {
        top: -10;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear
    }

    .login-snip .sign-in,
    .login-snip .sign-up,
    .login-space .group .check {
        display: none
    }

    .login-snip .tab,
    .login-space .group .label,
    .login-space .group .button {
        text-transform: uppercase
    }

    .login-snip .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent
    }

    .login-snip .sign-in:checked+.tab,
    .login-snip .sign-up:checked+.tab {
        color: #fff;
        border-color: #1161ee
    }

    .login-space {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d
    }

    .login-space .group {
        margin-bottom: 15px
    }

    .login-space .group .label,
    .login-space .group .input,
    .login-space .group .button {
        width: 100%;
        color: #fff;
        display: block
    }

    .login-space .group .input,
    .login-space .group .button {
        border: none;
        padding: 15px 20px;
        border-radius: 25px;
        background: rgba(255, 255, 255, .1)
    }

    .login-space .group input[data-type="password"] {
        text-security: circle;
        -webkit-text-security: circle
    }

    .login-space .group .label {
        color: #ccebff;
        font-size: 15px
    }

    .login-space .group .button {
        background: #00aaff
    }

    .login-space .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1)
    }

    .login-space .group label .icon:before,
    .login-space .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s
    }

    .login-space .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0)
    }

    .login-space .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0)
    }

    .login-space .group .check:checked+label {
        color: #fff
    }

    .login-space .group .check:checked+label .icon {
        background: #1161ee
    }

    .login-space .group .check:checked+label .icon:before {
        transform: scale(1) rotate(45deg)
    }

    .login-space .group .check:checked+label .icon:after {
        transform: scale(1) rotate(-45deg)
    }

    .login-snip .sign-in:checked+.tab+.sign-up+.tab+.login-space .login {
        transform: rotate(0)
    }

    .login-snip .sign-up:checked+.tab+.login-space .sign-up-form {
        transform: rotate(0)
    }

    *,
    :after,
    :before {
        box-sizing: border-box
    }

    .clearfix:after,
    .clearfix:before {
        content: '';
        display: table
    }

    .clearfix:after {
        clear: both;
        display: block
    }

    a {
        color: inherit;
        text-decoration: none
    }

    .hr {
        height: 2px;
        margin: 60px 0 50px 0;
        background: rgba(255, 255, 255, .2)
    }

    .foot {
        text-align: center
    }

    .card {
        width: 500px;
        left: 100px
    }

    ::placeholder {
        color: #b3b3b3
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 30%;
    }

    #borderimg3 {
        /* border: 30px solid transparent; */
        padding: 10px;
        border-image: url(frontend/assest/img/blog_logo14.png) 30% round;
    }

    .error {
        color: red;
    }
</style>

<body>
    <div class="row">
        <div class="col-md-6 mx-auto p-0">
            <div class="card">
                <div class="login-box">
                    <div class="login-snip">
                        <img id="borderimg3" src="frontend/assest/img/blog_logo14.png" size alt="..." class="center img-thumbnail" width="70px" height="70px" />
                        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
                        <div class="login-space">
                            <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('register')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="group">
                                    <label for="name" class="label">Username</label>
                                    <input id="name" type="text" class=" form-input w-full input @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" placeholder="Pleas enter Username" autocomplete="name" autofocus>
                                    @error('name')
                                    <p class="error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="email" class="label">email Address</label>
                                    <input id="email" type="email" class=" form-input w-full input @error('email')  border-red-500 @enderror" name="email" value="{{ old('email') }}" placeholder="please Enter Email" autocomplete="email" autofocus>
                                    @error('email')
                                    <p class="error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="password" class="label">password</label>
                                    <input id="password" type="password" class="form-input w-full input @error('password')  border-red-500 @enderror" name="password" value="{{ old('password') }}" placeholder="please enter strong password" autofocus>
                                    @error('password')
                                    <p class="error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="password-confirm" class="form-input w-full  label">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-input w-full input" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="new-password" placeholder="please confirm Your password ">
                                        @error('password_confirmation')
                                    <p class="error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="group">
                                    <label for="profile" class="label">profile</label>
                                    <input id="profile" type="file" class=" form-input w-full input @error('profile')  border-red-500 @enderror" name="profile" value="{{ old('profile') }}" placeholder="please add profile" autofocus>
                                    @error('profile')
                                    <p class="error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="group"> <a class="nav-link" href="#" style="color: white;"><input type="submit" class="button" value="Sign Up"> </a>
                                </div>
                                <div class="foot">
                                    <label><a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Already Member?') }}</a></label>
                                </div>
                                <!-- add url -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>