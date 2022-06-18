<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // dd($authUser);
        $rooms = Room::all();
        $authUser = Auth::user();
        // $items = Message::where('user_id', $authUser->id)->get();
        $params = [
                'rooms' => $rooms,
                'authUser' => $authUser,
                // 'items' => $items,
            ];
        return view('index', $params);
    }
    public function create(Request $request)
    {
        $this->validate($request, Room::$rules);
        // dd($request->all());
        // $form = new Message;
        Room::create([
            'room_name' => $request->room_name,
            'user_id' => $request->user()->id,
        ]);
        // $form->user_id = $request->user()->id;
        // $form->room_name = $request->room_name;
        // $form->create($form);
        return redirect('/');
    }
    public function show($id)
    {
        $rooms = User::where('id', $id)->get();
        $item = Room::find($id);
        $params = [
            'item' => $item,
            'rooms' => $rooms,
        ];
        return view('show', $params);
        // $user = User::with('messages'->user_id)->get();
    }
    
    // public function show($id)
    // {
    //     $items = Message::where('user_id', \Auth::user()->id)->take(5)->get();
    //     $gets = Message::orderBy('id', 'desc')->take(5);
    //     $items = $gets->get();
        
    //     return view('index', ['items' => $items]);
    //     if ( Auth::check() ) {
    //         }
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
