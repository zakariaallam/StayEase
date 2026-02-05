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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Navbar end --}}

       <div class="row row-cols-1 justify-content-center row-cols-md-2 g-4">


        <form action="{{ route('Chambre.update', [$Chambre->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">numero chambre</label>
                <input type="text" name="numero" value="{{$Chambre->numero}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="description" value="{{$Chambre->description}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="text" name="image" value="{{$Chambre->image}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">statut</label>
                <input type="text" name="statut" value="{{$Chambre->statut}}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">capacite</label>
                <input type="number" name="capacite" value="{{$Chambre->capacite}}" class="form-control">
            </div>
            <div class="mb-3">
                <label name="hotel_id" class="form-label">hotel</label>
                <select class="form-select" name="hotel_id">
                    @forelse ($hotel as $item)
                         <option  value="{{ $item->id }}">{{ $item->nom }}</option>
                    @empty
                        <option value="0">--nothing--</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label name="categorie_id" class="form-label">categorie</label>
                <select class="form-select" name="categorie_id">
                    @forelse ($Categorie as $item)
                         <option  value="{{ $item->id }}">{{ $item->nom }}</option>
                    @empty
                        <option value="0">--nothing--</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label name="tag_id" class="form-label">tag</label>
                <select class="form-select" name="tag_id">
                    @forelse ($Tag as $item)
                         <option  value="{{ $item->id }}">{{ $item->nom }}</option>
                    @empty
                        <option value="0">--nothing--</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label name="propriete_id" class="form-label">propriete</label>
                <select class="form-select" name="propriete_id">
                    @forelse ($Propriete as $item)
                        <option name="propriete_id" value="{{ $item->id }}">{{ $item->nom }}</option>
                    @empty
                        <option value="0" >--nothing--</option>
                    @endforelse
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('Chambre.index')}}" class="btn btn-secondary">exit</a>
        </form>
    </div>


























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
