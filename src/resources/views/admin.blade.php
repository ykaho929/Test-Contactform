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

        <main class="main">
        <div class="main__inner">
            <h1 class="main__ttl">
                Admin
            </h1>
        </div>
        <div class="admin__content">
            <form class="search-form" action="/contents/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください” value="{{ old('keyword') }}"  />
                    <select class="search-form__item-select" name="gender">
                        <option value="">性別</option>
                    </select>
                    <select class="search-form__item-select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                    </select>
                    <input name="date" type="date" />                
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
                    <div class="search-form__button">
                    <button class="search-form__button-reset" input type="reset">リセット</button>
                </div>
            </form>
        </div>
        <div class="admin__content">
            <div class="export__button">エクスポート</button>
        ページネーションの記述
        </div>
        <div class="admin__content">
            <table class="contact-list">
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                </tr>
                @isset($contents)
                @foreach ($contents as $content)
                <tr>
                    <td>{{$name->id}}</td>
                    <td>{{$gender->id}}</td>
                    <td>{{$email->id}}</td>
                    <td>{{$category->id}}</td>                    
                </tr>
                @endforeach
                @endisset
                <details class="modal">
                    <a href="#modal-01" class="modal-button">詳細</a>
                    <div class="modal-wrapper" id="modal-01">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-window">
                    <div class="modal-content">
                        <table class="detail">
                        </table>
                    </div>
                    <a href="#!" class="modal-close"><i class="far fa-times-circle"></i></a>
                </details>
            </table>  
        </div>                  

    </main>

</body>
</html>