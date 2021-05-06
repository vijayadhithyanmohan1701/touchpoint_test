<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Models\Subscriber;

class SubscribersController extends Controller
{
    //
    /**
     * Paginate the subscribers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // paginate the authorized user's tasks with 5 per page
        $subscribers = DB::table('subscribers')
        ->orderBy('created_at', 'desc')
        ->get();

        // return task index view with paginated tasks
        return view('subscribers', [
            'subscribers' => $subscribers
        ]);
    }
    public function sendEmail(Request $request){
        
        if($request->get('user_id') == 'all'){  
            $subscribers = DB::table('subscribers')
            ->orderBy('created_at', 'asc')
            ->get();

            foreach($subscribers as $sub){
                $name =$sub->name;
                $email = $sub->email;
                $subject = $request->get('subject');
                Mail::send('email', array(
                    'name' => $sub->name,
                    'email' => $sub->email,
                    'content' => $request->get('message')
                ), function($message) use($sub, $request){
                    $message->from('9e2c4cd44e-fbed99@inbox.mailtrap.io');
                    $message->to($sub->email, $sub->name)->subject($request->get('subject'));
                });

            }
            return back()->with('successall', 'Mail sent to all subscribers !!!');
        }else{
            $subscribers = DB::table('subscribers')
            ->where('id', '=', $request->get('user_id'))
            ->get();

            foreach($subscribers as $sub){
                $name =$sub->name;
                $email = $sub->email;
                $subject = $request->get('subject');
                Mail::send('email', array(
                    'name' => $sub->name,
                    'email' => $sub->email,
                    'content' => $request->get('message')
                ), function($message) use($sub, $request){
                    $message->from('9e2c4cd44e-fbed99@inbox.mailtrap.io');
                    $message->to($sub->email, $sub->name)->subject($request->get('subject'));
                });
                
                return back()->with('success', 'Mail sent to ')->with('username', $sub->name);
            }
        }
    }
}
