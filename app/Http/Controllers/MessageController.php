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
        $users = User::all();
        $authUser = Auth::user();
        $items = Message::where('user_id', $authUser->id)->get();
        $params = [
                'users' => $users,
                'authUser' => $authUser,
                'items' => $items,
            ];
        return view('index', $params);
    }
    public function create(Request $request)
    {
        $this->validate($request, Message::$rules);
        $form = new Message;
        $form->user_id = $request->user()->id;
        $form->text = $request->text;
        $form->save();
        return redirect('/');
    }
    public function show($id)
    {
        $item = User::find($id);
        $user = Message::where('user_id', $id)->get();
        // dd($user);
        $params = [
            'item' => $item,
            'user' => $user,
        ];
        return view('show', $params);
        // $user = User::with('messages'->user_id)->get();
    }
    
    // public function show($id)
    // {
    //     $items = Message::where('user_id', \Auth::user()->id)->take(5)->get();
        // $gets = Message::orderBy('id', 'desc')->take(5);
        // $items = $gets->get();
        
        // return view('index', ['items' => $items]);
        // if ( Auth::check() ) {
            // }
    // }

    // 追記:ログインしていない場合loginページに移動させる
    public function __construct(){
        $this->middleware('auth');
    }

    // ログイン中のユーザーをログアウトさせる
    public function logout(){
        return Auth::logout();
    }


    // public function show(Request $request) 
    // {
    //     // $user = $items->text();
    //     // return view('index', ['user' => $user]);

    // }
}
