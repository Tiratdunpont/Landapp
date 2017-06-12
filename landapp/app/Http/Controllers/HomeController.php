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
            ->join('details as d', 'b.PersonalNumber', '=', 'd.PersonalNumber')
            ->join('contracts as con', 'con.UniqueLandNumber', '=', 'b.UniqueLandNumber')
            ->where('b.id', '=', $id)
            ->get();
        $pay = 0;
        $price = 0;
        $price2 = 0;
        $pay2 = 0;
        foreach ($details as $detail) {
            if (!isset($detail->fstPrice)) {
                if (isset($detail->fstPricePerHectare) && isset($detail->RentedArea) && isset($detail->RentStartsFrom) && isset($detail->RentEndsIn)) {
                    $year = $detail->Year;
                    $priceh = $detail->fstPricePerHectare;
                    $totalh = $detail->RentedArea;
                    $sdate1 = $detail->RentStartsFrom;
                    $edate1 = $detail->RentEndsIn;
                    $price = $priceh * $totalh;
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
                    /*return ($aux);*/
                    $pay = $aux * $price;
                    if (isset($detail->sndPricePerHectare) && isset($detail->NewPriceStartingDate) && isset($detail->NewPriceTillDate)) {
                        $sdate1 = $detail->NewPriceStartingDate;
                        $edate1 = $detail->NewPriceTillDate;
                        $priceh = $detail->sndPricePerHectare;
                        $price2 = $priceh * $totalh;
                        $slength1 = strlen($sdate1);
                        $smonthl1 = $slength1 - 2;
                        $smonth1 = substr($sdate1, 0, $smonthl1 - 1);
                        $sday1 = substr($sdate1, $smonthl1, $slength1);
                        $elength1 = strlen($edate1);
                        $emonthl1 = $elength1 - 2;
                        $emonth1 = substr($edate1, 0, $emonthl1 - 1);
                        $eday1 = substr($edate1, $emonthl1, $elength1);
                        $aux = $this->days($smonth1, $emonth1, $sday1, $eday1, $year);
                        $pay2 = $aux * $price2;
                    }
                }
                \DB::table('balances as b')
                    ->where ('id', $id)
                    ->update(['fstPrice' => $pay]);

                \DB::table('balances as b')
                    ->where ('id', $id)
                    ->update(['sndPrice' => $pay2]);
            }
        }
        $details = \DB::table('balances as b')
            ->join('lands as l', 'b.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->join('entities as e', 'e.PersonalNumber', '=', 'b.PersonalNumber')
            ->join('companies as com', 'l.CompanyName', '=', 'com.CompanyName')
            ->join('details as d', 'e.PersonalNumber', '=', 'd.PersonalNumber')
            ->join('contracts as con', 'con.UniqueLandNumber', '=', 'l.UniqueLandNumber')
            ->where('b.id', '=', $id)
            ->get();
        return view('details', compact('details', 'pay', 'price', 'id', 'pay2', 'price2'));
    }

        public
        function delete()
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

        public
        function updateredir()
        {
            $id = request('id');
            return view('update', compact('id'));
        }

        public
        function selected()
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
            } else {
                $id = request()->HiddenTraitor;
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
                    ->whereIn('b.id', $id)
                    ->get();
                \Excel::create('Test1', function ($excel) use ($id) {

                    // Set the spreadsheet title, creator, and description
                    $excel->sheet('Balances', function ($sheet) use ($id) {
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
                            ->whereIn('b.id', $id)
                            ->get();
                        $data = array();
                        foreach ($maintables as $maintable) {
                            $data[] = (array)$maintable;
                        }
                        $sheet->fromArray($data);

                    });
                })->export('xls');


                return view('home', compact('maintables', 'selected'));
            }
        }
    }
