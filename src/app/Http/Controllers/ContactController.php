<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['category_id','first_name','last_name','gender','email','tel','adress','building','detail']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $name = $request->first_name . ' ' . $request->last_name;

        Contact::create([
            'name' => $name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $request->tell,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);

        return redirect()->route('contacts.thankyou');
    }

    // public function store(ContactRequest $request)
    // {
    //     $contact = $request->only(['category_id','first_name','last_name','gender','email','tel','adress','building','detail']);
    //     Contact::create($contact);
    //     return view('thanks');
    // }

    // public function process(Request $request)
    // {
    //     $action = $request->get('action', 'back');
    //     $input = $request->except('action');
    //     if($action === 'submit') {
    //         return view('complete');
    //         } else {
    //         return redirect()->action('ContactController@form')
    //         ->withInput($input);
    //         }

    // }

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
        return view('admin'); 
    }
}
