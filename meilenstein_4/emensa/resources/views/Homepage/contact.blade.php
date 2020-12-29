@extends('Layout/layout')
@section('title')
    Contact Form
@endsection
@section('content')
    <div class="newsletter" id="newsletter">
        <h2 class="headline-bold">Interesse geweckt? Wir informieren Sie!</h2>
        <form method="post">
            <div class=row>
                <div class=col>
                    <p class="newsletter-vorname">
                        <label for="name">Ihr Name:</label><br>
                        <input type="text"  id="name" name="name" placeholder="Name" value="">
                        <span class="error"> </span>
                    </p>
                </div>
                <div class=col>
                    <p class="newsletter-email">
                        <label for="email">Ihre E-Mail:</label><br>
                        <input type="text" id="email" name="email" placeholder="E-Mail" value="">
                        <span class="error"> </span>
                    </p>
                </div>
                <div class=col>
                    <p class="newsletter-language">
                        <label for="language">Newsletter bitte in:</label><br>
                        <select id="language" name="language">
                            <option value="de">Deutsch</option>
                            <option value="en">Englisch</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class=row>
                <div class=col>
                    <p class="datenschutz">
                        <input type="checkbox" id="datenschutz" name="datenschutz">
                        <label for="datenschutz">Den Datenschutzbestimmungen stimme ich zu</label>
                    </p>
                    <span class="error"></span>
                </div>
                <div class=col>
                    <p class="submit">
                        <input type="submit" value="Zum Newsletter anmelden">
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection
