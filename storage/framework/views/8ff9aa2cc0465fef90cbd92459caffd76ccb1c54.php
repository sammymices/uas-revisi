

<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Halaman Donasi</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Tambah Data
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo e(Route('dashboard.donation.barang.store')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo method_field('POST'); ?>
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label class="form-label" for="inputEmail4">Nama</label>
                                                    <input type="name" class="form-control" value="<?php echo e(old('name')); ?>" name="name" id="inputEmail4" placeholder="Nama Barang">
                                                </div>
                                                    <div class="mb-3 col-6">
                                                        <label class="form-label" for="inputAddress2">Jumlah</label>
                                                        <input type="number" class="form-control" value="<?php echo e(old('amount')); ?>" name="amount" id="inputAddress2" placeholder="Jumlah Barang">
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label" for="inputAddress2">Deskripsi</label>
                                                        <textarea name="description" id="" value="<?php echo e(old('description')); ?>" class="form-control" cols="20" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">Foto</label>
                                                        <input type="file" name="photo">
                                                        <small class="form-text text-muted">Inputkan foto barang</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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

<?php $__env->startSection('script'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-gas\resources\views/dashboard/pages/donation/create.blade.php ENDPATH**/ ?>