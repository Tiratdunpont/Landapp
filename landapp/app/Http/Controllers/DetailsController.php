<?php

namespace App\Http\Controllers;

use App\Details;


class DetailsController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'UniqueLandNumber' => 'required|digits:12',
            'PersonalNumber' => 'required|digits:11',
            'Subrenter',
            'SubrentTillDate',
            'SubrentedArea',
            'SubrentRC',
            'SubrentRCSince',
            'OwnedDate'
        ]);

        $details = new Details();
        $details->UniqueLandNumber = request('UniqueLandNumber');
        $details->PersonalNumber = request('PersonalNumber');
        $details->Renter = request('Renter');
        $details->Renter2 = request('Renter2');
        $details->Subrenter = request('Subrenter');
        $details->SubrentTillDate = request('SubrentTillDate');
        $details->SubrentedArea = request('SubrentedArea');
        $details->SubrentRC = request('SubrentRC');
        $details->SubrentRCSince = request('SubrentRCSince');
        $details->OwnedDate = request('OwnedDate');


        $details->save();

        return redirect('home');
    }
}
