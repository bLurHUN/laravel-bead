

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Főoldal</title>
</head>
<body>
    <p>Ez egy egy játkos, körökre osztott harcolós játék. Lentebb láthatók az alábbi statisztikák.</p>
    <p>Karakterek száma: {{ \App\Models\Character::all()->count() }}</p>
    <p>Mérkőzések száma: {{ \App\Models\Contest::all()->count() }}</p>
</body>
</html>
