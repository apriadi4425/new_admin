<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
       
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('register') }}" class="nav-link">Tambah User</a>
        </li>
		<li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
             </a>
			  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </li>
		
    </ul>

    <!-- SEARCH FORM -->
    <form method="post" action="{{ URL::to('berita/cari') }}" class="form-inline ml-3">
        @csrf
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="judul" id="judul" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

</nav>
<!-- /.navbar -->
