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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>

            </div>
        </div>
        <a type="button" href="{{ route('rooms.create') }}" class="btn btn-success">add</a>
    </nav>
    {{-- ------------------------------------------------------ --}}
    <form action="{{ route('rooms.update',$room) }}" method="POST" enctype="multipart/form-data">>
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">numero chambre</label>
            <input type="number" name="number" value="{{ $room->number }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">price_per_night</label>
            <input type="number" name="price_per_night" value="{{ $room->price_per_night }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">capacity</label>
            <input type="number" name="capacity" value="{{ $room->capacity }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <input type="text" name="description" value="{{ $room->description }}" class="form-control">
        </div>
        <div class="mb-3">
            <label name="hotel_id" class="form-label">hotel</label>
            <select class="form-select" name="hotel_id">
                @forelse ($hotel as $item)
                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                @empty
                    <option value="0">--nothing--</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label name="categorie_id" class="form-label">Property</label>
            <select class="form-select" name="categorie_id">
                @forelse ($Property as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="0">--nothing--</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">image</label>
            <input class="form-control" value="{{ $room->image }}" type="file" name="image" id="formFile">
        </div>
        <div class="mb-3">
            <label name="tag_id" class="form-label">tag</label>
            <select class="form-select" name="tag_id">
                @forelse ($Tag as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="0">--nothing--</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">exit</a>
    </form>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
