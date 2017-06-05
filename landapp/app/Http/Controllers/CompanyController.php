<?php

namespace App\Http\Controllers;


use App\Company;

class CompanyController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'CompanyName' => 'required',
        ]);

        $company = new Company();
        $company->CompanyName = request('CompanyName');
        $company->save();

        return redirect('home');
    }
}
