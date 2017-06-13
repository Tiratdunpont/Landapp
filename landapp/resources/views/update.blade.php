@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="update" class="container">
            <form method="POST" action="Updatedb">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{request()->id}}">
                <div class="btn-group" style="width: 100%">
                    <div name="column1" class="col-md-3">
                        <div class="form-group">
                            <label for="ReferencedCompany">Referenced company:</label>
                            <input class="form-control" id="ReferencedName" name="ReferencedCompany" value="{{$details->ReferencedCompany}}">
                            @if ($errors->has('ReferencedName'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ReferencedName') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Status">Status:</label>
                            <input class="form-control" id="Status" name="Status" value="{{$details->Status}}">
                            @if ($errors->has('Status'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Status') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ContractSignDate">Contract sign date:</label>
                            <input class="form-control" id="ContractSignDate" name="ContractSignDate" value="{{$details->ContractSignDate}}">
                            @if ($errors->has('ContractSignDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ContractSignDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ContractChanges">Contract changes:</label>
                            <input class="form-control" id="ContractChanges" name="ContractChanges" value="{{$details->ContractSignDate}}">
                            @if ($errors->has('ContractChanges'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ContractChanges') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ChangesDate">Changes date:</label>
                            <input class="form-control" id="ChangesDate" name="ChangesDate" value="{{$details->ContractSignDate}}">
                            @if ($errors->has('ChangesDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ChangesDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ContractNumber">Contract number:</label>
                            <input class="form-control" id="ContractNumber" name="ContractNumber" value="{{$details->ContractNumber}}">
                            @if ($errors->has('ContractNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ContractNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Name">Name:</label>
                            <input class="form-control" id="Name" name="Name" value="{{$details->Name}}">
                            @if ($errors->has('Name'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Surname">Surname:</label>
                            <input class="form-control" id="Surname" name="Surname" value="{{$details->Surname}}">
                            @if ($errors->has('Surname'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Surname') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PersonalNumber">Personal number:</label>
                            <input class="form-control" id="PersonalNumber" name="PersonalNumber" value="{{$details->PersonalNumber}}">
                            @if ($errors->has('PersonalNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('PersonalNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Town">Town:</label>
                            <input class="form-control" id="Town" name="Town" value="{{$details->Town}}">
                            @if ($errors->has('Town'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Town') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div name="column2" class="col-md-3">
                        <div class="form-group">
                            <label for="Street">Street:</label>
                            <input class="form-control" id="Street" name="Street" value="{{$details->Street}}">
                            @if ($errors->has('Street'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Street') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="House">House:</label>
                            <input class="form-control" id="House" name="House" value="{{$details->House}}">
                            @if ($errors->has('House'))
                                <span class="help-block">
                        <strong>{{ $errors->first('House') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Flat">Flat:</label>
                            <input class="form-control" id="Flat" name="Flat" value="{{$details->Flat}}">
                            @if ($errors->has('Flat'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Flat') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="AreaNumber">Area number:</label>
                            <input class="form-control" id="AreaNumber" name="AreaNumber" value="{{$details->AreaNumber}}">
                            @if ($errors->has('AreaNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('AreaNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone:</label>
                            <input class="form-control" id="Phone" name="Phone" value="{{$details->Phone}}">
                            @if ($errors->has('Phone'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Phone') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="OtherContactInformation">Other contact information:</label>
                            <input class="form-control" id="OtherContactInformation" name="OtherContactInformation" value="{{$details->OtherContactInformation}}">
                            @if ($errors->has('OtherContactInformation'))
                                <span class="help-block">
                        <strong>{{ $errors->first('OtherContactInformation') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="BankAccount">Bank account:</label>
                            <input class="form-control" id="BankAccount" name="BankAccount" value="{{$details->BankAccount}}">
                            @if ($errors->has('BankAccount'))
                                <span class="help-block">
                        <strong>{{ $errors->first('BankAccount') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="UniqueLandNumber">Unique land number:</label>
                            <input class="form-control" id="UniqueLandNumber" name="UniqueLandNumber" value="{{$details->UniqueLandNumber}}">
                            @if ($errors->has('UniqueLandNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('UniqueLandNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="LocationLand">Location land:</label>
                            <input class="form-control" id="LocationLand" name="LocationLand" value="{{$details->LocationLand}}">
                            @if ($errors->has('LocationLand'))
                                <span class="help-block">
                        <strong>{{ $errors->first('LocationLand') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="VillageLand">Village land:</label>
                            <input class="form-control" id="VillageLand" name="VillageLand" value="{{$details->VillageLand}}">
                            @if ($errors->has('VillageLand'))
                                <span class="help-block">
                        <strong>{{ $errors->first('VillageLand') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div name="column3" class="col-md-3">
                        <div class="form-group">
                            <label for="SoilProductivityScore">Soil productivity score:</label>
                            <input class="form-control" id="SoilProductivityScore" name="SoilProductivityScore" value="{{$details->SoilProductivityScore}}">
                            @if ($errors->has('SoilProductivityScore'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SoilProductivityScore') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="LandArea">Land area:</label>
                            <input class="form-control" id="LandArea" name="LandArea" value="{{$details->LandArea}}">
                            @if ($errors->has('LandArea'))
                                <span class="help-block">
                        <strong>{{ $errors->first('LandArea') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RentedArea">Rented area:</label>
                            <input class="form-control" id="RentedArea" name="RentedArea" value="{{$details->RentedArea}}">
                            @if ($errors->has('RentedArea'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RentedArea') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="GivenInChange">Given in change:</label>
                            <input class="form-control" id="GivenInChange" name="GivenInChange" value="{{$details->GivenInChange}}">
                            @if ($errors->has('GivenInChange'))
                                <span class="help-block">
                        <strong>{{ $errors->first('GivenInChange') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PlotUnderRealState">Plot under real state:</label>
                            <input class="form-control" id="PlotUnderRealState" name="PlotUnderRealState" value="{{$details->PlotUnderRealState}}">
                            @if ($errors->has('PlotUnderRealState'))
                                <span class="help-block">
                        <strong>{{ $errors->first('PlotUnderRealState') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RentStartsFrom">Price starting date (MM-DD):</label>
                            <input class="form-control" id="RentStartsFrom" name="RentStartsFrom" value="{{$details->RentStartsFrom}}">
                            @if ($errors->has('RentStartsFrom'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RentStartsFrom') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RentEndsIn">Price ending date (MM-DD):</label>
                            <input class="form-control" id="RentEndsIn" name="RentEndsIn" value="{{$details->RentEndsIn}}">
                            @if ($errors->has('RentEndsIn'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RentEndsIn') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="NewPriceStartingDate">2nd price starting date (MM-DD):</label>
                            <input class="form-control" id="NewPriceStartingDate" name="NewPriceStartingDate" value="{{$details->NewPriceStartingDate}}">
                            @if ($errors->has('NewPriceStartingDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('NewPriceStartingDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="NewPriceTillDate">New price ending date (MM-DD):</label>
                            <input class="form-control" id="NewPriceTillDate" name="NewPriceTillDate" value="{{$details->NewPriceTillDate}}">
                            @if ($errors->has('NewPriceTillDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('NewPriceTillDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RegisteredInRC">Registered in RC:</label>
                            <input class="form-control" id="RegisteredInRC" name="RegisteredInRC" value="{{$details->RegisteredInRC}}">
                            @if ($errors->has('RegisteredInRC'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RegisteredInRC') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div name="column4" class="col-md-3">
                        <div class="form-group">
                            <label for="RegisterNumber">Register number:</label>
                            <input class="form-control" id="RegisterNumber" name="RegisterNumber" value="{{$details->RegisterNumber}}">
                            @if ($errors->has('RegisterNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RegisterNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fstPricePerHectare">First price per hectare:</label>
                            <input class="form-control" id="fstPricePerHectare" name="fstPricePerHectare" value="{{$details->fstPricePerHectare}}">
                            @if ($errors->has('fstPricePerHectare'))
                                <span class="help-block">
                        <strong>{{ $errors->first('fstPricePerHectare') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sndPricePerHectare">Second price per hectare:</label>
                            <input class="form-control" id="sndPricePerHectare" name="sndPricePerHectare" value="{{$details->sndPricePerHectare}}">
                            @if ($errors->has('sndPricePerHectare'))
                                <span class="help-block">
                        <strong>{{ $errors->first('sndPricePerHectare') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="CompanyName">Company Name:</label>
                            <input class="form-control" id="CompanyName" name="CompanyName" value="{{$details->CompanyName}}">
                            @if ($errors->has('CompanyName'))
                                <span class="help-block">
                        <strong>{{ $errors->first('CompanyName') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Subrenter">Subrenter:</label>
                            <input class="form-control" id="Subrenter" name="Subrenter" value="{{$details->Subrenter}}">
                            @if ($errors->has('Subrenter'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Subrenter') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SubrentTillDate">Subrent until date:</label>
                            <input class="form-control" id="SubrentTillDate" name="SubrentTillDate" value="{{$details->SubrentTillDate}}">
                            @if ($errors->has('SubrentTillDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SubrentTillDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SubrentedArea">Subrented area:</label>
                            <input class="form-control" id="SubrentedArea" name="SubrentedArea" value="{{$details->SubrentedArea}}">
                            @if ($errors->has('SubrentedArea'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SubrentedArea') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SubrentRCSince">Subrent RC since:</label>
                            <input class="form-control" id="SubrentRCSince" name="SubrentRCSince" value="{{$details->SubrentRCSince}}">
                            @if ($errors->has('SubrentRCSince'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SubrentRCSince') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="OwnedDate">Owned date:</label>
                            <input class="form-control" id="OwnedDate" name="OwnedDate" value="{{$details->OwnedDate}}">
                            @if ($errors->has('OwnedDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('OwnedDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Year">Year:</label>
                            <input class="form-control" id="Year" name="Year" value="{{$details->Year}}">
                            @if ($errors->has('Year'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Year') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection