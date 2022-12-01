<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.14/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.14/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.14/dist/js/uikit-icons.min.js"></script>
</head>
<body>
    
    <form method="POST" action="/login">
        @csrf
        <fieldset class="uk-fieldset uk-position-center">
            <legend class="uk-legend">Login</legend>
            @if (session()->has('gagal'))
                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>{{ session('gagal') }}</p>
                </div>
            @endif

            <div class="uk-margin">
                <p class="uk-margin-remove">Username</p>
                <input class="uk-input uk-form-width-large" name="username" type="text" aria-label="Username">
            </div>
            <div class="uk-margin">
                <p class="uk-margin-remove">Password</p>
                <input class="uk-input uk-form-width-large" name="password" type="password" aria-label="Password">
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-width-1-1">LOGIN</button>
        </fieldset>
    </form>
</body>
</html>