<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index($id)
    {
        $room_id = $id;
        $user = Auth::user();
        $messages = Message::with('user')->where('room_id', $id)->get();
        // dd($messages);
        $params = [
            'room_id' => $room_id,
            'user' => $user,
            'messages' => $messages,
        ];
        return view('show', $params);
    }
    
    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, Message::$rules);
        Message::create([
            'text' => $request->text,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
        ]);
        return redirect()->route('show', ['id' => $request->room_id]);
    }
    
}
