

<?php $__env->startSection('content'); ?>
    <div class="hero-wrap" style="background-image: url(<?php echo e(asset('images/yayasan13.jpeg')); ?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>Donasi</span></p>
                        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Halaman Donasi</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Terimakasih !</h2>
                    <p>Memberikan kebahagiaan untuk orang lain sejatinya juga membahagiakan diri-sendiri. Mari, bantu anak-anak yatim di panti asuhan agar senyum tergelincir di bibir mereka.</p>
                </div>
            </div>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <form action="<?php echo e(route('donasi.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_donasi">Jumlah Donasi</label>
                            <input type="number" id="jumlah_donasi" name="jumlah_donasi" class="form-control" required>
                            <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="pesan">Pesan (Opsional)</label>
                            <textarea id="pesan" name="pesan" class="form-control"></textarea>
                            <?php $__errorArgs = ['pesan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                            <?php $__errorArgs = ['bukti_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Donasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<?php echo e(config('app.midtrans_client_key')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#donate-form').submit(function(e) {
                e.preventDefault()

                var fd = new FormData(document.getElementById('donate-form'))

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    url: '<?php echo e(url('donate-action')); ?>',
                    data: fd,
                    enctype: 'multipart/form-data',
                    dataType: 'JSON',
                    success : function (res) {
                        console.log(res)
                        window.snap.pay(res.token, {
                            onSuccess: function(result){
                                /* You may add your own implementation here */
                                Swal.fire(
                                    'Berhasil',
                                    'Terimakasih atas kebaikan anda !',
                                    'success'
                                )
                            },
                            onPending: function(result){
                                /* You may add your own implementation here */
                                // alert("wating your payment!"); console.log(result);
                                Swal.fire(
                                    'Menunggu',
                                    'Silahkan melakukan pembayaran !',
                                    'info'
                                )
                            },
                            onError: function(result){
                                /* You may add your own implementation here */
                                // alert("payment failed!"); console.log(result);
                                Swal.fire(
                                    'Error',
                                    'Maaf, terjadi kesalahan !',
                                    'error'
                                )
                            },
                            onClose: function(){
                                /* You may add your own implementation here */
                                // alert('you closed the popup without finishing the payment');
                            }
                        });

                        $('input[name="jumlah"]').val("")
                        $('textarea[name="pesan"]').val("")
                    }
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-gas\resources\views/donasi.blade.php ENDPATH**/ ?>