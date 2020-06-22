<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    protected $guarded = ['id'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
