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
        return view('admin', compact('categories'));        
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
        $tel = $request->tell_first . '-' . $request->tell_second . '-' . $request->tell_third;

        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $tell,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
    return view('thanks');
    }

    public function edit(Request $request)
    {
    $contact = $request->only(['first_name','last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);

    return view('admin', compact('contact'));
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
        $contacts = Contact::all();
        $contacts = Contact::Paginate(7);
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

        $contacts = $query->get();

        return view('admin', compact('contacts', 'categories'));
    }
}
