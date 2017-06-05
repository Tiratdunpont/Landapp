<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function details()
    {
        return $this->hasMany(Land::class);
    }
}
