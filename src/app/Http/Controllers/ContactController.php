<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('index', compact('categories'));        
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'category_id','first_name','last_name','gender','email','tel','address','building','detail'
        ]);
        $contact['name'] = $request->first_name . ' ' . $request->last_name;
        $contact['tel'] = $request->tell_first . '-' . $request->tell_second . '-' . $request->tell_third;

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $name = $request->first_name . ' ' . $request->last_name;
        $tel = $request->tell_first . '-' . $request->tell_second . '-' . $request->tell_third;

        Contact::create([
            'name' => $name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $tell,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);

        return redirect()->route('contacts.thankyou');
    }

    public function edit(Request $request)
    {
    $contact = $request->only(['first_name','last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);

    return view('index', compact('contact'));
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

    public function admin()
    {
        // $contacts = Contact::Paginate(7);
        $contacts = Contact::all();
        return view('admin', ['contacts' => $contacts]); 
    }

   public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }
}
