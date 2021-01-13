@extends('Layout/layout')
@section('title')
    News
@endsection
@section('content')
    <div class="s-box" id="neuigkeiten">
        <h2 class="headline-bold">Bald gibt es Essen auch online ;)</h2>
        <p id="fliesstext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>

    <div class="row">
    @foreach($meals as $meal)
        <div class="col" style="max-width: 200px;">
            <img width="200" height="200" src="img/gerichte/{{$meal->bildname ?? '00_image_missing.jpg'}}">
            <p style="text-align: center;">{{$meal->name}}@php
                    if (isset($_SESSION['user'])) echo "<br><a style='text-align: center;' href='bewertung?id=".$meal->id."'>bewerten</a>";
                @endphp</p>
        </div>
    @endforeach
    </div>
    </div>
    <div class="box">
        <h2>Meinungen unserer Gäste</h2>
        @foreach($bewertungen as $bewertung)
            <div class="engraved">
                <div class="b-img">
                    <img src="img/gerichte/{{$bewertung->bildname ?? '00_image_missing.jpg'}}" width="250" height="250">
                </div>
                <div class="b-cont">
                    <h3 style="display: inline;">{{$bewertung->name}}</h3>
                    @php
                        if (isset($_SESSION['admin']) && $_SESSION['admin']){
                            echo "<a href='/engrave?id=".$bewertung->id."'><button style='background: #cccccc; float: right; color: white; border: black solid 1px;'>🕭</button></a>";

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
