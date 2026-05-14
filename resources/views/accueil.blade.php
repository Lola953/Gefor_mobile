<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <ul>
            @foreach ($cours as $c)
                <li>
                    Cours de {{ $c['matiere'] }} -
                    le {{ Carbon\Carbon::parse($c['heure_debut'])->format ('H\hi') }}
                    <a href ="{{route ('signature',$c['id'])}}">Signer</a>



                </li>
            @endforeach
        </ul>

    <h1>Bienvenue sur GEFOR</h1>
    <p>Gestion des émargements et des formations</p>



</body>
</html>
