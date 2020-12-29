@extends('Layout/layout')
@section('title')
    Anmeldung
@endsection
@section('content')
    <div class='anmeldung' style="text-align: center">
        <h2 class="headline-bold">Anmeldung</h2>
        <form method="post" action="/verify">
            @csrf
            <input <?php if (isset($_GET['fail'])) echo'style="background: #ff3333"' ?> type="email" name="e-mail" placeholder="person@example.web">
            <br>
            <input <?php if (isset($_GET['fail'])) echo'style="background: #ff3333"' ?> type="password" name="password" placeholder="············">
            <br>
            <input type="submit" value="Anmeldung">
        </form>
    </div>
@endsection
