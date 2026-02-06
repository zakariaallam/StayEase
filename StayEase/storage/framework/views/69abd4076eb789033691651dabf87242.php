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
    <a type="button" href="<?php echo e(route('rooms.create')); ?>" class="btn btn-success">add rooms</a>
    <form method='GET' action='<?php echo e(route('rooms.index')); ?>'>
        <select name='tag'>
            <option value=''>Tous les tags</option>
            <?php $__currentLoopData = $allTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value='<?php echo e($tag->id); ?>'><?php echo e($tag->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select name='property'>
            <option value=''>Toutes les propriétés</option>
            <?php $__currentLoopData = $allProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value='<?php echo e($prop->id); ?>'><?php echo e($prop->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type='submit' class="btn btn-info">Filtrer</button>
    </form>
    
    <div class="row row-cols-1 row-cols-md-2 g-4">
    
    <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <img src="<?php echo e($dat->image); ?>?random=<?php echo e($dat->id); ?>" class="card-img-top" alt="...">
                
                
                
                <h5 class="card-title"><?php echo e($dat->number); ?></h5>
                <p class="card-text">price_per_night: <?php echo e($dat->price_per_night); ?>€/nuit</p>
                <p class="card-text">capacity: <?php echo e($dat->capacity); ?></p>
                <p class="card-text">description: <?php echo e($dat->description); ?></p>
                
                <form action="<?php echo e(route('rooms.destroy', [$dat->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
                
                <a href="<?php echo e(route('rooms.edit', [$dat->id])); ?>" class="btn btn-success">edit</a>
                
                <a href="<?php echo e(route('rooms.show', [$dat->id])); ?>" class="btn btn-primary">show</a>
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
<?php /**PATH C:\Users\Youcode\Desktop\brief differencie\stay-ease\resources\views/rooms/index.blade.php ENDPATH**/ ?>