

<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Form Tambah Gallery</h5>
                            <h6 class="card-subtitle text-muted">Anda dapat menambah gallery di form ini </h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('dashboard.child.update', $child->id)); ?>" method="post"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="id" value="<?php echo e($child->id); ?>">
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name" value="<?php echo e($child->name); ?>"
                                            class="form-control" placeholder="Nama">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Birth Date</label>
                                        <input class="form-control" type="date" value="<?php echo e($child->birthdate); ?>"
                                            name="birthdate" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="photo">Foto</label>
                                    <br>
                                    <img src="<?php echo e(asset('storage/' . $child->photo)); ?>" name="photo"
                                        style="max-width: 200px" alt="Current Photo">
                                    <br>
                                    <br>
                                    <input type="hidden" name="photo" value="<?php echo e($child->photo); ?>">
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                    <small>Format yang diterima: jpeg, png, jpg, gif. Ukuran maksimum file: 2MB</small>
                                </div>

                                <div class="col-12 col-xl-4 mt-3">
                                    <label class="form-label">Pilih Jenis Kelamin Anda</label>
                                    <div class="form-inline">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadio1"
                                                value="Laki-laki" <?php echo e($child->gender == 'laki-laki' ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="exampleRadio1">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadio2"
                                                value="Perempuan" <?php echo e($child->gender == 'perempuan' ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="exampleRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3"></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan\resources\views/dashboard/pages/child/edit-child.blade.php ENDPATH**/ ?>