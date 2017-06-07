<?php

namespace App\Http\Controllers;


use App\Balance;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if (request()->has('Status')) {
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
                ->where('Status', request('Status'))
                ->paginate(25);
        } else if (request()->has('UniqueLandNumber')) {
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
                ->orderBy('UniqueLandNumber', request('UniqueLandNumber'))
                ->paginate(25);
        } else if (request()->has('PersonalNumber')) {
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
                ->orderBy('PersonalNumber', request('PersonalNumber'))
                ->paginate(25);
        } else {
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
        }
        return view('home', compact('maintables', 'selected'));
    }

    public function details()
    {
        $id = request()->id;
        $details = \DB::table('balances as b')
            ->where('b.id', '=', $id)
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->join('details as d', 'e.PersonalNumber', '=', 'd.PersonalNumber')
            ->join('contracts as con', 'con.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->get();
        $pay = 0;
        $price = 0;
        foreach ($details as $detail) {
            if (isset($detail->PricePerHectare) && isset($detail->RentedArea) && isset($detail->PayPerYearUntilMonth)) {
                $priceh = $detail->PricePerHectare;
                $totalh = $detail->RentedArea;
                $price = $priceh * $totalh;
                $priced = ($price * 12) / 365;
                $date = $detail->PayPerYearUntilMonth;
                $slength = strlen($date);
                $monthl = $slength - 2;
                $month = substr($date, 0, $monthl);
                $day = substr($date, $monthl + 1, $slength);
                $pay = $priced * $day;
                if ($month == 2) {
                    $pay = $pay * (31);
                } else if ($month == 3) {
                    $pay = $pay * (31 + 28);
                } else if ($month == 4) {
                    $pay = $pay * (31 * 2 + 28);
                } else if ($month == 5) {
                    $pay = $pay * (31 * 2 + 28 + 30 * 1);
                } else if ($month == 6) {
                    $pay = $pay * (31 * 3 + 28 + 30 * 1);
                } else if ($month == 7) {
                    $pay = $pay * (31 * 3 + 28 + 30 * 2);
                } else if ($month == 8) {
                    $pay = $pay * (31 * 4 + 28 + 30 * 2);
                } else if ($month == 9) {
                    $pay = $pay * (31 * 4 + 28 + 30 * 3);
                } else if ($month == 10) {
                    $pay = $pay * (31 * 5 + 28 + 30 * 3);
                } else if ($month == 11) {
                    $pay = $pay * (31 * 5 + 28 + 30 * 4);
                } else if ($month == 12) {
                    $pay = $pay * (31 * 6 + 28 + 30 * 4);
                }
            }
        }
        return view('details', compact('details', 'pay', 'price', 'id'));
    }

    public function delete()
    {
        $id = request()->id;
        $all = \DB::table('balances as b')
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->where('b.id', '=', $id)
            ->delete();
        $all = \DB::table('contracts as b')
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->where('b.id', '=', $id)
            ->delete();
        $all = \DB::table('details as b')
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->where('b.id', '=', $id)
            ->delete();


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

        return view('home', compact('maintables'));
    }

    public function updateredir()
    {
        $id = request('id');
        return view('update', compact('id'));
    }

    public function selected()
    {
        $id_checked = Input::get('to_select');
        if (is_array($id_checked)) {
            $maintables = \DB::table('balances as b')
                ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
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
                    ->whereIn('b.id', $id_checked)
                ->paginate(25);
            return view('home', compact('maintables'));
        }
        else {
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
            return view('home', compact('maintables', 'selected'));
        }
    }
}
