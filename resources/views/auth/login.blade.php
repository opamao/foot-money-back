<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>:: Soccer :: Se connecter</title>

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/theme1.css" />
</head>

<body class="font-montserrat">
    <div class="auth">
        <div class="auth_left">
            <form action="{{ url('index') }}" method="GET">
                @csrf
                <div class="card">
                    <div class="text-center mb-2">
                        <a class="header-brand" href="#"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="card-title">Connectez-vous à votre compte</div>
                        <div class="form-group">
                            <input required type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Entez votre adresse e-mail">
                        </div>
                        <div class="form-group">
                            <input required type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Mot de passe">
                            <label class="form-label"><a href="{{ url('forgot') }}"
                                    class="float-right small">J'ai oublié mon mot de passe</a></label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block" title>Se connecter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="auth_right full_img"></div>
    </div>
    <script src="{{ asset('') }}assets/bundles/lib.vendor.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/core.js"></script>
</body>

</html>
