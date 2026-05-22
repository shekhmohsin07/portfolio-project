<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::latest()->paginate(10); 
        return view('backend.pages.contacts.index', compact('contacts'));
    }

    public function store(Request $request) { 
        $request->validate([ 
            'name' => 'required|max:255', 
            'phone' => 'nullable|max:20', 
            'email' => 'required|email', 
            'subject' => 'nullable|max:255', 
            'message' => 'required', 
        ]);


        // Contact::create([ 
        //     'name' => $request->name, 
        //     'phone' => $request->phone, 
        //     'email' => $request->email, 
        //     'subject' => $request->subject, 
        //     'message' => $request->message, 
        // ]);
        
        $data = $request->all();
        Mail::to('shekhmohammadmohsin@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success', 'Message sent successfully'); 
    } 


    public function show($id) { 
        $contact = Contact::findOrFail($id); 
        return view('backend.pages.contacts.show', compact('contact')); 
    }

    public function destroy($id) { 
        $contact = Contact::findOrFail($id); 
        $contact->delete();

        return redirect() ->route('contacts.index') 
        ->with('success', 'Message deleted successfully'); 
    }
    
}
