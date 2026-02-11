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
   <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('storage/' . $room->image) }}" class="card-img-top" alt="Room Image" style="height: 250px; object-fit: cover;">
                
                <div class="card-body">
                    <h2 class="card-title h4">Chambre {{ $room->number }}</h2>
                    <hr>
                    
                    <p class="card-text mb-1"><strong>Prix :</strong> <span class="text-success fw-bold">{{ $room->price_per_night }} €/nuit</span></p>
                    <p class="card-text"><strong>Capacité :</strong> {{ $room->capacity }} personnes</p>
                    
                    <div class="mb-3">
                        <h6 class="text-muted">Tags:</h6>
                        @forelse ($room->tags as $tag)
                            <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                        @empty
                            <small class="text-muted">No tags available</small>
                        @endforelse
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Propriétés:</h6>
                        @foreach ($room->properties as $property)
                            <small class="text-secondary fw-bold">#{{ $property->name }} </small>
                        @endforeach
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>
                        
                        <a href="{{ route('rooms.index') }}" class="btn btn-primary btn-sm px-4">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
