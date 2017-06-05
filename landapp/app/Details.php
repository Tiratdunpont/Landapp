<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public function land()
    {
        return $this->belongsTo(Land::class);
    }
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
