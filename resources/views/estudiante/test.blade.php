<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @foreach ($categoriaEscala as $categoria)
        <h4>{{$categoria['nombre']}}</h4>
    @foreach ($categoria['preguntas'] as $pregunta)
      <label for="pregunta">{{$pregunta['texto']}}</label> <br>
      <input type="radio" name="{{$pregunta['especialidad']}}" id=""> 1 <br>
      <input type="radio" name="{{$pregunta['especialidad']}}" id=""> 2 <br>
      <input type="radio" name="{{$pregunta['especialidad']}}" id=""> 3 <br>
      <input type="radio" name="{{$pregunta['especialidad']}}" id=""> 4 <br>
      <input type="radio" name="{{$pregunta['especialidad']}}" id=""> 5 <br>
    @endforeach
    @endforeach

        <h4>{{$categoriaFinal['nombre']}}</h4>
    @foreach ($categoriaFinal['preguntas'] as $pregunta)

     <label for="pregunta">{{$pregunta['texto']}}</label> <br>
   
    @endforeach

</body>
</html>