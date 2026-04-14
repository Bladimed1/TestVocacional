<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>{{ $seccion['descripcion'] }}</p>

@foreach ($seccion['habilidades'] as $habilidad)
    <li>{{ $habilidad }}</li>
@endforeach

@foreach ($seccion['campo_laboral'] as $campo)
    <li>{{ $campo }}</li>
@endforeach

@foreach ($seccion['tecnologias'] as $tecnologia)
    <li>{{ $tecnologia }}</li>
@endforeach
</body>
</html>