<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('backend')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('backend')}}/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">IN+</h1>

        </div>
        <h3>Welcome to IN+</h3>
        <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" method="post" action="login">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-input">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email"
                           value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                <div class="form-input">
                    <input id="password" type="password" placeholder="Şifre" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Giriş Yap</button>

            <a href="/password/reset">
                <small>Şifreni mi unuttun?</small>
            </a>
            <p class="text-muted text-center">
                <small>Hesabın mı yok?</small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="register.html">Yeni bir hesap oluştur</a>
        </form>
        <p class="m-t">
            <small>Kare-Code Admin &copy; 2016</small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('backend')}}/js/jquery-2.1.1.js"></script>
<script src="{{asset('backend')}}/js/bootstrap.min.js"></script>

</body>

</html>
