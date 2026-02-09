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
    <div class="card-group">
        <div class="card">

            <form method='GET' action='{{ route('rooms.index') }}'>

                <div class="row">
                    <div class="col">
                        <select name='tag' class="form-control">
                            <option value=''>Tous les tags</option>
                            @foreach ($allTags as $tag)
                                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name='property' class="form-control">
                            <option value=''>Toutes les propriétés</option>
                            @foreach ($allProperties as $prop)
                                <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type='submit' class="btn btn-info form-control">Filtrer</button>
                    </div>
                </div>
            </form>
            <div class="mb-3"></div>

            {{-- lllllllllllllllllllllllllllllllllllllllllllllllllllll --}}
            <div class="row row-cols-1 row-cols-md-2 g-4">

                @forelse ($rooms as $dat)
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            
                            <img src="{{ asset('storage/'.$dat->image)  }}" class="card-img-top"
                                alt="https://picsum.photos/400/300">
                            <h5 class="card-title">{{ $dat->number }}</h5>
                            <p class="card-text">price_per_night: {{ $dat->price_per_night }}€/nuit</p>
                            <p class="card-text">capacity: {{ $dat->capacity }}</p>
                            <p class="card-text">description: {{ $dat->description }}</p>
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
        </div>
    </div>
    {{-- finlllllllllllllllllllllllllllllllllllllllllllllllll --}}











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
