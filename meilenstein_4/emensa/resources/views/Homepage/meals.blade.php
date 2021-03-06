@extends('Layout/layout')
@section('title')
    Meal List
@endsection
@section('content')
    @include('mealfilter.mealnav')
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
                        <small>
                            @foreach($allergenList as $allergen)
                                @if($allergen->gericht_id == $meal->id)
                                    [{!!$allergen->code!!}]
                                @endif
                            @endforeach
                        </small>
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
            <tfoot>

                    <td>
                        <a href="/meals/allergyList" style="text-align: center">Klicke hier für die liste aller Allergene</a>
                    </td>

            </tfoot>
        </table>

    </div>


@endsection
