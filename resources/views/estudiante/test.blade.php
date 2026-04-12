<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{route ('estudiante.resultados')}}" method="post" required>
    @csrf

    @foreach ($categoriaEscala as $categoria)
        <h4>{{$categoria['nombre']}}</h4>
        @foreach ($categoria['preguntas'] as $pregunta)
            <label>{{$pregunta['texto']}}</label> <br>
            <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="1"> 1 <br>
            <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="2"> 2 <br>
            <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="3"> 3 <br>
            <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="4"> 4 <br>
            <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="5"> 5 <br>
        @endforeach
    @endforeach

    <h4>{{$categoriaFinal['nombre']}}</h4>
    @foreach ($categoriaFinal['preguntas'] as $pregunta)
        <label>{{$pregunta['texto']}}</label> <br>
        <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="20"> si <br>
        <input type="radio" name="respuestas[{{$pregunta['especialidad']}}][{{$pregunta['id']}}]" value="0"> no <br>
    @endforeach

    <input type="submit" value="Enviar">
</form>

</body>
</html>