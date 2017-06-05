<?php

namespace App\Http\Controllers;


use App\Company;
use App\Land;

class UpdateController extends Controller
{
    public function exists($x, $xb)
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
        } else if ($xb == 3) {
            $maintables = \DB::table('entities')
                ->select('PersonalNumber')
                ->get();
            foreach ($maintables as $maintable) {
                if ($maintable->PersonalNumber == $x) {
                    return 1;
                }
            }
        } else {
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

    public function update()
    {
        $this->validate(request(), [
            'UniqueLandNumber',
            'LandArea',
            'Status',
            'SoilProductivityScore',
            'RegisteredInRC',
            'RegisterNumber',
            'RentedArea',
            'GivenInChange',
            'PlotUnderRealState',
            'PersonalNumber',
            'Name',
            'Surname',
            'CompanyName',
            'Phone',
            'OtherContactInformation',
            'Subrenter',
            'SubrentTillDate',
            'SubrentedArea',
            'SubrentRC',
            'SubrentRCSince',
            'OwnedDate',
            'RentStartsFrom',
            'RentEndsIn',
            'NewPriceStartingDate',
            'NewPriceTillDate',
            'BankAccount',
            'ContractedBy',
            'Type',
            'PricePerHectare',
            'PayPerYearUntilMonth',
            'ContractSignDate',
            'ChangesDate',
            'ContractChanges',
            'Interval',
            'ContractNumber',
            'Year',
            'Town',
            'Street',
            'House',
            'Flat',
            'AreaNumber',
            'LocationLand',
            'VillageLand'
        ]);

        $id = request('id');
        $ids = \DB::table('balances as b')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('lands as l', 'l.UniqueLandNumber', '=', 'b.UniqueLandNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->join('details as d', 'b.PersonalNumber', '=', 'd.PersonalNumber')
            ->join('contracts as con', 'con.UniqueLandNumber', '=', 'b.UniqueLandNumber')
            ->select('d.id AS did', 'con.id AS conid', 'b.id AS bid', 'e.id AS eid', 'com.id AS comid', 'l.id AS lid')
            ->where('b.id', '=', $id)
            ->get();
        $r = 0;
        $re = 0;
        foreach($ids as $ida){
            $did = $ida->did;
            $conid = $ida->conid;
            $bid = $ida->bid;
            $eid = $ida->eid;
            $lid = $ida->lid;
        }
        $valors = array(
            '0' => request('UniqueLandNumber'),
            '1' => request('LandArea'),
            '2' => request('Status'),
            '3' => request('SoilProductivityScore'),
            '4' => request('RegisteredInRC'),
            '5' => request('RegisterNumber'),
            '6' => request('RentedArea'),
            '7' => request('GivenInChange'),
            '8' => request('PlotUnderRealState'),
            '9' => request('PersonalNumber'),
            '10' => request('Name'),
            '11' => request('Surname'),
            '12' => request('CompanyName'),
            '13' => request('Phone'),
            '14' => request('OtherContactInformation'),
            '15' => request('Subrenter'),
            '16' => request('SubrentTillDate'),
            '17' => request('SubrentedArea'),
            '18' => request('SubrentRC'),
            '19' => request('SubrentRCSince'),
            '20' => request('OwnedDate'),
            '21' => request('RentStartsFrom'),
            '22' => request('RentEndsIn'),
            '23' => request('NewPriceStartingDate'),
            '24' => request('NewPriceTillDate'),
            '25' => request('BankAccount'),
            '26' => request('ContractedBy'),
            '27' => request('Type'),
            '28' => request('PricePerHectare'),
            '29' => request('PayPerYearUntilMonth'),
            '30' => request('ContractSignDate'),
            '31' => request('ChangesDate'),
            '32' => request('ContractChanges'),
            '33' => request('Interval'),
            '34' => request('ContractNumber'),
            '35' => request('Year'),
            '36' => request('Town'),
            '37' => request('Street'),
            '38' => request('House'),
            '39' => request('Flat'),
            '40' => request('AreaNumber'),
            '41' => request('LocationLand'),
            '42' => request('VillageLand'),
            '43' => request('ReferencedCompany')
        );
        if (isset($valors[0])) {
            $k = $this->exists($valors[0], 1);
            if ($k == 0) {
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
                $r = 1;
            }
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['UniqueLandNumber' => $valors[0]]);
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['UniqueLandNumber' => $valors[0]]);
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['UniqueLandNumber' => $valors[0]]);

        }
        if (isset($valors[1]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['LandArea' => $valors[1]]);
        }
        if (isset($valors[2]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['Status' => $valors[2]]);
        }
        if (isset($valors[3]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['SoilProductivityScore' => $valors[3]]);
        }
        if (isset($valors[4]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['RegisteredInRC' => $valors[4]]);
        }
        if (isset($valors[5]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['RegisterNumber' => $valors[5]]);
        }
        if (isset($valors[6])) {
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['RentStartsFrom' => $valors[6]]);
        }
        if (isset($valors[7]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['GivenInChange' => $valors[7]]);
        }
        if (isset($valors[8]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['PlotUnderRealState' => $valors[8]]);
        }
        if (isset($valors[9])) {
            $kl = $this->exists($valors[0], 3);
            if ($kl == 0) {
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
                $re = 1;
            }
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['PersonalNumber' => $valors[9]]);
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['PersonalNumber' => $valors[9]]);
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['PersonalNumber' => $valors[9]]);

        }
        if (isset($valors[10]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['Name' => $valors[10]]);
        }
        if (isset($valors[11]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['Surname' => $valors[11]]);
        }
        if (isset($valors[12])) {
            $k = $this->exists($valors[12], 2);
            if ($k == 0){
                $company = new Company();
                $company->CompanyName = request('CompanyName');
            }
            if ($r == 0) {
                \DB::table('lands as l')
                    ->where('id', $lid)
                    ->update(['CompanyName' => $valors[12]]);
            }
        }
        if (isset($valors[13])&& $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['Phone' => $valors[13]]);
        }
        if (isset($valors[14])&& $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['OtherContactInformation' => $valors[14]]);
        }
        if (isset($valors[15])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['Subrenter' => $valors[15]]);
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['Subrenter' => $valors[15]]);
        }
        if (isset($valors[16])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['SubrentTillDate' => $valors[16]]);
        }
        if (isset($valors[17])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['SubrentedArea' => $valors[17]]);
        }
        if (isset($valors[18])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['SubrentRC' => $valors[18]]);
        }
        if (isset($valors[19])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['SubrentRCSince' => $valors[19]]);
        }
        if (isset($valors[20])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['OwnedDate' => $valors[20]]);
        }
        if (isset($valors[21])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['RentStartsFrom' => $valors[21]]);
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['RentStartsFrom' => $valors[21]]);
        }
        if (isset($valors[22])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['RentEndsIn' => $valors[22]]);
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['RentEndsIn' => $valors[22]]);
        }
        if (isset($valors[23])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['NewPriceStartingDate' => $valors[23]]);
        }
        if (isset($valors[24])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['NewPriceTillDate' => $valors[24]]);
        }
        if (isset($valors[25])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['BankAccount' => $valors[25]]);
        }
        if (isset($valors[26])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['ContractedBy' => $valors[26]]);
        }
        if (isset($valors[27])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['Type' => $valors[27]]);
        }
        if (isset($valors[28])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['PricePerHectare' => $valors[28]]);        }
        if (isset($valors[29])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['PayPerYearUntilMonth' => $valors[29]]);
        }
        if (isset($valors[30])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['ContractSignDate' => $valors[30]]);
        }
        if (isset($valors[31])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['ChangesDate' => $valors[31]]);
        }
        if (isset($valors[32])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['ContractChanges' => $valors[32]]);
        }
        if (isset($valors[33])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['Interval' => $valors[33]]);
        }
        if (isset($valors[34])) {
            \DB::table('contracts as c')
                ->where ('id', $conid)
                ->update(['ContractNumber' => $valors[34]]);
        }
        if (isset($valors[35])) {
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['Year' => $valors[35]]);
        }
        if (isset($valors[35])) {
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['Year' => $valors[35]]);
        }
        if (isset($valors[35])) {
            \DB::table('balances as b')
                ->where ('id', $bid)
                ->update(['Year' => $valors[35]]);
        }
        if (isset($valors[36]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['Town' => $valors[36]]);
        }
        if (isset($valors[37]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['Street' => $valors[37]]);
        }
        if (isset($valors[38]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['House' => $valors[38]]);
        }
        if (isset($valors[39]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['Flat' => $valors[39]]);
        }
        if (isset($valors[40]) && $re == 0) {
            \DB::table('entities as e')
                ->where ('id', $eid)
                ->update(['AreaNumber' => $valors[40]]);
        }
        if (isset($valors[41]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['LocationLand' => $valors[41]]);
        }
        if (isset($valors[42]) && $r == 0) {
            \DB::table('lands as l')
                ->where ('id', $lid)
                ->update(['VillageLand' => $valors[42]]);
        }
        if (isset($valors[43])) {
            \DB::table('details as d')
                ->where ('id', $did)
                ->update(['ReferencedCompany' => $valors[43]]);
        }
        $maintables = \DB::table('lands as l')
            ->join('balances as b', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->select('l.UniqueLandNumber as UniqueLandNumber',
                'b.id as id',
                'l.Status as Status',
                'l.CompanyName as CompanyName',
                'l.LocationLand as LocationLand',
                'l.LandArea as LandArea',
                'l.SoilProductivityScore as SoilProductivityScore',
                'e.PersonalNumber as PersonalNumber',
                'e.Name as Name',
                'e.Surname as Surname')
            ->paginate(25);
        return view ('home', compact('maintables'));
    }
}