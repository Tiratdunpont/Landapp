<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public function details()
    {
        return $this->hasMany(Details::class);
    }
    public function balance()
    {
        return $this->hasMany(Balance::class);
    }

    public function contract()
    {
        return $this->hasMany(Contract::class);
    }
}
