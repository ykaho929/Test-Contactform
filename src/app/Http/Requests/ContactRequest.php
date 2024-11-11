<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string','max:255'],
            'last_name' => ['required', 'string','max:255'],
            'gender' => ['required'],
            'email' => ['required','email', 'max:255'],
            // 'tell' => ['required', 'numeric', 'max:5'], 
            'tell_first' => ['nullable', 'digits:5'],
            'tell_second' => ['nullable', 'digits:5'],
            'tell_third' => ['nullable', 'digits:5'],
            'address' => ['required', 'max:255'],
            'building' => ['max:225'],
            'category_id' => ['required'],
            'detail' => ['required','max:120']
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $tellFirst = $this->input('tell_first');
            $tellSecond = $this->input('tell_second');
            $tellThird = $this->input('tell_third');

            if (($tellFirst || $tellSecond || $tellThird) && (! $tellFirst || ! $tellSecond || ! $tellThird)) {
                $validator->errors()->add('tell', '電話番号を入力してください');
            }
        });
    }

    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'first_name.string' => '姓を文字列で入力してください',
            'last_name.required' => '名を入力してください',
            'last_name.string' => '名を文字列で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'tell_first.digits' => '電話番号は5桁までの数字で入力してください',
            'tell_second.digits' => '電話番号は5桁までの数字で入力してください',
            'tell_third.digits' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.max' => '住所を255文字以下で入力してください',
            'building.max' => '建物名を255文字以下で入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
