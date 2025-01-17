<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    //contact page route
    public function page()
    {
        $contact = Contact::select( 'users.id as user_id','users.name as user_name','users.email as user_email' , 'users.nickname as user_nickname' ,
                                    'contacts.title' , 'contacts.message', 'contacts.created_at')
                    ->leftJoin('users' , 'users.id', 'contacts.user_id')
                    ->where('title','!=', 'reply from admin')
                    ->orderBy('created_at' , 'desc')
                    ->paginate(3);

        return view('admin.contact.contactPage' , compact('contact'));
    }

    //reply message
    public function message(Request $request){
        Contact::create([
            'user_id' => $request->user_id,
            'title' => 'reply from admin',
            'message' => $request->message,
        ]);

        Alert::success('Success Message', 'Your reply has been sent to users');

        return back();

    }
}
