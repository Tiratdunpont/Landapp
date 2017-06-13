@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <table class="table">
                <tbody>
                <tr>
                    <th>Unique Land Number</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->UniqueLandNumber }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Land Area</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->LandArea }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Status</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Status }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Soil Productivity Score</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->SoilProductivityScore }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Registered In RC</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->RegisteredInRC }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Register Number</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->RegisterNumber }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Rented Area</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->RentedArea }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Referenced Company</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->ReferencedCompany }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Given In Change</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->GivenInChange }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>PlotUnderRealState</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->PlotUnderRealState }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>PersonalNumber</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->PersonalNumber }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Name</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Name }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Surname</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Surname }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Company Name</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->CompanyName }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Phone</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Phone }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Other Contact Information</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->OtherContactInformation }}</td>
                    @endforeach
                </tr>

                <tr>
                    <th>Subrenter</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Subrenter }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Subrent Until Date</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->SubrentTillDate }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Subrented Area</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->SubrentedArea }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Subrent RC</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->SubrentRC }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Subrent RC Since</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->SubrentRCSince }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Owned Date</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->OwnedDate }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Price starting date (MM-DD):</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->RentStartsFrom }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Price ending date (MM-DD):</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->RentEndsIn }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>2nd price starting date (MM-DD):</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->NewPriceStartingDate }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>2nd price until date (MM-DD):</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->NewPriceTillDate }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Bank Account</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->BankAccount }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>ContractedBy</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->ContractedBy }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>First Price Per Hectare</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->fstPricePerHectare }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Second Price Per Hectare</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->sndPricePerHectare }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Total Payment Per First Period</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->fstPrice }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Total Payment Per Second Period</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->sndPrice }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Contract Sign Date</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->ContractSignDate }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Changes Date</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->ChangesDate }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Contract Changes</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->ContractChanges }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Interval</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Interval }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Contract Number</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->ContractNumber }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Year</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Year }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Town</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Town }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Street</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Street }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>House</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->House }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Flat</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->Flat }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Area Number</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->AreaNumber }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Location Land</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->LocationLand }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Village Land</th>
                    @foreach($details as $detail)
                        <td>{{ $detail->VillageLand }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td><a href="delete?id={{ $id }}" class="btn btn-info pull-left" role="button">Delete</a></td>
                    <td><a href="update?id={{ $id }}" class="btn btn-info pull-right" role="button">Update</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
