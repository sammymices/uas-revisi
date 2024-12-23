<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Panti Asuhan Al-Mubarok</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a href="/"
                        class="nav-link">HOME</a></li>
                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a href="/about"
                        class="nav-link">ABOUT US</a></li>
                @if (auth()->check())
                    <li class="nav-item {{ request()->routeIs('donateform') ? 'active' : '' }}"><a
                            href="{{ route('donation') }}" class="nav-link">DONASI</a></li>
                @else
                    <li class="nav-item {{ request()->routeIs('donate') ? 'active' : '' }}" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><a href="#" class="nav-link ">DONASI</a></li>
                @endif
                <li class="nav-item {{ request()->routeIs('event') ? 'active' : '' }}"><a href="/event"
                        class="nav-link">PROGRAM</a></li>
                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a href="/contact"
                        class="nav-link">KONTAK</a></li>
                {{--                @if (auth()->check()) --}}
                {{--                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a href="/contact" class="nav-link" href="{{ route('logout') }}" --}}
                {{--                                                                                           onclick="event.preventDefault(); --}}
                {{--                                                     document.getElementById('logout-form').submit();">Sign Out</a> --}}
                {{--                    </li> --}}
                {{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> --}}
                {{--                        @csrf --}}
                {{--                    </form> --}}
                {{--                @endif --}}

                @if (auth()->check())
                    <div class="dropdown mt-2">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <div style="color: red">Sign Out</div>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @else
                    <div class="dropdown mt-2">
                        <a class="btn btn-secondary" href="{{ route('donation') }}" role="button"
                            aria-expanded="false">
                            Login
                        </a>
                    </div>
                @endif

            </ul>
        </div>
    </div>
</nav>

@section('script')
    <script>
        $(document).ready(function() {
            $('#alert-login').click(function() {
                {{-- if (!{{ auth()->check() }}) { --}}
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
            {{-- document.getElementById('alert-login').onclick = function() { --}}
            {{--    // jika belum melakukan login maka akan menampilkan alert --}}
            {{--    if (!{{ auth()->check() }}) { --}}
            {{--        Swal.fire({ --}}
            {{--            icon: 'error', --}}
            {{--            title: 'Oops...', --}}
            {{--            text: 'You must login first!', --}}
            {{--            footer: '<a href="/login">Login</a>' --}}
            {{--        }) --}}
            {{--    } --}}
            {{--    Swal.fire({ --}}
            {{--        icon: 'error', --}}
            {{--        title: 'Oops...', --}}
            {{--        text: 'Something went wrong!', --}}
            {{--        footer: '<a href="">Why do I have this issue?</a>' --}}
            {{--    }) --}}
            {{-- }; --}}
        })
    </script>
@endsection

{{-- <script> --}}
{{--    // var currentLocation = window.location.href; --}}
{{--    // var menuItems = document.querySelectorAll('.navbar-nav a'); --}}
{{--    // for (var i = 0; i < menuItems.length; i++) { --}}
{{--    //     if (menuItems[i].href === currentLocation) { --}}
{{--    //         menuItems[i].classList.add('active'); --}}
{{--    //     } --}}
{{--    // } --}}
{{-- </script> --}}
