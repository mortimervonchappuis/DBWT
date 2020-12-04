@extends('layout/layout')
@section('title')
    Meal List
@endsection
@section('content')
    <div class="preis" id="speisen">
        <h2 class="headline-bold">Köstlichkeiten, die Sie erwarten!</h2>
        <table class=\"preis\">
            <thead>
            <tr>
                <th>

                </th>
                <th class=\"preis-head\">
                    Preis intern
                </th>
                <th class=\"preis-head\">
                    Preis extern
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
                        <small>Nothing yet</small>
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
