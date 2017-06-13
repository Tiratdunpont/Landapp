<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Company;
use App\Contract;
use App\Details;
use App\Entity;
use App\Land;
use Illuminate\Support\Facades\Redirect;

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
            ->get();
        foreach ($maintables as $maintable) {
            if ($maintable->PersonalNumber == $e and $maintable->UniqueLandNumber == $l) {
                return 1;
            }
        }
        return 0;
    }
    public function checkyr($yr, $e, $l){
        $maintables = \DB::table('balances')
            ->select('UniqueLandNumber', 'PersonalNumber')
            ->get();
        foreach ($maintables as $maintable) {
            if ($maintable->PersonalNumber == $e and $maintable->UniqueLandNumber == $l and $maintable->Year == $yr) {
                return 1;
            }
        }
        return 0;
    }
    public function days($smonth1, $emonth1, $sday1, $eday1, $year)
    {
        $pay = 0;
        if ($smonth1 == 1) {
            $pay += 32 - $sday1;
            if (($year % 4 == 0) && (($year % 100 != 0) || ($year % 400 == 0))) {
                if ($emonth1 == 2) {
                    $pay += 30 - $eday1;
                } else if ($emonth1 == 3) {
                    $pay += 30 + 31 - $eday1;
                } else if ($emonth1 == 4) {
                    $pay += 30 + 31 + 30 - $eday1;
                } else if ($emonth1 == 5) {
                    $pay += 30 + 2 * 31 + 30 - $eday1;
                } else if ($emonth1 == 6) {
                    $pay += 30 + 2 * 31 + 2 * 30 - $eday1;
                } else if ($emonth1 == 7) {
                    $pay += 30 + 3 * 31 + 2 * 30 - $eday1;
                } else if ($emonth1 == 8) {
                    $pay += 30 + 4 * 31 + 2 * 30 - $eday1;
                } else if ($emonth1 == 9) {
                    $pay += 30 + 4 * 31 + 3 * 30 - $eday1;
                } else if ($emonth1 == 10) {
                    $pay += 30 + 5 * 31 + 3 * 30 - $eday1;
                } else if ($emonth1 == 11) {
                    $pay += 30 + 5 * 31 + 4 * 30 - $eday1;
                } else if ($emonth1 == 12) {
                    $pay += 30 + 6 * 31 + 4 * 30 - $eday1;
                } else $pay = $eday1 - $sday1;
            } else {
                if ($emonth1 == 2) {
                    $pay += 29 - $eday1;
                } else if ($emonth1 == 3) {
                    $pay += 29 + 31 - $eday1;
                } else if ($emonth1 == 4) {
                    $pay += 29 + 31 + 30 - $eday1;
                } else if ($emonth1 == 5) {
                    $pay += 29 + 2 * 31 + 30 - $eday1;
                } else if ($emonth1 == 6) {
                    $pay += 29 + 2 * 31 + 2 * 30 - $eday1;
                } else if ($emonth1 == 7) {
                    $pay += 29 + 3 * 31 + 2 * 30 - $eday1;
                } else if ($emonth1 == 8) {
                    $pay += 29 + 4 * 31 + 2 * 30 - $eday1;
                } else if ($emonth1 == 9) {
                    $pay += 29 + 4 * 31 + 3 * 30 - $eday1;
                } else if ($emonth1 == 10) {
                    $pay += 29 + 5 * 31 + 3 * 30 - $eday1;
                } else if ($emonth1 == 11) {
                    $pay += 29 + 5 * 31 + 4 * 30 - $eday1;
                } else if ($emonth1 == 12) {
                    $pay += 29 + 6 * 31 + 4 * 30 - $eday1;
                } else $pay = $eday1 - $sday1;
            }
        } else if ($smonth1 == 2) {
            if (($year % 4 == 0) && (($year % 100 != 0) || ($year % 400 == 0))) {
                $pay += 30 - $sday1;
            } else {
                $pay += 29 - $sday1;
            }
            if ($emonth1 == 3) {
                $pay += 32 - $eday1;
            } else if ($emonth1 == 4) {
                $pay += 32 + 30 - $eday1;
            } else if ($emonth1 == 5) {
                $pay += 32 + 31 + 30 - $eday1;
            } else if ($emonth1 == 6) {
                $pay += 32 + 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 7) {
                $pay += 32 + 2 * 31 + 30 - $eday1;
            } else if ($emonth1 == 8) {
                $pay += 32 + 3 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 9) {
                $pay += 32 + 3 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 32 + 4 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 32 + 4 * 31 + 3 * 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 32 + 5 * 31 + 3 * 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 3) {
            $pay += 32 - $sday1;
            if ($emonth1 == 4) {
                $pay += 31 - $eday1;
            } else if ($emonth1 == 5) {
                $pay += 2 * 31 - $eday1;
            } else if ($emonth1 == 6) {
                $pay += 30 + 2 * 31 - $eday1;
            } else if ($emonth1 == 7) {
                $pay += 3 * 31 + 30 - $eday1;
            } else if ($emonth1 == 8) {
                $pay += 4 * 31 + 30 - $eday1;
            } else if ($emonth1 == 9) {
                $pay += 4 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 5 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 6 * 31 + 3 * 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 7 * 31 + 3 * 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 4) {
            $pay += 31 - $sday1;
            if ($emonth1 == 5) {
                $pay += 32 - $eday1;
            } else if ($emonth1 == 6) {
                $pay += 32 + 30 - $eday1;
            } else if ($emonth1 == 7) {
                $pay += 32 + 31 + 30 - $eday1;
            } else if ($emonth1 == 8) {
                $pay += 32 + 2 * 31 + 30 - $eday1;
            } else if ($emonth1 == 9) {
                $pay += 32 + 2 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 32 + 3 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 32 + 3 * 31 + 3 * 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 32 + 4 * 31 + 3 * 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 5) {
            $pay += 32 - $sday1;
            if ($emonth1 == 6) {
                $pay += 31 - $eday1;
            } else if ($emonth1 == 7) {
                $pay += 2 * 31 - $eday1;
            } else if ($emonth1 == 8) {
                $pay += 3 * 31 - $eday1;
            } else if ($emonth1 == 9) {
                $pay += 3 * 31 + 30 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 4 * 31 + 30 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 4 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 5 * 31 + 2 * 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 6) {
            $pay += 31 - $sday1;
            if ($emonth1 == 7) {
                $pay += 32 - $eday1;
            } else if ($emonth1 == 8) {
                $pay += 32 + 31 - $eday1;
            } else if ($emonth1 == 9) {
                $pay += 32 + 31 + 30 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 32 + 2 * 31 + 30 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 32 + 2 * 31 + 2 * 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 32 + 3 * 31 + 2 * 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 7) {
            $pay += 32 - $sday1;
            if ($emonth1 == 8) {
                $pay += 32 - $eday1;
            } else if ($emonth1 == 9) {
                $pay += 32 + 30 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 32 + 30 + 31 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 32 + 2 * 30 + 31 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 32 + 2 * 31 + 2 * 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 8) {
            $pay += 32 - $sday1;
            if ($emonth1 == 9) {
                $pay += 31 - $eday1;
            } else if ($emonth1 == 10) {
                $pay += 2 * 31 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 2 * 31 + 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 3 * 31 + 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 9) {
            $pay += 31 - $sday1;
            if ($emonth1 == 10) {
                $pay += 32 - $eday1;
            } else if ($emonth1 == 11) {
                $pay += 32 + 30 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 32 + 31 + 30 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 10) {
            $pay += 32 - $sday1;
            if ($emonth1 == 11) {
                $pay += 31 - $eday1;
            } else if ($emonth1 == 12) {
                $pay += 2 * 31 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 11) {
            $pay += 31 - $sday1;
            if ($emonth1 == 12) {
                $pay += 32 - $eday1;
            } else $pay = $eday1 - $sday1;
        } else if ($smonth1 == 12) {
            $pay = $eday1 - $sday1;
        }
        return $pay;
    }

    public function store()
    {

        $this->validate(request(), [
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
        $prices = array(0,0);
        $year = request('Year');
        $priceh = request('fstPricePerHectare');
        $totalh = request('RentedArea');
        $sdate1 = request('RentStartsFrom');
        $edate1 = request('RentEndsIn');
        $sdate2 = request('NewPriceStartingDate');
        $edate2 = request('NewPriceTillDate');
        $price2 = request('sndPricePerHectare');
        $price = (($priceh * $totalh)*12/365);
        $slength1 = strlen($sdate1);
        $smonthl1 = $slength1 - 2;
        $smonth1 = substr($sdate1, 0, $smonthl1 - 1);
        $smonth1 = intval($smonth1);
        $sday1 = substr($sdate1, $smonthl1, $slength1);
        $sday1 = intval($sday1);
        $elength1 = strlen($edate1);
        $emonthl1 = $elength1 - 2;
        $emonth1 = substr($edate1, 0, $emonthl1 - 1);
        $emonth1 = intval($emonth1);
        $eday1 = substr($edate1, $emonthl1, $elength1);
        $eday1 = intval($eday1);
        $aux = $this->days($smonth1, $emonth1, $sday1, $eday1, $year);
        $prices[0] = $aux * $price;
        if (isset($sdate2) && isset($edate2) && isset($price2)) {
            $price2 = ($priceh * $totalh)*12/365;
            $slength1 = strlen($sdate2);
            $smonthl1 = $slength1 - 2;
            $smonth1 = substr($sdate2, 0, $smonthl1 - 1);
            $sday1 = substr($sdate2, $smonthl1, $slength1);
            $elength1 = strlen($edate2);
            $emonthl1 = $elength1 - 2;
            $emonth1 = substr($edate2, 0, $emonthl1 - 1);
            $eday1 = substr($edate2, $emonthl1, $elength1);
            $aux = $this->days($smonth1, $emonth1, $sday1, $eday1, $year);
            $prices[1] = $aux * $price2;
        }
        $c = request('CompanyName');
        $e = request('PersonalNumber');
        $l = request('UniqueLandNumber');
        $yr = request('Year');
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

        }
        else if ($cb == 1 && $eb == 0 && $lb == 0) {
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
        }
        else if ($cb == 0 && $lb == 1) {
            return Redirect::back()->withErrors(['Can\'t have a used Unique Land Number with a different Company Name', '']);
        }
        else if ($cb == 1 && $lb == 1 && $eb == 1) {
            $t = $this->checkT2($e, $l);
            if ($t == 1) {
                $k = $this->checkyr($yr, $e, $l);
                if ($k == 0) {
                    return Redirect::back()->withErrors(['Already used Personal Number, Unique Land Number and Company Name', '']);
                }
                else{

                }
            }
            else {
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
        }
        else if ($lb == 1 && $eb == 0) {
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
        }
        else {
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