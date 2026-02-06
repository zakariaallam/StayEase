<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <a type="button" href="{{ route('rooms.create') }}" class="btn btn-success">add rooms</a>
    <form method='GET' action='{{ route('rooms.index') }}'>
        <select name='tag'>
            <option value=''>Tous les tags</option>
            @foreach ($allTags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
            @endforeach
        </select>
        <select name='property'>
            <option value=''>Toutes les propriétés</option>
            @foreach ($allProperties as $prop)
                <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
            @endforeach
        </select>
        <button type='submit' class="btn btn-info">Filtrer</button>
    </form>
    {{-- lllllllllllllllllllllllllllllllllllllllllllllllllllll --}}
    <div class="row row-cols-1 row-cols-md-2 g-4">
    
    @forelse ($rooms as $dat)
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <img src="{{ $dat->image }}?random={{ $dat->id }}" class="card-img-top" alt="...">
                
                
                
                <h5 class="card-title">{{ $dat->number }}</h5>
                <p class="card-text">price_per_night: {{ $dat->price_per_night }}€/nuit</p>
                <p class="card-text">capacity: {{ $dat->capacity }}</p>
                <p class="card-text">description: {{ $dat->description}}</p>
                {{-- delete --}}
                <form action="{{ route('rooms.destroy', [$dat->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
                {{-- edit --}}
                <a href="{{ route('rooms.edit', [$dat->id]) }}" class="btn btn-success">edit</a>
                {{-- show --}}
                <a href="{{ route('rooms.show', [$dat->id]) }}" class="btn btn-primary">show</a>
            </div>
        </div>
    @empty
        <div class="col-12 text-center mt-5">
            <div class="alert alert-info">
                <p class="mb-0">Aucune chambre n'est disponible pour le moment.</p>
            </div>
        </div>
    @endforelse
</div>
{{-- finlllllllllllllllllllllllllllllllllllllllllllllllll --}}











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
