<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    public function details()
    {
        return $this->hasOne(Details::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }
}
