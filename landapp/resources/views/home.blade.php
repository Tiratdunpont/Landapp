@extends('layouts.app')

@section('content')
    @include('layouts.filter', compact($maintables))

    <div class="container">
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        <form method="POST" action="selected">
            {{ csrf_field() }}
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Unique Land Number</th>
                    <th>Company Name</th>
                    <th>Location Land</th>
                    <th>Land Area</th>
                    <th>Soil Productivity Score</th>
                    <th>Personal Number</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($maintables as $maintable)
                    <tr>
                        <td>
                            <input type="checkbox" id="checkbox" name="to_select[]" value="{{ $maintable->id }}"/>
                            <input type="hidden" id="HiddenElement" name="HiddenTraitor[]" value="{{ $maintable->id }}"/>
                        </td>
                        <td>{{ $maintable->UniqueLandNumber }}</td>
                        <td>{{ $maintable->CompanyName }}</td>
                        <td>{{ $maintable->LocationLand }}</td>
                        <td>{{ $maintable->LandArea }}</td>
                        <td>{{ $maintable->SoilProductivityScore }}</td>
                        <td>{{ $maintable->PersonalNumber }}</td>
                        <td>{{ $maintable->Name }}</td>
                        <td>{{ $maintable->Surname }}</td>
                        <td><a href="details?id={{ $maintable->id }}" class="btn btn-info" role="button">View</a></td>
                        <td><a href="update?id={{ $maintable->id }}" class="btn btn-info" role="button">Update</a></td>
                    </tr>
                @endforeach
                <button type="submit" class="btn btn-link" name="button" value="1">Select checked</button>
                </tbody>
            </table>
            <button type="submit" class="btn btn-info pull-right" name="button" value="2">Export all rows to Excel</button>
        </form>
        {{ $maintables->links() }}
    </div>

    <div class="container">
        <div class="form-group">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#insert">Insert</button>
        </div>
        <div id="insert" class="collapse">
            <form method="POST" action="InsertAll">
                {{ csrf_field() }}
                <div class="btn-group" style="width: 100%">
                    <div name="column1" class="col-md-3">
                        <div class="form-group">
                            <label for="ReferencedCompany">Referenced company:</label>
                            <input class="form-control" id="ReferencedName" name="ReferencedCompany" value="{{ old('ReferencedCompany') }}">
                            @if ($errors->has('ReferencedName'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ReferencedName') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Status">* Status:</label>
                            <input class="form-control" id="Status" name="Status" value="{{ old('Status') }}">
                            @if ($errors->has('Status'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Status') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="ContractSignDate">Contract sign date:</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input class="form-control" id="ContractSignDate" name="ContractSignDate" value="{{ old('ContractSignDate') }}">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                            @if ($errors->has('ContractSignDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ContractSignDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ContractChanges">Contract changes:</label>
                            <input class="form-control" id="ContractChanges" name="ContractChanges" value="{{ old('ContractChanges') }}">
                            @if ($errors->has('ContractChanges'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ContractChanges') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ChangesDate">Changes date:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input class="form-control" id="ChangesDate" name="ChangesDate" value="{{ old('ChangesDate') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            @if ($errors->has('ChangesDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ChangesDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ContractNumber">Contract number:</label>
                            <input class="form-control" id="ContractNumber" name="ContractNumber" value="{{ old('ChangesDate') }}">
                            @if ($errors->has('ContractNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('ContractNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Name">Name:</label>
                            <input class="form-control" id="Name" name="Name" value="{{ old('Name') }}">
                            @if ($errors->has('Name'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Surname">Surname:</label>
                            <input class="form-control" id="Surname" name="Surname" value="{{ old('Surname') }}">
                            @if ($errors->has('Surname'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Surname') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PersonalNumber">* Personal number:</label>
                            <input class="form-control" id="PersonalNumber" name="PersonalNumber" value="{{ old('PersonalNumber') }}">
                            @if ($errors->has('PersonalNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('PersonalNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Town">Town:</label>
                            <input class="form-control" id="Town" name="Town" value="{{ old('Town') }}">
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
                            <input class="form-control" id="Street" name="Street" value="{{ old('Street') }}">
                            @if ($errors->has('Street'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Street') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="House">House:</label>
                            <input class="form-control" id="House" name="House" value="{{ old('House') }}">
                            @if ($errors->has('House'))
                                <span class="help-block">
                        <strong>{{ $errors->first('House') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Flat">Flat:</label>
                            <input class="form-control" id="Flat" name="Flat" value="{{ old('Town') }}">
                            @if ($errors->has('Flat'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Flat') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="AreaNumber">Area number:</label>
                            <input class="form-control" id="AreaNumber" name="AreaNumber" value="{{ old('AreaNumber') }}">
                            @if ($errors->has('AreaNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('AreaNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone:</label>
                            <input class="form-control" id="Phone" name="Phone" value="{{ old('Phone') }}">
                            @if ($errors->has('Phone'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Phone') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="OtherContactInformation">Other contact information:</label>
                            <input class="form-control" id="OtherContactInformation" name="OtherContactInformation" value="{{ old('OtherContactInformation') }}">
                            @if ($errors->has('OtherContactInformation'))
                                <span class="help-block">
                        <strong>{{ $errors->first('OtherContactInformation') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="BankAccount">Bank account:</label>
                            <input class="form-control" id="BankAccount" name="BankAccount" value="{{ old('BankAccount') }}">
                            @if ($errors->has('BankAccount'))
                                <span class="help-block">
                        <strong>{{ $errors->first('BankAccount') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="UniqueLandNumber">* Unique land number:</label>
                            <input class="form-control" id="UniqueLandNumber" name="UniqueLandNumber" value="{{ old('UniqueLandNumber') }}">
                            @if ($errors->has('UniqueLandNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('UniqueLandNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="LocationLand">Location land:</label>
                            <input class="form-control" id="LocationLand" name="LocationLand" value="{{ old('LocationLand') }}">
                            @if ($errors->has('LocationLand'))
                                <span class="help-block">
                        <strong>{{ $errors->first('LocationLand') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="VillageLand">Village land:</label>
                            <input class="form-control" id="VillageLand" name="VillageLand" value="{{ old('VillageLand') }}">
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
                            <input class="form-control" id="SoilProductivityScore" name="SoilProductivityScore" value="{{ old('SoilProductivityScore') }}">
                            @if ($errors->has('SoilProductivityScore'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SoilProductivityScore') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="LandArea">* Land area:</label>
                            <input class="form-control" id="LandArea" name="LandArea" value="{{ old('LandArea') }}">
                            @if ($errors->has('LandArea'))
                                <span class="help-block">
                        <strong>{{ $errors->first('LandArea') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RentedArea">* Rented area:</label>
                            <input class="form-control" id="RentedArea" name="RentedArea" value="{{ old('RentedArea') }}">
                            @if ($errors->has('RentedArea'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RentedArea') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="GivenInChange">Given in change:</label>
                            <input class="form-control" id="GivenInChange" name="GivenInChange" value="{{ old('GivenInChange') }}">
                            @if ($errors->has('GivenInChange'))
                                <span class="help-block">
                        <strong>{{ $errors->first('GivenInChange') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="PlotUnderRealState">Plot under real state:</label>
                            <input class="form-control" id="PlotUnderRealState" name="PlotUnderRealState" value="{{ old('PlotUnderRealState') }}">
                            @if ($errors->has('PlotUnderRealState'))
                                <span class="help-block">
                        <strong>{{ $errors->first('PlotUnderRealState') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RentStartsFrom">* Price starting date:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input class="form-control" id="RentStartsFrom" name="RentStartsFrom" value="{{ old('RentStartsFrom') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                            @if ($errors->has('RentStartsFrom'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RentStartsFrom') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RentEndsIn">* Price ending date:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input class="form-control" id="RentEndsIn" name="RentEndsIn" value="{{ old('RentEndsIn') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                            @if ($errors->has('RentEndsIn'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RentEndsIn') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="NewPriceStartingDate">2nd price starting date:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input class="form-control" id="NewPriceStartingDate" name="NewPriceStartingDate" value="{{ old('NewPriceStartingDate') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                            @if ($errors->has('NewPriceStartingDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('NewPriceStartingDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="NewPriceTillDate">2nd price until date:</label>
                            <div class="picker">
                            <div class="input-group date" data-provide="datepicker">
                                <input class="form-control" id="NewPriceTillDate" name="NewPriceTillDate" value="{{ old('NewPriceTillDate') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            </div>

                            @if ($errors->has('NewPriceTillDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('NewPriceTillDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="RegisteredInRC">Registered in RC:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input class="form-control" id="RegisteredInRC" name="RegisteredInRC" value="{{ old('RegisteredInRC') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

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
                            <input class="form-control" id="RegisterNumber" name="RegisterNumber" value="{{ old('RegisterNumber') }}">
                            @if ($errors->has('RegisterNumber'))
                                <span class="help-block">
                        <strong>{{ $errors->first('RegisterNumber') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fstPricePerHectare">First Price Per Hectare</label>
                            <input class="form-control" id="fstPricePerHectare" name="fstPricePerHectare" value="{{ old('fstPricePerHectare') }}">
                            @if ($errors->has('fstPricePerHectare'))
                                <span class="help-block">
                        <strong>{{ $errors->first('fstPricePerHectare') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sndPricePerHectare">Second Price Per Hectare</label>
                            <input class="form-control" id="sndPricePerHectare" name="sndPricePerHectare" value="{{ old('sndPricePerHectare') }}">
                            @if ($errors->has('sndPricePerHectare'))
                                <span class="help-block">
                        <strong>{{ $errors->first('sndPricePerHectare') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="* CompanyName">* Company Name:</label>
                            <input class="form-control" id="CompanyName" name="CompanyName" value="{{ old('CompanyName') }}">
                            @if ($errors->has('CompanyName'))
                                <span class="help-block">
                        <strong>{{ $errors->first('CompanyName') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Subrenter">Subrenter:</label>
                            <input class="form-control" id="Subrenter" name="Subrenter" value="{{ old('Subrenter') }}">
                            @if ($errors->has('Subrenter'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Subrenter') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SubrentTillDate">Subrent until date:</label>
                            <input class="form-control" id="SubrentTillDate" name="SubrentTillDate" value="{{ old('SubrentTillDate') }}">
                            @if ($errors->has('SubrentTillDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SubrentTillDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SubrentedArea">Subrented area:</label>
                            <input class="form-control" id="SubrentedArea" name="SubrentedArea" value="{{ old('SubrentedArea') }}">
                            @if ($errors->has('SubrentedArea'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SubrentedArea') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="SubrentRCSince">Subrent RC since:</label>
                            <input class="form-control" id="SubrentRCSince" name="SubrentRCSince" value="{{ old('SubrentRCSince') }}">
                            @if ($errors->has('SubrentRCSince'))
                                <span class="help-block">
                        <strong>{{ $errors->first('SubrentRCSince') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="OwnedDate">Owned date:</label>
                            <input class="form-control" id="OwnedDate" name="OwnedDate" value="{{ old('OwnedDate') }}">
                            @if ($errors->has('OwnedDate'))
                                <span class="help-block">
                        <strong>{{ $errors->first('OwnedDate') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Year">* Year:</label>
                            <input class="form-control" id="Year" name="Year" value="{{ old('Year') }}">
                            @if ($errors->has('Year'))
                                <span class="help-block">
                        <strong>{{ $errors->first('Year') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
