<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public function details()
    {
        return $this->hasOne(Details::class);
    }
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }
}
