

<?php $__env->startSection('content'); ?>
    <div class="hero-wrap" style="background-image: url(<?php echo e(asset('images/yayasan9.jpeg')); ?>);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="/">Beranda</a></span> <span>About Us</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tentang Kami</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <div class="img img-about align-self-stretch" style="background-image: url(<?php echo e(asset('images/yayasan7.jpeg')); ?>); width: 100%;"></div>
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <h2 class="mb-4">Yayasan Panti Asuhan Al-Mubarok</h2>
                    <p>Yayasan Panti Asuhan Al-Mubarok pada awalnya adalah merupakan sebuah Majlis Ta’lim Al-Mubarok. Kegiatan Majlis Ta’lim ini tidak hanya memberikan pendidikan dan pengajaran membaca dan menulis Alqur’an saja, namun juga pendidikan lainnya, seperti latihan pidato, kaligrafi, cerdas cermat, dll. Salah satu kegiatan lain yang menonjol adalah santunan sosial bagi anak yatim, yatim piatu dan kaum dhuafa.</p>
                    <p>Dari tahun ke tahun dalam perkembangannya banyak membawa perubahan dan kegiatannya semakin banyak dirasakan manfaatnya oleh masyarakat terutama masyarakat di sekitarnya. dan anak asuh kami sudah menghapal al qur'an 30 juz</p>
                    <p>Visi Yayasan Al-Mubarok adalah menjadi lembaga pendidikan yang mampu membentuk generasi bangsa yang berilmu pengetahuan dan berakhlak mulia. Dengan di dukung Misi yaitu, menanamkan keimanan dan ketakwaan kepada Allah SWT, membentuk anak didik dengan perilaku dan akhlak yang mulia, serta mengembangkan potensi anak didik dalam bentuk kecerdasan emosional, kecerdasan intelektual, dan kecerdasan spiritual.</p>

                </div>
            </div>
        </div>
    </section>

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
                                <p><a href="<?php echo e(route('donation')); ?>" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
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
    <br><br>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\LENOVO\Downloads\panti-asuhan (1)\panti-asuhan\resources\views/about.blade.php ENDPATH**/ ?>