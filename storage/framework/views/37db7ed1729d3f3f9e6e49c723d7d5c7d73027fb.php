

<?php $__env->startSection('content'); ?>
    <div class="hero-wrap" style="background-image: url(<?php echo e(asset('images/yayasan11.jpeg')); ?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span class="mr-2"><a href="blog.html">Event</a></span> <span>Detail Event</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Detail Program</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    <h2 class="mb-3"><?php echo e($event->name); ?></h2>
                    <div class="mb-5">
                        <span class="badge badge-danger me-2">pengeluaran: Rp.<?php echo e($event->cost); ?> </span>
                        <!-- <span class="badge badge-success me-2">pendapatan: Rp.<?php echo e($event->donations->sum('amount')); ?> </span> -->
                        <span><span class="icon-calendar"></span> <?php echo e($event->datetime); ?></span>
                    </div>
                    <p><?php echo e($event->content); ?></p>

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3>Event Lainnya</h3>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(<?php echo e(asset('storage/' . $e->photo)); ?>);"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="<?php echo e(route('event-detail', $e->id)); ?>"><?php echo e($e->name); ?></a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> <?php echo e($e->datetime); ?></a></div>
                                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- <div class="sidebar-box ftco-animate">
                        <a href="<?php echo e(route('event-donation', $event->id)); ?>" class="btn btn-primary" style="width: 100%">Donasi</a>
                    </div> -->
                </div>

            </div>
        </div>
    </section> <!-- .section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-gas\resources\views/event-detail.blade.php ENDPATH**/ ?>