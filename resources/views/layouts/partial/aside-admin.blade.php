<aside class="aside aside-fixed">
    <div class="aside-header">
      <a href="../../index.html" class="aside-logo">e-<span>Kinerja</span></a>
      <a href="" class="aside-menu-link">
        <i data-feather="menu"></i>
        <i data-feather="x"></i>
      </a>
    </div>
    <div class="aside-body">
      <div class="aside-loggedin">
        <div class="d-flex align-items-center justify-content-start">
          <a href="" class="avatar"><img src="../../assets/img/pp.png" class="rounded-circle" alt=""></a>
          <div class="aside-alert-link">
            <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
            <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" data-toggle="tooltip" title="Sign out"> 
              <i data-feather="log-out"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>

          </div>
        </div>
        <div class="aside-loggedin-user">
          <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
            <h6 class="tx-semibold mg-b-0">Oktaviani Rianti</h6>
            <i data-feather="chevron-down"></i>
          </a>
          <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
        </div>
        <div class="collapse" id="loggedinMenu">
          <ul class="nav nav-aside mg-b-0">
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li>
          </ul>
        </div>
      </div><!-- aside-loggedin -->
      <ul class="nav nav-aside">
        <li class="nav-item"><a href="/admin/dashboard" class="nav-link"><i data-feather="home"></i> <span>Dashboard</span></a></li>
        <li class="nav-item with-sub">
          <a href="" class="nav-link"><i data-feather="database"></i> <span>Master Data</span></a>
          <ul>
            <li><a href="/admin/data-pegawai">Data Pegawai</a></li>
            <li><a href="/admin/aktifitas-group">Aktifitas Grup</a></li>
            <li><a href="/admin/aktifitas-usul">Aktifitas Usul</a></li>
          </ul>
        </li>
        {{-- <li class="nav-item"><a href="/admin/aktifitas" class="nav-link"><i data-feather="activity"></i> <span>Aktifitas</span></a></li> --}}
        <li class="nav-item with-sub">
          <a href="" class="nav-link"><i data-feather="database"></i> <span>Referensi Data</span></a>
          <ul>
            <li><a href="">Aspek</a></li>
            <li><a href="">Stakeholder</a></li>
            <li><a href="">Verifikasi</a></li>
            <li><a href="">Validator</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="/admin/laporan" class="nav-link"><i data-feather="bar-chart"></i> <span>Laporan</span></a></li>
        <li class="nav-item with-sub">
          <a href="" class="nav-link"><i data-feather="settings"></i> <span>Pengaturan</span></a>
          <ul>
            <li><a href="/admin/pengguna">Pengguna Sistem</a></li>
            <li><a href="">Peran Pengguna</a></li>
            <li><a href="/admin/kelola-hak-akses">Kelola Hak Akses</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
