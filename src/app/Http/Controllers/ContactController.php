<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['category_id','first_name','last_name','gender','email','tel','adress','building','detail']);
        return view('confirm', compact('contact'));
    }

    public function store()
    {
        $contact = $request->only(['category_id','first_name','last_name','gender','email','tel','adress','building','detail']);
        Contact::create($contact);
        return view('thanks');
    }

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
}
