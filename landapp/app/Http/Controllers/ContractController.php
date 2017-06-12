<?php

namespace App\Http\Controllers;

use App\Contract;



class ContractController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'PersonalNumber' => 'required|digits:11',
            'RentStartsFrom',
            'RentEndsIn',
            'NewPriceStartingDate',
            'NewPriceTillDate',
            'BankAccount',
            'ContractedBy',
            'Subrenter',
            'Type',
            'fstPricePerHectare',
            'sndPricePerHectare',
            'ContractSignDate',
            'ChangesDate',
            'ContractChanges',
            'Interval',
            'ContractNumber'
        ]);

        $contract = new Contract();
        $contract->UniqueLandNumber = request('UniqueLandNumber');
        $contract->PersonalNumber = request('PersonalNumber');
        $contract->RentStartsFrom = request('RentStartsFrom');
        $contract->RentEndsIn = request('RentEndsIn');
        $contract->NewPriceStartingDate = request('NewPriceStartingDate');
        $contract->NewPriceTillDate = request('NewPriceTillDate');
        $contract->BankAccount = request('BankAccount');
        $contract->ContractedBy = request('ContractedBy');
        $contract->Subrenter = request('Subrenter');
        $contract->Type = request('Type');
        $contract->fstPricePerHectare = request('fstPricePerHectare');
        $contract->sndPricePerHectare = request('sndPricePerHectare');
        $contract->ContractSignDate = request('ContractSignDate');
        $contract->ChangesDate = request('ChangesDate');
        $contract->ContractChanges = request('ContractChanges');
        $contract->Interval = request('Interval');
        $contract->ContractNumber = request('ContractNumber');
        $contract->save();

        return redirect('home');
    }
}
