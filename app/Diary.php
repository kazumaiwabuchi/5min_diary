<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [
        "today_event","content","tommorow_event"
        ];
    
    //Userモデルとの一対多を定義、この日記を所有するユーザ
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
