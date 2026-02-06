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
    <form action="<?php echo e(route('rooms.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">numero chambre</label>
            <input type="number" name="number" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">price_per_night</label>
            <input type="number" name="price_per_night" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">capacity</label>
            <input type="number" name="capacity" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="mb-3">
            <label name="hotel_id" class="form-label">hotel</label>
            <select class="form-select" name="hotel_id">
                <?php $__empty_1 = true; $__currentLoopData = $hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <option value="0">--nothing--</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label name="categorie_id" class="form-label">Property</label>
            <select class="form-select" name="categorie_id">
                <?php $__empty_1 = true; $__currentLoopData = $Property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <option value="0">--nothing--</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">image</label>
            <input class="form-control" type="text" name="image" id="formFile">
        </div>
        <div class="mb-3">
            <label name="tag_id" class="form-label">tag</label>
            <select class="form-select" name="tag_id">
                <?php $__empty_1 = true; $__currentLoopData = $Tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <option value="0">--nothing--</option>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo e(route('rooms.index')); ?>" class="btn btn-secondary">exit</a>
    </form>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\Users\Youcode\Desktop\brief differencie\stay-ease\resources\views/rooms/add.blade.php ENDPATH**/ ?>