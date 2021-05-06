<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionFormController extends Controller
{
    //
    public function createForm(Request $request){
        return view('subscribe');
    }

    public function SubscriptionForm(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        Subscriber::create($request->all());

        return back()->with('success', 'Thank you for subscribing to our mailing list');
    }
}
