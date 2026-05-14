<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        @vite(['resources/css/app.css'])
        @stack('styles')
        </head>

    <body>
        <h1>Accueil</h1>
        <br> </br>
        <ul>
            <li> cours de maths </li>
            <li> cours de anglais </li>
            <li> cours de Francais </li>
            <li> cours de CEJM </li>
            <li> cours de Informatique </li>
            <li> cours de Culture et expression
                <br> </br>
                <a href="{{ route('signature')}}">signer</a> </li>
        @yield('content')

    </body>
</html>
