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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('rooms.index') }}">🏨 Rooms Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('rooms.create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-lg"></i> Add New Room
                    </a>
                    {{-- ---------------------------------------------------- --}}
                    <a href="{{ route('createAndHotel',[1]) }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-lg"></i> test
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body bg-light">
            <form method='GET' action='{{ route('rooms.index') }}'>
                <div class="row g-3">
                    <div class="col-md-4">
                        <select name='tag' class="form-select">
                            <option value=''>Tous les tags</option>
                            @foreach ($allTags as $tag)
                                <option value='{{ $tag->id }}'>{{ $tag->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name='property' class="form-select">
                            <option value=''>Toutes les propriétés</option>
                            @foreach ($allProperties as $prop)
                                <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type='submit' class="btn btn-info w-100 text-white">Filtrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($rooms as $dat)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm transition-hover">
                    <img src="{{ asset('storage/'.$dat->image) }}" class="card-img-top" alt="Room Image" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-primary">Chambre {{ $dat->number }}</h5>
                            <span class="badge bg-light text-dark border">{{ $dat->price_per_night }} €/nuit</span>
                        </div>
                        
                        <p class="card-text text-muted small mb-2">
                            <strong>Capacité:</strong> {{ $dat->capacity }} personnes
                        </p>
                        <p class="card-text text-truncate" style="max-height: 50px;">
                            {{ $dat->description }}
                        </p>
                    </div>

                    <div class="card-footer bg-white border-top-0 pb-3">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('rooms.show', [$dat->id]) }}" class="btn btn-outline-primary btn-sm px-3">View</a>
                            
                            <a href="{{ route('rooms.edit', [$dat->id]) }}" class="btn btn-outline-success btn-sm px-3">Edit</a>
                            
                            <form action="{{ route('rooms.destroy', [$dat->id]) }}" method="POST" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info">
                    <p class="mb-0 fs-5">Aucune chambre n'est disponible pour le moment.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
    {{-- finlllllllllllllllllllllllllllllllllllllllllllllllll --}}











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
