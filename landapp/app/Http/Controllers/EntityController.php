<?php

namespace App\Http\Controllers;


use App\Entity;

class EntityController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'PersonalNumber' => 'required|digits:11',
            'Name',
            'Surname',
            'CompanyName',
            'Phone',
            'OtherContactInformation'
        ]);

        $entity = new Entity();
        $entity->PersonalNumber = request('PersonalNumber');
        $entity->Name = request('Name');
        $entity->Surname = request('Surname');
        $entity->Phone = request('Phone');
        $entity->OtherContactInformation = request('OtherContactInformation');
        $entity->save();

        return redirect('home');
    }

    public function erase(){

    }
}
