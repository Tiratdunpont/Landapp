<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function details()
    {
        return $this->hasMany(Details::class);
    }
    public function contract()
    {
        return $this->hasMany(Contract::class);
    }
    public function balance()
    {
        return $this->hasMany(Balance::class);
    }

}
