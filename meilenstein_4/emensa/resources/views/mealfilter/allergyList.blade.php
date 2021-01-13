@extends('Layout.layout')
@section('content')
    @include('mealfilter.mealnav')

    <table style="margin: auto">
        <thead>
        <tr>
            <th>Code</th>
            <th>Beschreibung</th>
        </tr>
        </thead>

        <tbody>

        @foreach($allergenList as $allergen)
            <tr>
                <td>{{$allergen->code}}</td>
                <td>{{$allergen->name}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection
