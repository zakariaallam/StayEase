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
    </div>
</nav>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-success fw-bold">Modifier la chambre: {{ $room->number }}</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Numéro de chambre</label>
                                <input type="number" name="number" value="{{ $room->number }}" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Prix par nuit (€)</label>
                                <input type="number" name="price_per_night" value="{{ $room->price_per_night }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Capacité</label>
                                <input type="number" name="capacity" value="{{ $room->capacity }}" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="formFile" class="form-label fw-bold">Changer l'image (Optionnel)</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                                <small class="text-muted">Laissez vide لتجنب تغيير الصورة الحالية.</small>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <p class="small fw-bold mb-1">Image actuelle :</p>
                            <img src="{{ asset('storage/'.$room->image) }}" class="img-thumbnail" style="height: 100px;">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Hôtel</label>
                                <select class="form-select" name="hotel_id">
                                    @foreach ($hotel as $item)
                                        <option value="{{ $item->id }}" {{ $room->hotel_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Propriété (Catégorie)</label>
                                <select class="form-select" name="categorie_id">
                                    @foreach ($Property as $item)
                                        <option value="{{ $item->id }}" {{ $room->categorie_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tag</label>
                            <select class="form-select" name="tag_id">
                                @foreach ($Tag as $item)
                                    <option value="{{ $item->id }}" {{ $room->tag_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $room->description }}</textarea>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('rooms.index') }}" class="btn btn-light px-4">Annuler</a>
                            <button type="submit" class="btn btn-success px-5 shadow-sm">Mettre à jour</button>
                        </div>
                    </form>
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
