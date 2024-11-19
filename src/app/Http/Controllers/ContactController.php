<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function create(Request $request)
{
    $contact = $request->session()->get('contact', []);
    $categories = Category::all();

    return view('index', compact('categories', 'contact'));
}

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tell',
            'address',
            'building',
            'detail'
        ]);

        $contact['name'] = $request->first_name . ' ' . $request->last_name;

        $genderLabels = [
            '1' => '男性',
            '2' => '女性',
            '3' => 'その他',
        ];
        $contact['gender_label'] = $genderLabels[$contact['gender']] ?? '未設定';
        $contact['gender'] = $request->gender;
        // $contact['tell'] = $request->tell_first . '-' . $request->tell_second . '-' . $request->tell_third;
        $contact['category_content'] = Category::where('id', $contact['category_id'])->value('content') ?? '未分類';

        $request->session()->put('contact', $contact);

        return view('confirm', compact('contact'));
    }

    public function handle(Request $request)
    {
        $contact = $request->session()->get('contact');

        if (!$contact) {
            return redirect()->route('contact.create')->withErrors(['error' => 'セッションが切れました。もう一度やり直してください。']);
        }
        
        if ($request->input('action') === 'store') {
            Contact::create([
            'first_name' => $contact['first_name'],
            'last_name' => $contact['last_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tell' => $contact['tell'],
            'address' => $contact['address'],
            'building' => $contact['building'],
            'category_id' => $contact['category_id'],
            'detail' => $contact['detail'],
        ]);
        
            $request->session()->forget('contact');
            return redirect()->route('contact.thanks');
        }
        if ($request->input('action') === 'edit') {
            $request->session()->put('contact', $contact);
            return redirect()->route('contact.create')->withInput($contact);
        }
        return redirect()->route('contact.create');
    }

    public function thanks()
    {
    return view('thanks');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin'); 
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }

    public function admin()
    {
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories')); 
    }

   public function search(Request $request)
    {
        $categories = Category::all();
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $contacts = $query->paginate(7); 

        return view('admin', compact('contacts', 'categories'));
    }
}
