<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($resultados as $especialidad => $resultado)
    <h1>{{$especialidad}}</h1> <br>
    <h1>{{$resultado}}</h1>
    @endforeach
</body>
</html>