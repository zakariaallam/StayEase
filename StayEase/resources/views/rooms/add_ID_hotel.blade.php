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
                        <h5 class="mb-0 text-primary fw-bold">Ajouter une nouvelle chambre</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Numéro de chambre</label>
                                    <input type="number" name="number" class="form-control" placeholder="Ex: 101"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Prix par nuit (€)</label>
                                    <input type="number" name="price_per_night" class="form-control" placeholder="0.00"
                                        required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Capacité</label>
                                    <input type="number" name="capacity" class="form-control"
                                        placeholder="Nombre de personnes" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="formFile" class="form-label fw-bold">Image de la chambre</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Hôtel</label>
                                    <input class="form-control" name="hotel_id" value="{{$hotel->id}}" readonly >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Propriété (Catégorie)</label>
                                    <select class="form-select" name="Propriete">
                                        @forelse ($Property as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                            <option value="0" disabled>-- Aucune propriété --</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tag</label>
                                <select class="form-select" name="tag_id">
                                    @forelse ($Tag as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                    @empty
                                        <option value="0" disabled>-- Aucun tag --</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Décrivez la chambre..."></textarea>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('rooms.index') }}" class="btn btn-light px-4">Annuler</a>
                                <button type="submit" class="btn btn-primary px-5 shadow-sm">Enregistrer la
                                    chambre</button>
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
