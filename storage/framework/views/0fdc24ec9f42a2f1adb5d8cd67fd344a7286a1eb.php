

<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Form Tambah Anak Panti</h5>
                            <h6 class="card-subtitle text-muted">Anda dapat menambah Daftar Anak Panti di form ini</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('dashboard.child.store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                
                                <input type="hidden" name="id"
                                    value="<?php echo e(intval(DB::table('galleries')->max('id')) + 1); ?>">
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nama">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Date</label>
                                        <input class="form-control" type="date" name="birthdate" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label w-100">Upload Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                    <small class="form-text text-muted">Example block-level help text here.</small>
                                </div>
                                <div class="col-12 col-xl-4 mt-3">
                                    <label class="form-label">Pilih Jenis Kelamin Anda</label>
                                    <div class="form-inline">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadio1"
                                                value="Laki-Laki">
                                            <label class="form-check-label" for="exampleRadio1">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadio2"
                                                value="Perempuan">
                                            <label class="form-check-label" for="exampleRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>





                                <div class="mt-3"></div>
                                <button type="submit" class="btn btn-primary rounded-5">Submit</button>
                                <a class="btn btn-warning rounded-5" href="<?php echo e(route('dashboard.child.index')); ?>">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan\resources\views/dashboard/pages/child/form-child.blade.php ENDPATH**/ ?>