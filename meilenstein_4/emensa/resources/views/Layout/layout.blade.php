<?php/**
 * Praktikum DBWT. Autoren:
 * Dominik, Bien, 3149135
 * Botho Karl Mortimer, von Chappuis, 3146023
 * Date: 11/18/20
 * Time: 3:17 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('mockup.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Schoolbell&v1" rel="stylesheet">
</head>
<!--Top-->
<body>
@include('Layout.nav')

@yield('content')

@include('Layout.footer')
</body>
</html>
