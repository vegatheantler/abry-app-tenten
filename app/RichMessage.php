<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RichMessage extends Model
{
    protected $guarded = ['id'];

    public function richMessageType()
    {
        return $this->belongsTo(RichMessageType::class);
    }

    public function messageActionType()
    {
        return $this->belongsTo(MessageActionType::class);
    }

    public function message()
    {
        return $this->morphOne(Message::class, 'messagable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}
