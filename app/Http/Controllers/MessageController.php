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

    // 追記:ログインしていない場合loginページに移動させる
    public function __construct(){
        $this->middleware('auth');
    }

    // ログイン中のユーザーをログアウトさせる
    public function logout(){
        return Auth::logout();
    }
}
