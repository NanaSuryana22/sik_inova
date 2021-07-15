<?php
$user = Auth::user();
?>
<aside id="leftsidebar" class="sidebar">
  <!-- User Info -->
  <div class="user-info">
      <div class="image">
          <img src="{{ asset('template/images/user.png') }}" width="48" height="48" alt="User" />
      </div>
      <div class="info-container">
          <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user->name ?></div>
          <div class="email"><?= $user->email ?></div>
          <div class="btn-group user-helper-dropdown">
              <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
              <ul class="dropdown-menu pull-right">
                  <li><a href="{{ route('profile.show') }}"><i class="material-icons">person</i>Profile</a></li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href={{ route('logout') }}" onclick="return logout(event);" title="Keluar Aplikasi ?"><i class="material-icons">input</i>Sign Out
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <!-- #User Info -->
  <!-- Menu -->
  <div class="menu">
      <ul class="list">
          <li class="header">MAIN NAVIGATION</li>
          <li class="@yield('dashboard')">
              <a href="{{ route('dashboard') }}">
                  <i class="material-icons">home</i>
                  <span>Home</span>
              </a>
          </li>
          <li class="@yield('master')">
              <a href="javascript:void(0);" class="menu-toggle">
                  <i class="material-icons">widgets</i>
                  <span>Master Data</span>
              </a>
              <ul class="ml-menu">
                  <li class="@yield('user')">
                      <a href="{{ route('users.index') }}">User</a>
                  </li>
                  <li class="@yield('role')">
                    <a href="{{ route('roles.index') }}">Hak Akses</a>
                  </li>
                  <li class="@yield('wilayah')">
                    <a href="{{ route('wilayah.index') }}">Wilayah</a>
                  </li>
                  <li class="@yield('pegawai')">
                      <a href="{{ route('pegawai.index') }}">Pegawai</a>
                  </li>
                  <li class="@yield('tindakan')">
                      <a href="{{ route('tindakan.index') }}">Tindakan</a>
                  </li>
                  <li class="@yield('obat')">
                      <a href="{{ route('obat.index') }}">Obat</a>
                  </li>
              </ul>
          </li>
          <li class="@yield('transaksi')">
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">assignment</i>
                <span>Transaksi</span>
            </a>
            <ul class="ml-menu">
                <li class="@yield('pasien')">
                    <a href="{{ route('pasien.index') }}">Data Pasien</a>
                </li>
                <li class="@yield('pendaftaran')">
                    <a href="{{ route('pendaftaran.index') }}">Pendaftaran Pasien</a>
                </li>
                <li class="@yield('pengobatan')">
                    <a href="{{ route('pengobatan.index') }}">Pengobatan / Pemeriksaan</a>
                </li>
                <li class="@yield('pembayaran')">
                    <a href="{{ route('pembayaran.index') }}">Pembayaran Tagihan</a>
                </li>
            </ul>
        </li>
        <li class="header">Laporan</li>
        <li class="@yield('pendaftaran')">
            <a href="{{ route('laporan_pendaftaran.index') }}">
                <i class="material-icons">pie_chart</i>
                <span>Laporan Pendaftaran</span>
            </a>
        </li>
        <li class="@yield('data_pasien')">
            <a href="{{ route('laporan_data_pasien.index') }}">
                <i class="material-icons">pie_chart</i>
                <span>Laporan Data Pasien</span>
            </a>
        </li>
      </ul>
  </div>
  <!-- #Menu -->
  <!-- Footer -->
  <div class="legal">
      <div class="copyright">
          &copy; 2021 <a href="javascript:void(0);">Sistem Informasi Klinik</a>.
      </div>
      <div class="version">
          <b>Develop By </b> <a href="http://nanasuryana.rf.gd" target="_blank">Nana Suryana</a>
      </div>
  </div>
  <!-- #Footer -->
</aside>
