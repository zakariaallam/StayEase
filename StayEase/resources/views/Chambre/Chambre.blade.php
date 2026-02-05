<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar end --}}

    <a type="button" href="{{ route('Chambre.create') }}" class="btn btn-primary">add</a>
    <div class="row row-cols-1 row-cols-md-2 g-4">

        @forelse ($data as $dat)
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <img src="{{ $dat->image }}?random={{ $dat->id }}" class="card-img-top" alt="...">
                    <h5 class="card-title">{{ $dat->numero }}</h5>
                    <p class="card-text">description: {{ $dat->description }}</p>
                    <p class="card-text">statut: {{ $dat->statut }}</p>
                    <p class="card-text">capacite: {{ $dat->capacite }}</p>
                    {{-- delete --}}
                    <form action="{{route('Chambre.destroy',[$dat->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                    {{-- edit --}}
                    <a href="{{ route('Chambre.edit', [$dat->id]) }}" class="btn btn-success">edit</a>
                    {{-- show --}}
                    <a href="{{ route('Chambre.show', [$dat->id]) }}" class="btn btn-primary">show</a>
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






















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
