@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <table class="table">
                <tbody>
                <tr>
                    <th>Unique Land Number</th>
                    <td>{{ $details->UniqueLandNumber }}</td>
                </tr>
                <tr>
                    <th>Land Area</th>
                    <td>{{ $details->LandArea }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $details->Status }}</td>
                </tr>
                <tr>
                    <th>Soil Productivity Score</th>
                    <td>{{ $details->SoilProductivityScore }}</td>
                </tr>
                <tr>
                    <th>Registered In RC</th>
                    <td>{{ $details->RegisteredInRC }}</td>
                </tr>
                <tr>
                    <th>Register Number</th>
                    <td>{{ $details->RegisterNumber }}</td>
                </tr>
                <tr>
                    <th>Rented Area</th>
                    <td>{{ $details->RentedArea }}</td>
                </tr>
                <tr>
                    <th>Referenced Company</th>
                    <td>{{ $details->ReferencedCompany }}</td>
                </tr>
                <tr>
                    <th>Given In Change</th>
                    <td>{{ $details->GivenInChange }}</td>
                </tr>
                <tr>
                    <th>PlotUnderRealState</th>
                    <td>{{ $details->PlotUnderRealState }}</td>
                </tr>
                <tr>
                    <th>PersonalNumber</th>
                    <td>{{ $details->PersonalNumber }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $details->Name }}</td>
                </tr>
                <tr>
                    <th>Surname</th>
                    <td>{{ $details->Surname }}</td>
                </tr>
                <tr>
                    <th>Company Name</th>
                    <td>{{ $details->CompanyName }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $details->Phone }}</td>
                </tr>
                <tr>
                    <th>Other Contact Information</th>
                    <td>{{ $details->OtherContactInformation }}</td>
                </tr>

                <tr>
                    <th>Subrenter</th>
                    <td>{{ $details->Subrenter }}</td>
                </tr>
                <tr>
                    <th>Subrent Until Date</th>
                    <td>{{ $details->SubrentTillDate }}</td>
                </tr>
                <tr>
                    <th>Subrented Area</th>
                    <td>{{ $details->SubrentedArea }}</td>
                </tr>
                <tr>
                    <th>Subrent RC</th>
                    <td>{{ $details->SubrentRC }}</td>
                </tr>
                <tr>
                    <th>Subrent RC Since</th>
                    <td>{{ $details->SubrentRCSince }}</td>
                </tr>
                <tr>
                    <th>Owned Date</th>
                    <td>{{ $details->OwnedDate }}</td>
                </tr>
                <tr>
                    <th>Price starting date (MM-DD):</th>
                    <td>{{ $details->RentStartsFrom }}</td>
                </tr>
                <tr>
                    <th>Price ending date (MM-DD):</th>
                    <td>{{ $details->RentEndsIn }}</td>
                </tr>
                <tr>
                    <th>2nd price starting date (MM-DD):</th>
                    <td>{{ $details->NewPriceStartingDate }}</td>
                </tr>
                <tr>
                    <th>2nd price until date (MM-DD):</th>
                    <td>{{ $details->NewPriceTillDate }}</td>
                </tr>
                <tr>
                    <th>Bank Account</th>
                    <td>{{ $details->BankAccount }}</td>
                </tr>
                <tr>
                    <th>ContractedBy</th>
                    <td>{{ $details->ContractedBy }}</td>
                </tr>
                <tr>
                    <th>First Price Per Hectare</th>
                    <td>{{ $details->fstPricePerHectare }}</td>
                </tr>
                <tr>
                    <th>Second Price Per Hectare</th>
                    <td>{{ $details->sndPricePerHectare }}</td>
                </tr>
                <tr>
                    <th>Total Payment Per First Period</th>
                    <td>{{ $details->fstPrice }}</td>
                </tr>
                <tr>
                    <th>Total Payment Per Second Period</th>
                    <td>{{ $details->sndPrice }}</td>
                </tr>
                <tr>
                    <th>Contract Sign Date</th>
                    <td>{{ $details->ContractSignDate }}</td>
                </tr>
                <tr>
                    <th>Changes Date</th>
                    <td>{{ $details->ChangesDate }}</td>
                </tr>
                <tr>
                    <th>Contract Changes</th>
                    <td>{{ $details->ContractChanges }}</td>
                </tr>
                <tr>
                    <th>Interval</th>
                    <td>{{ $details->Interval }}</td>
                </tr>
                <tr>
                    <th>Contract Number</th>
                    <td>{{ $details->ContractNumber }}</td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td>{{ $details->Year }}</td>
                </tr>
                <tr>
                    <th>Town</th>
                    <td>{{ $details->Town }}</td>
                </tr>
                <tr>
                    <th>Street</th>
                    <td>{{ $details->Street }}</td>
                </tr>
                <tr>
                    <th>House</th>
                    <td>{{ $details->House }}</td>
                </tr>
                <tr>
                    <th>Flat</th>
                    <td>{{ $details->Flat }}</td>
                </tr>
                <tr>
                    <th>Area Number</th>
                    <td>{{ $details->AreaNumber }}</td>
                </tr>
                <tr>
                    <th>Location Land</th>
                    <td>{{ $details->LocationLand }}</td>
                </tr>
                <tr>
                    <th>Village Land</th>
                    <td>{{ $details->VillageLand }}</td>
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
