<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Panti Mawaddah Warohmah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"><a href="/"
                        class="nav-link">Beranda</a></li>
                <li class="nav-item <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>"><a href="/about"
                        class="nav-link">Tentang</a></li>
                <?php if(auth()->check()): ?>
                    <li class="nav-item <?php echo e(request()->routeIs('donateform') ? 'active' : ''); ?>"><a
                            href="<?php echo e(route('donation')); ?>" class="nav-link">Donasi</a></li>
                <?php else: ?>
                    <li class="nav-item <?php echo e(request()->routeIs('donate') ? 'active' : ''); ?>" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><a href="#" class="nav-link ">Donasi</a></li>
                <?php endif; ?>
                <li class="nav-item <?php echo e(request()->routeIs('gallery') ? 'active' : ''); ?>"><a href="/gallery"
                        class="nav-link">Galeri</a></li>
                <li class="nav-item <?php echo e(request()->routeIs('event') ? 'active' : ''); ?>"><a href="/event"
                        class="nav-link">Events</a></li>
                <li class="nav-item <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>"><a href="/contact"
                        class="nav-link">Kontak</a></li>
                
                
                
                
                
                
                
                
                

                <?php if(auth()->check()): ?>
                    <div class="dropdown mt-2">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?php echo e(auth()->user()->name); ?>

                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <div style="color: red">Sign Out</div>
                                </a>
                            </li>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="dropdown mt-2">
                        <a class="btn btn-secondary" href="<?php echo e(route('donation')); ?>" role="button"
                            aria-expanded="false">
                            Login
                        </a>
                    </div>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#alert-login').click(function() {
                
                Swal.fire({
                    // berikan waktu muncul alert 3 detik
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You must login first!',
                    footer: '<a href="/home">Login</a>',
                    timer: 5000, // 5000 milidetik atau 5 detik
                    timerProgressBar: true, // menampilkan progress bar
                    onClose: () => { // melakukan sesuatu setelah notifikasi ditutup
                        console.log('SweetAlert2 ditutup');
                    }
                })
                // }
            });

            //buatkan javascript jika tombol donate di klik maka akan menampilkan alert
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        })
    </script>
<?php $__env->stopSection(); ?>










<?php /**PATH D:\Kuliah\Semester 4\Web Lanjut\uts\Proyek\v8\panti-asuhan\resources\views/layouts/header.blade.php ENDPATH**/ ?>