@extends('Layout/layout')
@section('title')
    Registrierung
@endsection
@section('content')
    <div class='anmeldung' style="text-align: center">
        <h2 class="headline-bold">Registrierung</h2>
        <a href="/login">Anmeldung</a>
        <br><br>
        <form method="post" action="/signup">
            @csrf
            <input <?php if (isset($_GET['fail'])) echo'style="background: #ff3333"' ?> type="email" name="e-mail" placeholder="person@example.web">
            <br>
            <input <?php if (isset($_GET['fail'])) echo'style="background: #ff3333"' ?> type="password" name="password" placeholder="············">
            <br>
            <input type="submit" value="Registrieren">
        </form>
    </div>
@endsection
