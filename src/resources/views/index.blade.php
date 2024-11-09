<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-contactform</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>

    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <main class="main">
        <div class="main__inner">
            <a class="main__ttl">
                Contact
            </a>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="first_name" placeholder="例：山田" />
                        </div>
                        <div class="form__input--text">
                            <input type="text" name="last_name" placeholder="例：太郎" />
                        </div>
                        <div class="form__error">

                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">性別</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="gender" placeholder="男性" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">メールアドレス</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="email" placeholder="例：test@example.com" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">電話番号</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="tell" placeholder="080-1234-5678" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">住所</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷１－２－３" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">建物名</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="building" placeholder="例：千駄ヶ谷マンション１０１" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">お問い合わせ種類</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="category_id" placeholder="選択してください" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">お問い合わせ内容</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="detail" placeholder="例：お問い合わせ内容をご記入ください" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>        
    </main>

</body>
</html>