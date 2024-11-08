<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-contactform</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body>

    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/admin">
                FashionablyLate
            </a>
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">logout</button>
            </form>
        </div>
    </header>

    <main>
        <main class="main">
        <div class="main__inner">
            <a class="main__ttl">
                Admin
            </a>
        </div>
        <div class="admin__content">
            
    </main>

</body>
</html>