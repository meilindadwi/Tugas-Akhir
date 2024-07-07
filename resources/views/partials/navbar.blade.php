<nav class="site-nav mb-5">
    <div class="pb-2 top-bar mb-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-lg-9">
                    <a href="#" class="small mr-3">
                        <span class="icon-question-circle-o mr-2"></span>
                        <span class="d-none d-lg-inline-block">Have a questions?</span>
                    </a>
                    <a href="https://wa.me/6285712017990" class="small mr-3">
                        <span class="icon-phone mr-2"></span>
                        <span class="d-none d-lg-inline-block">+62 857 1201 7990</span>
                    </a>
                    <a href="mailto:rumifoundationtraining@gmail.com" class="small mr-3">
                        <span class="icon-envelope mr-2"></span>
                        <span class="d-none d-lg-inline-block">rumifoundation.training@gmail.com</span>
                    </a>
                </div>

                <div class="col-6 col-lg-3 text-right">
                    @guest
                        <a href="/login" class="small mr-3">
                            <span class="icon-lock"></span>
                            Log In
                        </a>
                        <a href="/register" class="small">
                            <span class="icon-person"></span>
                            Register
                        </a>
                    @else
                        <div class="dropdown d-inline">
                            <a href="#" class="small mr-3 dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-person"></span>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="d-inline">
    <a href="#" class="small" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="icon-bell"></span>
        @if(Auth::user()->unreadNotifications->count() > 0)
            <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
        @foreach(Auth::user()->unreadNotifications as $notification)
            <a class="dropdown-item" href="{{ route('notifications.show', $notification->id) }}">
                {{ $notification->data['message'] }}
            </a>
        @endforeach
    </div>
</div>

                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-nav js-sticky-header">
        <div class="container position-relative">
            <div class="site-navigation text-center">
                <a href="index.html" class="logo menu-absolute m-0">RFT<span class="text-primary">.</span></a>
                <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                    <li class="active"><a href="/">Beranda</a></li>
                    <li class="has-children">
                        <a href="#">Program</a>
                        <ul class="dropdown">
                            <li><a href="/konseling">Konseling</a></li>
                            <li><a href="/kelas">Kelas Online</a></li>
                            <li><a href="/training">In House Training</a></li>
                            <li><a href="/safari">Safari Healing</a></li>
                        </ul>
                    </li>
                    <li><a href="/psikolog">Konselor</a></li>
                    <li><a href="/about">Tentang Kami</a></li>
                </ul>
                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>