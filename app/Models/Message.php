<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $guarded = ['id'];

    public static $rules = array(
        'text' => 'string|min:1|max:191',
        'user_id' => 'required',
        'room_id' => 'required',
    );
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
}
