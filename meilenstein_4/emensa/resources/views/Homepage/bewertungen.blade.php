@extends('Layout/layout')
@section('title')
    Bewertungen
@endsection
@section('content')
    <div class="box">
        @foreach($bewertungen as $bewertung)
            <div class="@php if ($bewertung->highlight) echo 'engraved'; else echo 'b-row'; @endphp ">
                <div class="b-img">
                    <img src="img/gerichte/{{$bewertung->bildname ?? '00_image_missing.jpg'}}" width="250" height="250">
                </div>
                <div class="b-cont">
                    <h3 style="display: inline;">{{$bewertung->name}}</h3>
                    @php
                        if (isset($_SESSION['admin']) && $_SESSION['admin']){
                            if ($bewertung->highlight == 1)
                                $colour = '#cccccc';
                            else
                                $colour = '#3ebfac';
                            echo "<a href='/engrave?id=".$bewertung->id."'><button style='background: ".$colour."; float: right; color: white; border: black solid 1px;'>🕭</button></a>";

                        }
                        if (isset($_SESSION['user']) && $_SESSION['user'] == $bewertung->E_Mail){
                        echo "<a href='/delete?id=".$bewertung->id."'><button style='background: #bd0000; float: right; color: white; border: black solid 1px;'>🗑</button></a>";
                        }
                    @endphp
                    <div class="b-cont-cont">
                    <p style="display: inline;"><big>{{$bewertung->E_Mail}}</big></p>
                    <div class="star">
                    <big>
                    @php
                    for($i=0; $i<5; $i++){
                    if ($i < $bewertung->sterne)
                    echo '★';
                    else
                    echo '☆';
                    }
                    @endphp</big></div>
                    <p><small>{{$bewertung->beschreibung}}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
