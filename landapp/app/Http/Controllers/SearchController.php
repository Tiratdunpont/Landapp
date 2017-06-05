<?php
namespace App\Http\Controllers;



class SearchController extends Controller{
    public function search(){
        if (request()->has('search')) {
            $keyword = request('search');
        }
        else{
            $keyword = 0;
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
            ->where('l.UniqueLandNumber', 'LIKE', '%'.$keyword.'%')
            ->orwhere('e.PersonalNumber', 'LIKE', '%'.$keyword.'%')
            ->orwhere('l.CompanyName', 'LIKE', '%'.$keyword.'%')
            ->paginate(25);
        return view('home', compact('maintables'));
    }
}