

<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Selamat Datang, <?php echo e(auth()->user()->name); ?></h1>


            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3">$ <?php echo e($don_uang); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Donasi</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3"><?php echo e($don_barang); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Donasi Barang</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle me-2" data-feather="box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3"><?php echo e($event); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Event</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle" data-feather="calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3"><?php echo e($gallery); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Gallery</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle" data-feather="file"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3"><?php echo e($data_anak); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Data Anak</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle me-2 fas ms-1 fa-xl fa-child" style="color: #0d6efd"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3"><?php echo e($data_feedback); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Data Feedback</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="message-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h3 class="mb-2 mt-3"><?php echo e($data_donatur); ?></h3>
                                    <p class="mb-2 mt-3 fs-4">Total Donatur</p>
                                </div>
                                <div class="d-inline-block ms-3">
                                    <div class="stat">
                                        <i class="align-middle text-success" data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan\resources\views/dashboard/pages/index.blade.php ENDPATH**/ ?>