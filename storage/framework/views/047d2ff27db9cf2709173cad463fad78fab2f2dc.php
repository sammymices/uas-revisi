

<?php $__env->startSection('content'); ?>
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Halaman Contact Aduan</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Contact Aduan</h5>
                        <h6 class="card-subtitle text-muted">Berisi data aduan yang dikirimkan oleh user</h6>
                    </div>
                    <div class="card-body">

                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            //                                ?>
                            <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($data->name); ?></td>
                                <td><?php echo e($data->email); ?></td>
                                <td><?php echo e($data->message); ?></td>








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
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })

    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan\resources\views/dashboard/pages/feedback/index.blade.php ENDPATH**/ ?>