<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>:: Soccer :: Mot de passe oublié</title>

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/theme1.css" />
</head>

<body class="font-montserrat">
    <div class="auth">
        <div class="auth_left">
            <form action="#" method="POST">
                @csrf
                <div class="card">
                    <div class="text-center mb-5">
                        <a class="header-brand" href="#"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="card-title">Mot de passe oublié</div>
                        <p class="text-muted">
                            Entrez votre adresse e-mail et votre mot de passe sera réinitialisé et vous sera envoyé par
                            e-mail.
                        </p>
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Adresse e-mail</label>
                            <input required type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Entrez e-mail">
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">Envoyez-moi un nouveau mot de
                                passe</button>
                        </div>
                    </div>
                    <div class="text-center text-muted">
                        Oubliez ça, <a href="{{ url('/') }}">renvoyez-moi</a> à l'écran de connexion.
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
