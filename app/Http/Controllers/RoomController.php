<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function chat_index($id)
    {
        // dd($id);
        $room_id = $id;
        $user = Auth::user();
        $messages = Message::where('room_id', $id)->get();
        $params = [
                'room_id' => $room_id,
                'user' => $user,
                'messages' => $messages,
        ];
        return view('show', $params);
    }
    
    public function chat_create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, Message::$rules);
        Message::create([
            'text' => $request->text,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
        ]);
        return redirect('/chat');
    }
    
}
