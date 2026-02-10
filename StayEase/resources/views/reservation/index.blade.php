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

            <div class="card shadow">
                <img src="https://via.placeholder.com/600x300" class="card-img-top" alt="Chambre">

                <div class="card-body">
                    <h3 class="card-title">Chambre Double</h3>
                    <p class="card-text">
                        Chambre confortable avec Wi-Fi, climatisation et salle de bain privée.
                    </p>

                    <p class="fs-5 fw-bold text-success">
                        Prix par nuit : <span id="price">500</span> MAD
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
                        Total : <strong><span id="total">0</span> MAD</strong>
                    </div>
                   <form action="{{ route('stripe.post') }}" method="POST">
                       @csrf
                       <button class="btn btn-primary w-100">
                           Réserver
                       </button>
                   </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
