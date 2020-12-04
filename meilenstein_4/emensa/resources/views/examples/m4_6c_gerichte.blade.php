<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerichte</title>
</head>
<body>

        @if(empty($gerichte))
            <h3>Es sind keine Gerichte vorhanden</h3>
        @else
            <table>
                <thead>
                <td>Name</td><td>Preis</td>
                </thead>
                <tbody>
            @foreach($gerichte as $gericht)
                <tr><td>{{$gericht->name}}</td><td>{{$gericht->preis_intern}}</td></tr>
            @endforeach
                </tbody>
            </table>
        @endif

</body>
</html>
