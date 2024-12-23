
<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">

                <h1 class="h3 mb-3">Halaman Event</h1>
                </div>
                <div class="col-6 text-end"><a class="btn btn-primary" href="<?php echo e(route('dashboard.events.create')); ?>">Tambah Event</a></div>
            </div>

            <div class="row">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img-top" style="height: 200px" src="<?php echo e(asset('storage/'. $event->photo)); ?>" alt="Unsplash">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><?php echo e($event->name); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <span class="badge badge-soft-danger me-2">pengeluaran: Rp.<?php echo e($event->cost); ?> </span>
                                    <span class="badge badge-soft-success me-2">pendapatan: Rp.<?php echo e($event->donations->sum('amount')); ?> </span>
                                </div>
                                <p class="card-text"><?php echo e($event->description); ?></p>
                                <a href="<?php echo e(route('dashboard.events.edit', $event->id)); ?>" class="card-link">Edit</a>
                                <a href="#" data-id="<?php echo e($event->id); ?>" class="card-link delete">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </main>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        // delete modal
        $(document).on('click', '.delete', function () {
            $('#exampleModal').modal('show')
            const id = $(this).attr('data-id');
            let url = `<?php echo e(route('dashboard.events.destroy', ':id')); ?>`.replace(':id', id);
            $('#deleteForm').attr('action', url);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Semester 4\Web Lanjut\uts\Proyek\v8\panti-asuhan\resources\views/dashboard/pages/event/index.blade.php ENDPATH**/ ?>