

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <div class="hero-wrap" style="background-image: url(<?php echo e(asset('images/yayasan6.jpeg')); ?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax="properties: { translateY: '70%' }">
                    <br><br>
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Mewujudkan Penerus yang berperilaku sesuai dengan nilai-nilai islam</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Buat Donasi</h3>
                            <p>Kebersamaan tidaklah tercipta karena kita selalu meminta. Kebersamaan hadir ketika kita mau berbagi. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Menjadi Relawan</h3>
                            <p>Menjadi relawan memberi Anda kesempatan untuk terlibat langsung dalam perubahan yang lebih baik</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Sponsor</h3>
                            <p>Di sini bisa menerima Sponsorship untuk membantu panti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(auth()->check()): ?>

    <?php else: ?>
        <section class="ftco-section-3 img" style="background-image: url(<?php echo e(asset('images/yayasan5.jpg')); ?>);" id="donatur">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <div class="img img-2 align-self-stretch" style="background-image: url(<?php echo e(asset('images/yayasan3.jpg')); ?>);"></div>
                </div>
                <div class="col-md-6 volunteer pl-md-5 ftco-animate">
                    <h3 class="mb-3">Buat Akun Sebagai Donatur</h3>
                    <form action="<?php echo e(route('register')); ?>" method="post" class="volunter-form" onsubmit="return validateForm()">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Anda">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Anda">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buat Akun" class="btn btn-white py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var passwordConfirmation = document.getElementById('password_confirmation').value;

            if (name === "" || email === "" || password === "" || passwordConfirmation === "") {
                alert("Semua kolom harus diisi!");
                return false;
            }

            if (password !== passwordConfirmation) {
                alert("Password dan konfirmasi password tidak cocok!");
                return false;
            }

            return true;
        }

        $(document).ready(function() {
            $('#alert-login').click(function() {
                <?php if(!auth()->check()): ?>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You must login first!',
                        footer: '<a href="/login">Login</a>'
                    });
                <?php endif; ?>
            });

            $('.popup-youtube').magnificPopup({
                type: 'iframe'
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-final\resources\views/home.blade.php ENDPATH**/ ?>