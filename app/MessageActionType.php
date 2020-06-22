<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageActionType extends Model
{
    protected $guarded = ['id'];

    public function rich_messages()
    {
        return $this->hasMany(RichMessage::class);
    }
}
