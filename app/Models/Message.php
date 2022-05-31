<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = array(
        'user_id' => 'required',
        'text' => 'string|min:1|max:191'
    );
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
