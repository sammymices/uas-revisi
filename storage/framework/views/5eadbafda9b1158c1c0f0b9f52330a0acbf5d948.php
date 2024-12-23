<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index-2.html">
            <span class="align-middle me-3"><?php echo e(config('app.name')); ?></span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">Master</li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo e(route('dashboard.index')); ?>">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <?php if(auth()->check() && auth()->user()->role == 'admin'): ?>
                <li class="sidebar-item <?php echo e(request()->routeIs('dashboard.donation.*') ? 'active' : ''); ?>">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="heart"></i>
                        <span class="align-middle">Donasi</span>
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item <?php echo e(request()->routeIs('dashboard.donation.barang.*') ? 'active' : ''); ?>">
                            <a class="sidebar-link" href="<?php echo e(route('dashboard.donation.barang.index')); ?>">Barang</a>
                        </li>
                        <li class="sidebar-item <?php echo e(request()->routeIs('dashboard.donation.uang') ? 'active' : ''); ?>">
                            <a class="sidebar-link" href="<?php echo e(route('dashboard.donation.uang')); ?>">Uang</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?php echo e(request()->routeIs('dashboard.events.index') ? 'active' : ''); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('dashboard.events.index')); ?>">
                        <i class="align-middle" data-feather="calendar"></i>
                        <span class="align-middle">Event</span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(request()->routeIs('dashboard.child.index') ? 'active' : ''); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('dashboard.child.index')); ?>">
                        <i class="align-middle me-2" data-feather="smile"></i>
                        <span class="align-middle">Data Anak</span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(request()->routeIs('dashboard.feedback.index') ? 'active' : ''); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('dashboard.feedback.index')); ?>">
                        <i class="align-middle me-2" data-feather="message-circle"></i>
                        <span class="align-middle">Data Feedback</span>
                    </a>
                </li>
            <?php elseif(auth()->check() && auth()->user()->roles->isNotEmpty() && auth()->user()->roles[0]->name == 'rental'): ?>
                
                <li class="sidebar-item <?php echo e(request()->routeIs('rental.cars.*') ? 'active' : ''); ?>">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle me-2 fas fa-fw fa-car"></i>
                        <span class="align-middle">Mobil</span>
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse <?php echo e(request()->routeIs('rental.cars.*') ? 'show' : ''); ?>" data-bs-parent="#sidebar">
                        <li class="sidebar-item <?php echo e(request()->routeIs('rental.cars.create') ? 'active' : ''); ?>">
                            <a class="sidebar-link" href="<?php echo e(route('rental.cars.create')); ?>">Tambah Mobil</a>
                        </li>
                        <li class="sidebar-item <?php echo e(request()->routeIs('rental.cars.index') ? 'active' : ''); ?>">
                            <a class="sidebar-link" href="<?php echo e(route('rental.cars.index')); ?>">List Mobil</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?php echo e(request()->routeIs('rental.drivers.*') ? 'active' : ''); ?>">
                    <a data-bs-target ="#pages-drivers" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle me-2 fas fa-fw fa-users"></i>
                        <span class="align-middle">Sopir</span>
                    </a>
                    <ul id="pages-drivers" class="sidebar-dropdown list-unstyled collapse <?php echo e(request()->routeIs('rental.drivers.*') ? 'show' : ''); ?>" data-bs-parent="#sidebar">
                        <li class="sidebar-item <?php echo e(request()->routeIs('rental.drivers.create') ? 'active' : ''); ?>">
                            <a class="sidebar-link" href="<?php echo e(route('rental.drivers.create')); ?>">Tambah Sopir</a>
                        </li>
                        <li class="sidebar-item <?php echo e(request()->routeIs('rental.drivers.index') ? 'active' : ''); ?>">
                            <a class="sidebar-link" href="<?php echo e(route('rental.drivers.index')); ?>">List Sopir</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav><?php /**PATH C:\abc_Gabrielipp\Semester3\projek_laravel\panti-asuhan-gas\resources\views/dashboard/layout/sidebar.blade.php ENDPATH**/ ?>