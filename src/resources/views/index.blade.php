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


    <main class="main">
        <div class="main__inner">
            <h1 class="main__ttl">
                Contact
            </h1>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--text">
                            <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">性別</span>
                     <div class="form__group-content">
                        <input type="radio" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }}> 男性
                        <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> 女性
                        <input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}> その他
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">メールアドレス</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <div class="form__group-content">
                        <div>
		                    <input type="text" id="tell_first" name="tell_first" placeholder="080" maxlength="5" value="{{ old('tell_first') }}"> -
                            @error('tell_first')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
	                    </div>
                        <div>
	                        <input type="text" id="tell_second" name="tell_second" placeholder="1234" maxlength="5" value="{{ old('tell_second') }}"> -
                            @error('tell_second')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
	                    <div>
	                        <input type="text" id="tell_third" name="tell_third" placeholder="5678" maxlength="5" value="{{ old('tell_third') }}">
                            @error('tell_third')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
	                    </div>
                    </div>
                    <div class="form__error">
                        @error('tell')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                <span class="form__label--item">住所</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷１－２－３" value="{{ old('address') }}"/>
                        </div>
                    @error('address')
                        {{ $message }}
                    @enderror    
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                     <span class="form__label--item">建物名</span>
                     <div class="form__group-content">
                        <div class="form__input--text">
                             <input type="text" name="building" placeholder="例：千駄ヶ谷マンション１０１" value="{{ old('building') }}"/>
                        </div>
                        @error('building')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ種類</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                             <select name="category_id">
                                <option disabled selected value="{{ old('category_id') }}">選択してください</option>
                                <!-- <option value="A">option_A</option> -->
                            </select> 
                        </div>
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <div class="form__group-content">
                        <div class="form__input--text">
                             <textarea name="detail" placeholder="例：お問い合わせ内容をご記入ください">{{ old('detail') }}
                             </textarea>
                        </div>
                        @error('detail')
                            {{ $message }}
                        @enderror
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