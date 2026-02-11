<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails de la chambre</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- table->foreignId('hotel_id')->constrained('hotels')->onDelete('cascade');
            $table->string('number');
            $table->decimal('price_per_night', 8, 2);
            $table->integer('capacity');
            $table->text('description')->nullable();
            $table->text('image');
            $table->timestamps(); --}}
                @if ($room)
                    <div class="card shadow">
                        <img src= "{{ $room->image }}" class="card-img-top" alt="Room">

                        <div class="card-body">
                            <h3 class="card-title">{{ $room->number }}</h3>
                            <p class="card-text">
                                {{ $room->description }}
                            </p>

                            <p class="fs-5 fw-bold text-success">
                                Prix par nuit : <span id="price">{{ $room->price_per_night }}</span> MAD
                            </p>

                            <div class="mb-3">
                                <label class="form-label">Date d’arrivée</label>
                                <input type="date" id="start" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date de départ</label>
                                <input type="date" id="end" class="form-control" readonly>
                            </div>

                            <div class="alert alert-info">
                                Total : <strong><span id="total">{{ $total }}</span> MAD</strong>
                            </div>
                            <form action="{{ route('stripe.post') }}" method="POST">
                                @csrf
                                <button class="btn btn-primary w-100">
                                    Réserver
                                </button>
                            </form>
                @endif
            </div>
        </div>


    </div>
    </div>
    </div>

</body>

</html>
