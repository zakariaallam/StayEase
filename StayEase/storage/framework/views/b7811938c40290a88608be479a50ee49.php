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
    <h1>Chambre <?php echo e($room->number); ?></h1>
    <p>Prix : <?php echo e($room->price_per_night); ?> €/nuit</p>
    <p>Capacité : <?php echo e($room->capacity); ?> personnes</p>
    <h3>Tags:
        <?php $__empty_1 = true; $__currentLoopData = $room->Tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            #<?php echo e($item->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?> </h3>
    <?php $__currentLoopData = $room->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="badge"><?php echo e($tag->name); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <h3>Propriétés</h3>
    <?php $__currentLoopData = $room->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
        <span> #    <?php echo e($property->name); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <form action="<?php echo e(route('rooms.destroy', [$room->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
        <button type="submit" class="btn btn-danger">delete</button>
    </form>
    <a type="button" href="<?php echo e(route('rooms.index')); ?>" class="btn btn-primary">exet</a>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\Users\Youcode\Desktop\brief differencie\stay-ease\resources\views/rooms/show.blade.php ENDPATH**/ ?>