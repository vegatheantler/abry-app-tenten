<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id'];

    public function messagable()
    {
        return $this->morphTo();
    }

    public function messageTemplate()
    {
        return $this->belongsTo(MessageTemplate::class);
    }
}
