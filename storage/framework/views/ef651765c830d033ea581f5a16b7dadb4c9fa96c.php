<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <div class="hero-wrap" style="background-image: url(<?php echo e(asset('images/foto1.jpg')); ?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Live this life by sincerely sharing with others. What we give will come back to us.</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-counter ftco-intro" id="section-counter">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-1 align-items-stretch">
                        <div class="text">
                            <span>Jumlah Anak</span>
                            <strong class="number" data-number="<?php echo e($fosterChildCount); ?>"><?php echo e($fosterChildCount); ?></strong>
                            <span>Jumlah anak yang ada pada Panti Asuhan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-2 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Donasi</h3>
                            <p>Ketika kita memberikan kebahagiaan kepada orang lain, sebenarnya kita sedang membahagiakan diri sendiri.</p>
                            <?php if(Auth::check()): ?>

                            <?php else: ?>
                            <p><a href="<?php echo e(route('donation')); ?>" class="btn btn-white px-3 py-2 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Donate Sekarang</a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-3 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Donatur</h3>
                            <p>sebaik-baiknya manusia mereka yang bermanfaat bagi orang lain.</p>
                            <p><a href="#donatur" class="btn btn-white px-3 py-2 mt-2">Jadilah Donatur!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    </section>

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
                            <p>Kebersamaan tidaklah tercipta karena kita selalu meminta. Kebersamaan hadir ketika kita mau berbagi.</p>
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


    <section class="ftco-gallery">
        <div class="row justify-content-center mt-3 mb-3 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mt-2">Album Terbaru</h2>
            </div>
        </div>
        <div class="d-md-flex flex-wrap">
            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset('storage/'.$message->photo)); ?>" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url('<?php echo e(asset('storage/'.$message->photo)); ?>');">
                    <div class="icon d-flex justify-content-center align-items-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Event Terbaru</h2>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a class="block-20" style="background-image: url('<?php echo e(asset('storage/'.$message->photo)); ?>');">
                            </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    <div><a href="#">Created by Admin</a></div>
                                </div>
                                <h3 class="heading mb-4"><a href="#"><?php echo e($message->name); ?></a></h3>
                                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> <?php echo e($message->datetime); ?></span> <span><i class="icon-map-o"></i> <?php echo e($message->location); ?></span></p>
                                <p><?php echo e($message->description); ?></p>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?php echo e(route('event-donation', $message->id)); ?>" class="btn btn-primary" style="width: 100%">Donasi</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-default" style="width: 100%">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </section>

    <section class="ftco-section-3 img" style="background-image: url(<?php echo e(asset('images/bg_3.jpg')); ?>);" id="donatur">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <div class="img img-2 align-self-stretch" style="background-image: url(<?php echo e(asset('images/bg_4.jpg')); ?>);"></div>
                </div>
                <div class="col-md-6 volunteer pl-md-5 ftco-animate">
                    <h3 class="mb-3">Buat Akun Sebagai Donatur</h3>
                    <form action="<?php echo e(route('register')); ?>" method="post" class="volunter-form">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nama Anda">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Anda">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password Anda">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Buat Akun" class="btn btn-white py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda Belum Melakukan Login! Klik OK jika ingin ke halaman login
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?php echo e(route ('donation')); ?>" type="button" class="btn btn-primary">OK</a>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#alert-login').click(function() {
                // berikan waktu 1 detik, lalu arahkan ke halaman login

                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must login first!',
                    footer: '<a href="/login">Login</a>'
                })
                // }
            })
            $(document).ready(function() {
                $('.popup-youtube').magnificPopup({
                    type: 'iframe'
                });
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\Semester 4\Web Lanjut\uts\Proyek\v8\panti-asuhan\resources\views/home.blade.php ENDPATH**/ ?>