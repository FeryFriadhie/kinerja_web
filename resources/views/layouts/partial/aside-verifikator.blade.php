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
            <!-- <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a> -->
            <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" ddata-bs-toggle="tooltip" data-placement="top" title="Keluar"> 
              <i data-feather="log-out"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>

          </div>
        </div>
        <div class="aside-loggedin-user">
          <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
            <h6 class="tx-semibold mg-b-0">{{auth()->user()->nama_pegawai}}</h6>
            <i data-feather="chevron-down"></i>
          </a>
          <p class="tx-color-03 tx-12 mg-b-0">{{auth()->user()->role}}</p>
        </div>
        <div class="collapse" id="loggedinMenu">
          <ul class="nav nav-aside mg-b-0">
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
            {{-- <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
            <li class="nav-item"><a href="" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li> --}}
          </ul>
        </div>
      </div><!-- aside-loggedin -->
      <ul class="nav nav-aside">
        {{-- <li class="nav-label">Dashboard</li> --}}
        <li class="nav-item {{ (request()->is('verifikator/dashboard')) ? 'active' : '' }}">
          <a href="/verifikator/dashboard" class="nav-link"><i data-feather="home"></i> <span>Dashboard</span></a>
        </li>
        <li class="nav-item {{ (request()->is('verifikator/verifikasi-laporan')) ? 'active' : '' }}">
          <a href="/verifikator/verifikasi-laporan" class="nav-link"><i data-feather="file"></i> <span>Verifikasi Laporan</span></a>
        </li>
        <li class="nav-item {{ (request()->is('verifikator/laporan')) ? 'active' : '' }}">
          <a href="/verifikator/laporan" class="nav-link"><i data-feather="printer"></i> <span>Laporan</span></a>
        </li>
      </ul>
    </div>
  </aside>
