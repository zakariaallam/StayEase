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
    

    <a type="button" href="/Chambre/add" class="btn btn-primary">add</a>
    <div class="row row-cols-1 row-cols-md-2 g-4">

        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <img src="<?php echo e($dat->image); ?>?random=<?php echo e($dat->id); ?>" class="card-img-top" alt="...">
                    <h5 class="card-title"><?php echo e($dat->numero); ?></h5>
                    <p class="card-text">description: <?php echo e($dat->description); ?></p>
                    <p class="card-text">statut: <?php echo e($dat->statut); ?></p>
                    <p class="card-text">capacite: <?php echo e($dat->capacite); ?></p>
                    <form action="/Chambre/delete/<?php echo e($dat->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button href="" type="submit" class="btn btn-danger">delete</button>
                    </form>
                    <a href="/Chambre/edit/<?php echo e($dat->id); ?>" class="btn btn-success">edit</a>
                    <a href="/Chambre/show/<?php echo e($dat->id); ?>" class="btn btn-primary">show</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center mt-5">
                <div class="alert alert-info">
                    <p class="mb-0">Aucune chambre n'est disponible pour le moment.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>






















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\Users\Youcode\Desktop\StayEase\StayEase\resources\views/Chambre/Chambre.blade.php ENDPATH**/ ?>