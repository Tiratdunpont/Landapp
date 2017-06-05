@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="update" class="container">
            <form method="POST" action="Updatedb">
                {{ csrf_field() }}
                <div name="column1" class="col-md-3">
                    <div class="form-group">
                        <label for="CompanyName">Company name:</label>
                        <input class="form-control" id="CompanyName" name="CompanyName">
                        @if ($errors->has('CompanyName'))
                            <span class="help-block">
                        <strong>{{ $errors->first('CompanyName') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Status">Status:</label>
                        <input class="form-control" id="Status" name="Status">
                        @if ($errors->has('Status'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Status') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ContractSignDate">Contract sign date:</label>
                        <input class="form-control" id="ContractSignDate" name="ContractSignDate">
                        @if ($errors->has('ContractSignDate'))
                            <span class="help-block">
                        <strong>{{ $errors->first('ContractSignDate') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ContractChanges">Contract changes:</label>
                        <input class="form-control" id="ContractChanges" name="ContractChanges">
                        @if ($errors->has('ContractChanges'))
                            <span class="help-block">
                        <strong>{{ $errors->first('ContractChanges') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ChangesDate">Changes date:</label>
                        <input class="form-control" id="ChangesDate" name="ChangesDate">
                        @if ($errors->has('ChangesDate'))
                            <span class="help-block">
                        <strong>{{ $errors->first('ChangesDate') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ContractNumber">Contract number:</label>
                        <input class="form-control" id="ContractNumber" name="ContractNumber">
                        @if ($errors->has('ContractNumber'))
                            <span class="help-block">
                        <strong>{{ $errors->first('ContractNumber') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input class="form-control" id="Name" name="Name">
                        @if ($errors->has('Name'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Surname">Surname:</label>
                        <input class="form-control" id="Surname" name="Surname">
                        @if ($errors->has('Surname'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Surname') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="PersonalNumber">Personal number:</label>
                        <input class="form-control" id="PersonalNumber" name="PersonalNumber">
                        @if ($errors->has('PersonalNumber'))
                            <span class="help-block">
                        <strong>{{ $errors->first('PersonalNumber') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                <div name="column2" class="col-md-3">
                    <div class="form-group">
                        <label for="Town">Town:</label>
                        <input class="form-control" id="Town" name="Town">
                        @if ($errors->has('Town'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Town') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Street">Street:</label>
                        <input class="form-control" id="Street" name="Street">
                        @if ($errors->has('Street'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Street') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="House">House:</label>
                        <input class="form-control" id="House" name="House">
                        @if ($errors->has('House'))
                            <span class="help-block">
                        <strong>{{ $errors->first('House') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Flat">Flat:</label>
                        <input class="form-control" id="Flat" name="Flat">
                        @if ($errors->has('Flat'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Flat') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="AreaNumber">Area number:</label>
                        <input class="form-control" id="AreaNumber" name="AreaNumber">
                        @if ($errors->has('AreaNumber'))
                            <span class="help-block">
                        <strong>{{ $errors->first('AreaNumber') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone:</label>
                        <input class="form-control" id="Phone" name="Phone">
                        @if ($errors->has('Phone'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Phone') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="OtherContactInformation">Other contact information:</label>
                        <input class="form-control" id="OtherContactInformation" name="OtherContactInformation">
                        @if ($errors->has('OtherContactInformation'))
                            <span class="help-block">
                        <strong>{{ $errors->first('OtherContactInformation') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="BankAccount">Bank account:</label>
                        <input class="form-control" id="BankAccount" name="BankAccount">
                        @if ($errors->has('BankAccount'))
                            <span class="help-block">
                        <strong>{{ $errors->first('BankAccount') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="UniqueLandNumber">Unique land number:</label>
                        <input class="form-control" id="UniqueLandNumber" name="UniqueLandNumber">
                        @if ($errors->has('UniqueLandNumber'))
                            <span class="help-block">
                        <strong>{{ $errors->first('UniqueLandNumber') }}</strong>
                    </span>
                        @endif
                    </div>

                </div>
                <div name="column3" class="col-md-3">
                    <div class="form-group">
                        <label for="LocationLand">Location land:</label>
                        <input class="form-control" id="LocationLand" name="LocationLand">
                        @if ($errors->has('LocationLand'))
                            <span class="help-block">
                        <strong>{{ $errors->first('LocationLand') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="VillageLand">Village land:</label>
                        <input class="form-control" id="VillageLand" name="VillageLand">
                        @if ($errors->has('VillageLand'))
                            <span class="help-block">
                        <strong>{{ $errors->first('VillageLand') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="SoilProductivityScore">Soil productivity score:</label>
                        <input class="form-control" id="SoilProductivityScore" name="SoilProductivityScore">
                        @if ($errors->has('SoilProductivityScore'))
                            <span class="help-block">
                        <strong>{{ $errors->first('SoilProductivityScore') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="LandArea">Land area:</label>
                        <input class="form-control" id="LandArea" name="LandArea">
                        @if ($errors->has('LandArea'))
                            <span class="help-block">
                        <strong>{{ $errors->first('LandArea') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="RentedArea">Rented area:</label>
                        <input class="form-control" id="RentedArea" name="RentedArea">
                        @if ($errors->has('RentedArea'))
                            <span class="help-block">
                        <strong>{{ $errors->first('RentedArea') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="GivenInChange">Given in change:</label>
                        <input class="form-control" id="GivenInChange" name="GivenInChange">
                        @if ($errors->has('GivenInChange'))
                            <span class="help-block">
                        <strong>{{ $errors->first('GivenInChange') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="PlotUnderRealState">Plot under real state:</label>
                        <input class="form-control" id="PlotUnderRealState" name="PlotUnderRealState">
                        @if ($errors->has('PlotUnderRealState'))
                            <span class="help-block">
                        <strong>{{ $errors->first('PlotUnderRealState') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="NewPriceStartingDate">New price starting date:</label>
                        <input class="form-control" id="NewPriceStartingDate" name="NewPriceStartingDate">
                        @if ($errors->has('NewPriceStartingDate'))
                            <span class="help-block">
                        <strong>{{ $errors->first('NewPriceStartingDate') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="NewPriceTillDate">New price until date:</label>
                        <input class="form-control" id="NewPriceTillDate" name="NewPriceTillDate">
                        @if ($errors->has('NewPriceTillDate'))
                            <span class="help-block">
                        <strong>{{ $errors->first('NewPriceTillDate') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
                <div name="column4" class="col-md-3">
                    <div class="form-group">
                        <label for="RegisteredInRC">Registered in RC:</label>
                        <input class="form-control" id="RegisteredInRC" name="RegisteredInRC">
                        @if ($errors->has('RegisteredInRC'))
                            <span class="help-block">
                        <strong>{{ $errors->first('RegisteredInRC') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="RegisterNumber">Register number:</label>
                        <input class="form-control" id="RegisterNumber" name="RegisterNumber">
                        @if ($errors->has('RegisterNumber'))
                            <span class="help-block">
                        <strong>{{ $errors->first('RegisterNumber') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="PricePerHectare">Price per hectare:</label>
                        <input class="form-control" id="PricePerHectare" name="PricePerHectare">
                        @if ($errors->has('PricePerHectare'))
                            <span class="help-block">
                        <strong>{{ $errors->first('PricePerHectare') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="PayPerYearUntilMonth">Pay per year until (MM-DD):</label>
                        <input class="form-control" id="PayPerYearUntilMonth" name="PayPerYearUntilMonth">
                        @if ($errors->has('PayPerYearUntilMonth'))
                            <span class="help-block">
                        <strong>{{ $errors->first('PayPerYearUntilMonth') }}</strong>
                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="Subrenter">Subrenter:</label>
                        <input class="form-control" id="Subrenter" name="Subrenter">
                        @if ($errors->has('Subrenter'))
                            <span class="help-block">
                        <strong>{{ $errors->first('Subrenter') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Subrenter">Referenced company:</label>
                        <input class="form-control" id="ReferencedCompany" name="ReferencedCompany">
                        @if ($errors->has('ReferencedCompany'))
                            <span class="help-block">
                        <strong>{{ $errors->first('ReferencedCompany') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="SubrentTillDate">Subrent until date:</label>
                        <input class="form-control" id="SubrentTillDate" name="SubrentTillDate">
                        @if ($errors->has('SubrentTillDate'))
                            <span class="help-block">
                        <strong>{{ $errors->first('SubrentTillDate') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="SubrentedArea">Subrented area:</label>
                        <input class="form-control" id="SubrentedArea" name="SubrentedArea">
                        @if ($errors->has('SubrentedArea'))
                            <span class="help-block">
                        <strong>{{ $errors->first('SubrentedArea') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="SubrentRCSince">Subrent RC since:</label>
                        <input class="form-control" id="SubrentRCSince" name="SubrentRCSince">
                        @if ($errors->has('SubrentRCSince'))
                            <span class="help-block">
                        <strong>{{ $errors->first('SubrentRCSince') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="OwnedDate">Owned date:</label>
                        <input class="form-control" id="OwnedDate" name="OwnedDate">
                        @if ($errors->has('OwnedDate'))
                            <span class="help-block">
                        <strong>{{ $errors->first('OwnedDate') }}</strong>
                    </span>
                        @endif
                    </div>
                    <input type="hidden" name="id" value="{{request()->id}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection