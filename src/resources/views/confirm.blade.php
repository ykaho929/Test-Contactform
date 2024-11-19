<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-contactform</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('comfirm.css') }}" />
</head>
<body>

    <header class="header">
        <div class="header__inner">
            <a class="header__logo">
                FashionablyLate
            </a>
        </div>
    </header>

    <main class="main">
        <div class="main__inner">
            <h1 class="main__ttl">
                Confirm
            </h1>
        </div>
        <form class="form" action="handle" method="post">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <td>{{ $contact['gender'] }}</td>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td>{{ $contact['email'] }}</td>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td>{{ $contact['tell'] }}</td>
                        </td>                        
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td>{{ $contact['address'] }}</td>
                        </td>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td>{{ $contact['building'] }}</td>
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ種類</th>
                        <td>{{ $contact['category_content'] }}</td>
                        </td>
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td>{{ $contact['detail'] }}</td>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit" name="action" value="store">送信</button>
                <button class="form__button-submit" name="submit" type="submit" name="action" value="edit">修正</button>
            </div>
        </form>        
    </main>

</body>
</html>