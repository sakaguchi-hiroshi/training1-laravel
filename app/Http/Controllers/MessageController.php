<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // dd($authUser);
    public function index()
    {
        $authUser = Auth::user();
        $items = Message::with('user')->get();
        $params = [
                'authUser' => $authUser,
                'items' => $items,
            ];
            return view('index', $params);
    }
    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, Message::$rules);
        $form = new Message;
        $form->user_id = $request->user()->id;
        $form->text = $request->text;
        $form->save();
        return redirect('/');
    }
    public function show(Request $request)
    {
        $items = Message::where('user_id', \Auth::user()->id)->get();
        
        return view('index', ['items' => $items]);
    }
    // public function show(Request $request) 
    // {
    //     // $user = $items->text();
    //     // return view('index', ['user' => $user]);

    // }
}
