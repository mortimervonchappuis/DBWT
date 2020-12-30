@extends('layout.layout')
@section('content')
    @include('mealfilter.mealnav')

    <table style="margin: auto">
        <thead>
        <tr>
            <th>Benutzer</th>
            <th>Anmeldungen</th>
        </tr>
        </thead>

        <tbody>

        @foreach($userList as $user)
            <tr>
                <td>{{$user->E_Mail}}</td>
                <td>{{$user->anzahl_anmeldungen}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection
