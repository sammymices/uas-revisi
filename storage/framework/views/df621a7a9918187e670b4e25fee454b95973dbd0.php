

<?php $__env->startSection('content'); ?>
    <div class="hero-wrap" style="background-image: url(<?php echo e(asset('images/yayasan11.jpg')); ?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Program</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Program</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a class="block-20" style="background-image: url('<?php echo e(asset('storage/'.$message->photo)); ?>');">
                        </a>
                        <div class="text p-4 d-block">
                            <div class="meta mb-3">
                                <div><a href="#">Created by Admin</a></div>
                            </div>
                            <h3 class="heading mb-4"><a href="#"><?php echo e($message->name); ?></a></h3>
                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> <?php echo e($message->datetime); ?></span> <span><i class="icon-map-o"></i> <?php echo e($message->location); ?></span></p>
                            <p><?php echo e($message->description); ?></p>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('event-donation', $message->id)); ?>" class="btn btn-primary" style="width: 100%">Donasi</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo e(route('event-detail', $message->id)); ?>" class="btn btn-default" style="width: 100%">Detail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <?php echo e($events->links()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan\resources\views/event.blade.php ENDPATH**/ ?>