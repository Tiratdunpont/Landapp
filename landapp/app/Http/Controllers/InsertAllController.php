<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Company;
use App\Contract;
use App\Details;
use App\Entity;
use App\Land;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class InsertAllController extends Controller
{
    public function check($x, $xb)
    {
        if ($xb == 2) {
            $maintables = \DB::table('companies')
                ->select('CompanyName')
                ->get();
            foreach ($maintables as $maintable) {
                if ($maintable->CompanyName == $x) {
                    return 1;
                }
            }
        }
        else if ($xb == 3) {
            $maintables = \DB::table('entities')
                ->select('PersonalNumber')
                ->get();
            foreach ($maintables as $maintable) {
                if ($maintable->PersonalNumber == $x) {
                    return 1;
                }
            }
        }
        else {
            $maintables = \DB::table('lands')
                ->select('UniqueLandNumber')
                ->get();
            foreach ($maintables as $maintable) {
                if ($maintable->UniqueLandNumber == $x) {
                    return 1;
                }
            }
        }
        return 0;
    }

    public function checkT2($e, $l)
    {
        $maintables = \DB::table('balances')
            ->select('UniqueLandNumber', 'PersonalNumber')
            ->where('UniqueLandNumber', '=', $l, 'and', 'PersonalNumber', '=', $e)
            ->first();
            if ($maintables != null) {
                return 1;
            }
        return 0;
    }

    public function store()
    {

        $input = Request::all();
        $validator = Validator::make($input,
            [
                'UniqueLandNumber' => 'required|digits:12',
                'LandArea' => 'required',
                'Status' => 'required',
                'SoilProductivityScore',
                'RegisteredInRC',
                'RegisterNumber',
                'RentedArea' => 'required',
                'GivenInChange',
                'PlotUnderRealState',
                'PersonalNumber' => 'required|digits:11',
                'Name',
                'Surname',
                'CompanyName' => 'required',
                'Phone',
                'OtherContactInformation',
                'Subrenter',
                'ReferencedCompany',
                'SubrentTillDate',
                'SubrentedArea',
                'SubrentRC',
                'SubrentRCSince',
                'OwnedDate',
                'RentStartsFrom' => 'required',
                'RentEndsIn' => 'required',
                'NewPriceStartingDate',
                'NewPriceTillDate',
                'BankAccount',
                'ContractedBy',
                'Type',
                'fstPricePerHectare',
                'sndPricePerHectare',
                'ContractSignDate',
                'ChangesDate',
                'ContractChanges',
                'Interval',
                'ContractNumber',
                'Year' => 'required',
                'Town',
                'Street',
                'House',
                'Flat',
                'AreaNumber',
                'LocationLand',
                'VillageLand'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $prices = array(0, 0);
            $priceh = request('fstPricePerHectare');
            $totalh = request('RentedArea');
            $sdate1 = request('RentStartsFrom');
            $edate1 = request('RentEndsIn');
            $sdate2 = request('NewPriceStartingDate');
            $edate2 = request('NewPriceTillDate');
            $price2 = request('sndPricePerHectare');
            $price = (($priceh * $totalh * 12) / 365);
            $edate1 = date_create($edate1);
            $sdate1 = date_create($sdate1);
            $days1 = date_diff($sdate1, $edate1);
            $prices[0] = $days1->days * $price;
            if (isset($sdate2) && isset($edate2) && isset($price2)) {
                $price2 = ($priceh * $totalh) * 12 / 365;
                $sdate2 = date_create($sdate2);
                $edate2 = date_create($edate2);
                $days2 = date_diff($sdate2, $edate2);
                $prices[1] = $days2->days2 * $price2;
            }
            $c = request('CompanyName');
            $e = request('PersonalNumber');
            $l = request('UniqueLandNumber');
            $cb = $this->check($c, 2);
            $eb = $this->check($e, 3);
            $lb = $this->check($l, 4);
            if ($eb == 1 && $lb == 0 && $cb == 1) {
                $land = new Land();
                $land->UniqueLandNumber = request('UniqueLandNumber');
                $land->CompanyName = request('CompanyName');
                $land->Status = request('Status');
                $land->LandArea = request('LandArea');
                $land->SoilProductivityScore = request('SoilProductivityScore');
                $land->RegisteredInRC = request('RegisteredInRC');
                $land->RegisterNumber = request('RegisterNumber');
                $land->GivenInChange = request('GivenInChange');
                $land->PlotUnderRealState = request('PlotUnderRealState');
                $land->save();

                $details = new Details();
                $details->UniqueLandNumber = request('UniqueLandNumber');
                $details->PersonalNumber = request('PersonalNumber');
                $details->RentedArea = request('RentedArea');
                $details->Subrenter = request('Subrenter');
                $details->Subrenter = request('ReferencedCompany');
                $details->SubrentTillDate = request('SubrentTillDate');
                $details->SubrentedArea = request('SubrentedArea');
                $details->SubrentRC = request('SubrentRC');
                $details->SubrentRCSince = request('SubrentRCSince');
                $details->OwnedDate = request('OwnedDate');
                $details->save();

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

                $balance = new Balance();
                $balance->UniqueLandNumber = request('UniqueLandNumber');
                $balance->PersonalNumber = request('PersonalNumber');
                $balance->fstPrice = $prices[0];
                $balance->sndPrice = $prices[1];
                $balance->Year = request('Year');
                $balance->save();

                return redirect('home');

            } else if ($cb == 1 && $eb == 0 && $lb == 0) {
                $land = new Land();
                $land->UniqueLandNumber = request('UniqueLandNumber');
                $land->CompanyName = request('CompanyName');
                $land->Status = request('Status');
                $land->LocationLand = request('LocationLand');
                $land->VillageLand = request('VillageLand');
                $land->LandArea = request('LandArea');
                $land->SoilProductivityScore = request('SoilProductivityScore');
                $land->RegisteredInRC = request('RegisteredInRC');
                $land->RegisterNumber = request('RegisterNumber');
                $land->GivenInChange = request('GivenInChange');
                $land->PlotUnderRealState = request('PlotUnderRealState');
                $land->save();

                $entity = new Entity();
                $entity->PersonalNumber = request('PersonalNumber');
                $entity->Town = request('Town');
                $entity->Street = request('Street');
                $entity->House = request('House');
                $entity->Flat = request('Flat');
                $entity->AreaNumber = request('AreaNumber');
                $entity->Name = request('Name');
                $entity->Surname = request('Surname');
                $entity->Phone = request('Phone');
                $entity->OtherContactInformation = request('OtherContactInformation');
                $entity->save();

                $details = new Details();
                $details->UniqueLandNumber = request('UniqueLandNumber');
                $details->RentedArea = request('RentedArea');
                $details->PersonalNumber = request('PersonalNumber');
                $details->Subrenter = request('Subrenter');
                $details->SubrentTillDate = request('SubrentTillDate');
                $details->SubrentedArea = request('SubrentedArea');
                $details->SubrentRC = request('SubrentRC');
                $details->SubrentRCSince = request('SubrentRCSince');
                $details->OwnedDate = request('OwnedDate');
                $details->save();

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

                $balance = new Balance();
                $balance->UniqueLandNumber = request('UniqueLandNumber');
                $balance->PersonalNumber = request('PersonalNumber');
                $balance->fstPrice = $prices[0];
                $balance->sndPrice = $prices[1];
                $balance->Year = request('Year');
                $balance->save();


                return redirect('home');
            } else if ($cb == 0 && $lb == 1) {

                return Redirect::back()->withErrors(['Can\'t have a used Unique Land Number with a different Company Name', ''])->withInput();;
            } else if ($cb == 1 && $lb == 1 && $eb == 1) {
                $t = $this->checkT2($e, $l);
                if ($t == 1) {
                    return Redirect::back()->withInput()->withErrors(['Already used Personal Number, Unique Land Number and Company Name', '']);
                } else {
                    $details = new Details();
                    $details->UniqueLandNumber = request('UniqueLandNumber');
                    $details->RentedArea = request('RentedArea');
                    $details->PersonalNumber = request('PersonalNumber');
                    $details->Subrenter = request('Subrenter');
                    $details->Subrenter = request('ReferencedCompany');
                    $details->SubrentTillDate = request('SubrentTillDate');
                    $details->SubrentedArea = request('SubrentedArea');
                    $details->SubrentRC = request('SubrentRC');
                    $details->SubrentRCSince = request('SubrentRCSince');
                    $details->OwnedDate = request('OwnedDate');
                    $details->save();

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

                    $balance = new Balance();
                    $balance->UniqueLandNumber = request('UniqueLandNumber');
                    $balance->PersonalNumber = request('PersonalNumber');
                    $balance->fstPrice = $prices[0];
                    $balance->sndPrice = $prices[1];
                    $balance->Year = request('Year');
                    $balance->save();
                    return redirect('home');
                }
            } else if ($lb == 1 && $eb == 0) {
                $entity = new Entity();
                $entity->PersonalNumber = request('PersonalNumber');
                $entity->Name = request('Name');
                $entity->Surname = request('Surname');
                $entity->Phone = request('Phone');
                $entity->OtherContactInformation = request('OtherContactInformation');
                $entity->Town = request('Town');
                $entity->Street = request('Street');
                $entity->House = request('House');
                $entity->Flat = request('Flat');
                $entity->AreaNumber = request('AreaNumber');
                $entity->save();

                $details = new Details();
                $details->UniqueLandNumber = request('UniqueLandNumber');
                $details->RentedArea = request('RentedArea');
                $details->PersonalNumber = request('PersonalNumber');
                $details->Subrenter = request('Subrenter');
                $details->Subrenter = request('ReferencedCompany');
                $details->SubrentTillDate = request('SubrentTillDate');
                $details->SubrentedArea = request('SubrentedArea');
                $details->SubrentRC = request('SubrentRC');
                $details->SubrentRCSince = request('SubrentRCSince');
                $details->OwnedDate = request('OwnedDate');
                $details->save();

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

                $balance = new Balance();
                $balance->UniqueLandNumber = request('UniqueLandNumber');
                $balance->PersonalNumber = request('PersonalNumber');
                $balance->fstPrice = $prices[0];
                $balance->sndPrice = $prices[1];
                $balance->Year = request('Year');
                $balance->save();


                return redirect('home');
            } else {
                $company = new Company();
                $company->CompanyName = request('CompanyName');
                $company->save();

                $land = new Land();
                $land->UniqueLandNumber = request('UniqueLandNumber');
                $land->CompanyName = request('CompanyName');
                $land->LocationLand = request('LocationLand');
                $land->VillageLand = request('VillageLand');
                $land->Status = request('Status');
                $land->LandArea = request('LandArea');
                $land->SoilProductivityScore = request('SoilProductivityScore');
                $land->RegisteredInRC = request('RegisteredInRC');
                $land->RegisterNumber = request('RegisterNumber');
                $land->GivenInChange = request('GivenInChange');
                $land->PlotUnderRealState = request('PlotUnderRealState');
                $land->save();


                $entity = new Entity();
                $entity->PersonalNumber = request('PersonalNumber');
                $entity->Name = request('Name');
                $entity->Surname = request('Surname');
                $entity->Phone = request('Phone');
                $entity->OtherContactInformation = request('OtherContactInformation');
                $entity->Town = request('Town');
                $entity->Street = request('Street');
                $entity->House = request('House');
                $entity->Flat = request('Flat');
                $entity->AreaNumber = request('AreaNumber');
                $entity->save();

                $details = new Details();
                $details->UniqueLandNumber = request('UniqueLandNumber');
                $details->PersonalNumber = request('PersonalNumber');
                $details->RentedArea = request('RentedArea');
                $details->Subrenter = request('Subrenter');
                $details->Subrenter = request('ReferencedCompany');
                $details->SubrentTillDate = request('SubrentTillDate');
                $details->SubrentedArea = request('SubrentedArea');
                $details->SubrentRC = request('SubrentRC');
                $details->SubrentRCSince = request('SubrentRCSince');
                $details->OwnedDate = request('OwnedDate');
                $details->save();

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

                $balance = new Balance();
                $balance->UniqueLandNumber = request('UniqueLandNumber');
                $balance->PersonalNumber = request('PersonalNumber');
                $balance->fstPrice = $prices[0];
                $balance->sndPrice = $prices[1];
                $balance->Year = request('Year');
                $balance->save();


                return redirect('home');
            }
        }
    }

}