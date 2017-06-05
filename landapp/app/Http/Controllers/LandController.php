<?php

namespace App\Http\Controllers;

use App\Land;

class LandController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'UniqueLandNumber' => 'required|digits:12',
            'LandArea' => 'required',
            'SoilProductivityScore',
            'RegisteredInRC',
            'RegisterNumber',
            'RentedArea',
            'GivenInChange',
            'PlotUnderRealState'
        ]);

        $land = new Land();
        $land->UniqueLandNumber = request('UniqueLandNumber');
        $land->LandArea = request('LandArea');
        $land->SoilProductivityScore = request('SoilProductivityScore');
        $land->RegisteredInRC = request('RegisteredInRC');
        $land->RegisterNumber = request('RegisterNumber');
        $land->RentedArea = request('RentedArea');
        $land->GivenInChange = request('GivenInChange');
        $land->PlotUnderRealState = request('PlotUnderRealState');
        $land->save();

        return redirect('home');
    }
}
