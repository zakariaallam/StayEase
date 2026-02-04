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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="row row-cols-1 justify-content-center row-cols-md-2 g-4">


        <form action="/Chambre/add" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">numero chambre</label>
                <input type="text" name="numero" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="text" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">statut</label>
                <input type="text" name="statut" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">capacite</label>
                <input type="number" name="capacite" class="form-control">
            </div>
            <div class="mb-3">
                <label name="hotel_id" class="form-label">hotel</label>
                <select class="form-select" name="hotel_id">
                    <?php $__empty_1 = true; $__currentLoopData = $hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                         <option  value="<?php echo e($item->id); ?>"><?php echo e($item->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value="0">--nothing--</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label name="categorie_id" class="form-label">categorie</label>
                <select class="form-select" name="categorie_id">
                    <?php $__empty_1 = true; $__currentLoopData = $Categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                         <option  value="<?php echo e($item->id); ?>"><?php echo e($item->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value="0">--nothing--</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label name="tag_id" class="form-label">tag</label>
                <select class="form-select" name="tag_id">
                    <?php $__empty_1 = true; $__currentLoopData = $Tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                         <option  value="<?php echo e($item->id); ?>"><?php echo e($item->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value="0">--nothing--</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label name="propriete_id" class="form-label">propriete</label>
                <select class="form-select" name="propriete_id">
                    <?php $__empty_1 = true; $__currentLoopData = $Propriete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <option name="propriete_id" value="<?php echo e($item->id); ?>"><?php echo e($item->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value="0" >--nothing--</option>
                        
                    <?php endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/Chambre" class="btn btn-secondary">exit</a>
        </form>



    </div>






















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\Users\Youcode\Desktop\StayEase\StayEase\resources\views/Chambre/add.blade.php ENDPATH**/ ?>