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
{{-- ------------------------------------------------------ --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('rooms.index') }}">rooms</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <a type="button" href="{{ route('rooms.create') }}" class="btn btn-success">add</a>
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    {{-- ------------------------------------------------------ --}}

<body>
    <div class="card text-center">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <img src="{{ asset('storage/'.$room->image)  }}" class="card-img-top" alt="...">
            <h1>Chambre {{ $room->number }}</h1>
            <p>Prix : {{ $room->price_per_night }} €/nuit</p>
            <p>Capacité : {{ $room->capacity }} personnes</p>
            <h3>Tags:
                @forelse ($room->Tags as $item)
                    #{{ $item->name }}
                @empty
                @endforelse
            </h3>
            @foreach ($room->tags as $tag)
                <span class="badge">{{ $tag->name }}</span>
            @endforeach
            <h3>Propriétés</h3>
            @foreach ($room->properties as $property)
                <span> # {{ $property->name }}</span>
            @endforeach
            <form action="{{ route('rooms.destroy', [$room->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
            <a type="button" href="{{ route('rooms.index') }}" class="btn btn-primary">exet</a>
        </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
