@extends('Layout/layout')
@section('title')
    Bewertung
@endsection
@section('content')
    <div class='anmeldung' style="text-align: center">
        <h2 class="headline-bold">{{$gericht->name}}</h2>
        <img width="200" height="200" src="img/gerichte/{{$gericht->bildname ?? '00_image_missing.jpg'}}">
        <form method="post" action="/bewerten">
            @csrf
            <label for="beschreibung">Beschreibung</label>
            <br>
            <textarea minlength="5" name="beschreibung"></textarea>
            <br>
            <div class="stars">
            <input name="rating" class="star" type="radio" id="st1" value="5" />
            <label class="star" for="st1"></label>
            <input name="rating" class="star" type="radio" id="st2" value="4" />
            <label class="star" for="st2"></label>
            <input name="rating" class="star" type="radio" id="st3" value="3" />
            <label class="star" for="st3"></label>
            <input name="rating" class="star" type="radio" id="st4" value="2" />
            <label class="star" for="st4"></label>
            <input name="rating" class="star" type="radio" id="st5" value="1" checked="checked"/>
            <label class="star" for="st5"></label>
            <br>
            </div>
            <input type="hidden" name="gericht_id" value="{{$id}}">
            <br>
            <input type="submit" value="Bewerten">
        </form>
    </div>
@endsection