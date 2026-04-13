<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
    <h2>{{ $seccion['titulo'] }}</h2>

    <p>{{ $seccion['parrafos']['introduccion'] }}</p>
    <p>{{ $seccion['parrafos']['descripcion'] }}</p>
    <p>{{ $seccion['parrafos']['formacion'] }}</p>
    <p>{{ $seccion['parrafos']['perfil'] }}</p>
    <p>{{ $seccion['parrafos']['salidas_profesionales'] }}</p>
</section>
</body>
</html>