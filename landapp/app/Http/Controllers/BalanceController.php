<?php

namespace App\Http\Controllers;

use App\Balance;

class BalanceController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'UniqueLandNumber' => 'required|digits:12',
            'PersonalNumber' => 'required|digits:11',
            'RentStartsFrom',
            'RentEndsIn',
            'Year'
        ]);

        $balance = new Balance();
        $balance->UniqueLandNumber = request('UniqueLandNumber');
        $balance->PersonalNumber = request('PersonalNumber');
        $balance->RentStartsFrom = request('RentStartsFrom');
        $balance->RentEndsIn = request('RentEndsIn');
        $balance->Year = request('Year');
        $balance->save();

        return redirect('home');
    }
}
