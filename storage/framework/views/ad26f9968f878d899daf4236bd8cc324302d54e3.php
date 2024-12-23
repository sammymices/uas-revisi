    
<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">

                    <h1 class="h3 mb-3">Halaman Event</h1>
                </div>
                <div class="col-6 text-end"><a class="btn btn-dark" href="<?php echo e(route('dashboard.events.index')); ?>">Kembali</a></div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Event</h5>
                            <h6 class="card-subtitle text-muted">Halaman tambah event.</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('dashboard.events.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Nama Event</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nama Event">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Tanggal Event</label>
                                        <input type="datetime-local" name="datetime" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="description" placeholder="deskripsi..." rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Pengeluaran</label>
                                        <input type="number" class="form-control" name="cost" placeholder="Rp.2500000">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Jenis Event</label>
                                        <select name="activity_type" class="form-control" id="">
                                            <option value="internal">Internal</option>
                                            <option value="external">Eksternal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Total Anak</label>
                                        <input type="number" class="form-control" name="total_child" placeholder="0">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <textarea class="form-control" name="location" placeholder="lokasi..." rows="1"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Penyelenggara</label>
                                        <input type="text" class="form-control" name="organizer" placeholder="Penyelenggara">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Gambar</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Konten</label>
                                        <textarea rows="10" class="form-control" name="content"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-gas\resources\views/dashboard/pages/event/create.blade.php ENDPATH**/ ?>