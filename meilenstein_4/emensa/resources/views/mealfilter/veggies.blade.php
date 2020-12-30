@extends('layout.layout')
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

        @foreach($kategorieList as $kategorie)
            <tr>
                <td>{{$kategorie->name}}</td>

                @foreach($veggieList as $veggie)
                    @if(\App\Models\gericht_hat_kategorie::find($veggie)->kategorie_id == $kategorie->id)
                        <td>{{$veggie->name}}</td>
                    @else
                        <td></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
@endsection
