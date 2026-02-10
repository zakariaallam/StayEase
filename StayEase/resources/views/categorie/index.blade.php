<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($chamber as $chbr)
    <img src={{$chbr->image}} width=150 >
         <p>numero : {{$chbr->numero}}</p>
         <p>description : {{$chbr->description}}</p>
         <p>statut : {{$chbr->statut}}</p>
         <p>capacite : {{$chbr->capacite}}</p>

    @endforeach    
    @endf
</body>
</html>