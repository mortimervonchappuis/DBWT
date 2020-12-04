<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kategorie</title>

    <style>
        tbody>tr:nth-child(even){
            font-weight: bold;
        }
    </style>
</head>
<body>


    <table>
        <thead>
        <td>Name</td>
        </thead>
        <tbody>
        @foreach($names as $name)
            <tr><td>{{$name->name ?? 'No name'}}</td></tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>

