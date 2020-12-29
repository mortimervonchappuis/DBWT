@extends('Layout/layout')
@section('title')
    Meal List
@endsection
@section('content')
    <div class="preis" id="speisen" >
        <h2 class="headline-bold" style="text-align: center">Köstlichkeiten, die Sie erwarten!</h2>
        <table class=\"preis\" style="margin: auto">
            <thead>
            <tr>
                <th class=\"preis-head\">
                    Gericht
                </th>
                <th class=\"preis-head\">
                    Preis intern
                    <small>in €</small>
                </th>
                <th class=\"preis-head\">
                    Preis extern
                    <small>in €</small>

                </th>
                <th class=\"preis.head\">
                    Allergene
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($mealList as $meal)
                <tr>
                    <td class=\"preis-schrift\">
                        {{$meal->name}}
                    </td>
                    <td class=\"preis-euro\">
                        {{$meal->preis_intern}}
                    </td>
                    <td class=\"preis-euro\">
                        {{$meal->preis_extern}}
                    </td>
                    <td>
                        <small>{{$meal->gha_code ?? 'Nothing'}}</small>
                    </td>
                </tr>
            @endforeach

            <tr class=dots>
                <td>
                    <p>...</p>
                </td>
                <td>
                    <p>...</p>
                </td>
                <td>
                    <p>...</p>
                </td>
                <td>
                    <p>...</p>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
