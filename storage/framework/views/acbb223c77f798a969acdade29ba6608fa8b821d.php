

<?php $__env->startSection('content'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Halaman Donasi</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">List Donasi</h5>
                                    <h6 class="card-subtitle text-muted">List donasi yang telah diterima di panti asuhan.</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a target="_blank" href="<?php echo e(route('dashboard.printMoneyDonation')); ?>" class="btn btn-danger">Cetak PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Bukti Transfer</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($donation->user->name); ?></td>
                                        <td>
                                            <img width="75" height="75"
                                            src="<?php echo e(asset('storage/' . $donation->photo)); ?>" alt="">
                                        </td>                                        <td><?php echo e($donation->description); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($donation->date)->format('d M Y')); ?></td>
                                        <td>Rp.<?php echo e(number_format($donation->amount)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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

<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-gas\resources\views/dashboard/pages/donation/uang.blade.php ENDPATH**/ ?>