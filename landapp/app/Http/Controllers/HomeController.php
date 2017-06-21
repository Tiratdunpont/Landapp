<?php

namespace App\Http\Controllers;


use App\basket;
use App\baskethistory;
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
                ->where('Status', request('Status'))
                ->paginate(25);
        } else if (request()->has('UniqueLandNumber')) {
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
                ->orderBy('UniqueLandNumber', request('UniqueLandNumber'))
                ->paginate(25);
        } else if (request()->has('PersonalNumber')) {
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
                ->orderBy('PersonalNumber', request('PersonalNumber'))
                ->paginate(25);
        } else {
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
                ->paginate(25);
        }
        return view('home', compact('maintables', 'selected', 'id_saved'));
    }

    public function details()
    {
        //Calculates the total payment per period ((total hectares*price per hectare (guess it's monthly))*12/365 * number of days of the contract)
        $id = request()->id;
        $details = \DB::table('balances as b')
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->join('details as d', 'e.PersonalNumber', '=', 'd.PersonalNumber')
            ->join('contracts as con', 'con.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->where('b.id', '=', $id)
            ->first();
        return view('details', compact('details', 'id'));
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
        $details = \DB::table('balances as b')
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->join('details as d', 'e.PersonalNumber', '=', 'd.PersonalNumber')
            ->join('contracts as con', 'con.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->where('b.id', '=', $id)
            ->first();
        return view('update', compact('id', 'details'));

    }

    public function selected()
    {
        $field = request("button");
        $id_checked = request()->to_select;
        if (is_array($id_checked) and $field == 0) {
            foreach ($id_checked as $maintable){
                $basket = new Basket();
                $basket->balid = $maintable;
                $basket->save();
            }
            return redirect()->route('home');
        }
        else if ($field == 1){
            if (is_array($id_checked)) {
                foreach ($id_checked as $maintable) {
                    $basket = new Basket();
                    $basket->balid = $maintable;
                    $basket->save();
                }
            }
            $maintables = \DB::table('balances as b')
                ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
                ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
                ->join('baskets as bk', 'bk.balid', '=', 'b.id')
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
                ->get();
            return view('basket', compact('maintables'));
        }
    }
    public function excel(){
        $id = request()->HiddenTraitor;
        if (is_array($id)) {
            \Excel::create('Balance', function ($excel) use ($id) {
                // Set the spreadsheet title, creator, and description
                $excel->sheet('Balances', function ($sheet) use ($id) {
                    $maintables = \DB::table('lands as l')
                        ->join('balances as b', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
                        ->join('contracts as c', 'c.UniqueLandNumber', '=', 'l.UniqueLandNumber')
                        ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
                        ->select('l.UniqueLandNumber as UniqueLandNumber',
                            'l.Status as Status',
                            'l.CompanyName as CompanyName',
                            'l.LocationLand as LocationLand',
                            'l.LandArea as LandArea',
                            'l.SoilProductivityScore as SoilProductivityScore',
                            'e.PersonalNumber as PersonalNumber',
                            'e.Name as Name',
                            'e.Surname as Surname',
                            'b.fstPrice as Payment first period',
                            'c.RentStartsFrom as Beginning of the first period',
                            'c.RentEndsIn as Ending of the first period',
                            'b.sndPrice as Payment second period',
                            'c.NewPriceStartingDate as Beginning of the second period',
                            'c.NewPriceTillDate as Ending of the second period',
                            'b.Year as Year')
                        ->whereIn('b.id', $id)
                        ->get();
                    $data = array();
                    foreach ($maintables as $maintable) {
                        $data[] = (array)$maintable;
                    }
                    $sheet->fromArray($data);

                });
            })->export('xlsx');
            $history = "";
            $baskets = \DB::table('basket as b')->get();
            foreach ($baskets as $basket){
                $history += $basket." ";
            }
            $basketh = new Baskethistory();
            $basketh->balid = $history;
            $basketh->save();
            basket::truncate();
        }
        return redirect('home');

    }
}
