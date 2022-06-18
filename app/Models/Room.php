<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = array(
        'room_name' => 'required|min:1|max:20',
        'user_id' => 'required',
    );
    public function messages(){
        return $this->hasMany('App\Models\Messages');
    }
    public function user(){
        return $this->belongTo('App\Models\Users');
    }
}
