@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="excel">
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
                            <input type="hidden" id="HiddenElement" name="HiddenTraitor[]"
                                   value="{{ $maintable->id }}"/>
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
                </tbody>
            </table>
            <button type="submit" class="btn btn-info pull-right" name="button">Export Excel</button>
        </form>
    </div>
@endsection