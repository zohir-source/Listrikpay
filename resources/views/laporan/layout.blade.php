<!-- contoh dropdown di layout.blade.php -->

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Laporan
  </a>
  <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
    <li><a class="dropdown-item" href="{{ route('laporan.pembayaran') }}">Laporan Pembayaran</a></li>
    <li><a class="dropdown-item" href="{{ route('laporan.tagihan') }}">Laporan Tagihan Belum Lunas</a></li>
    <li><a class="dropdown-item" href="{{ route('laporan.penggunaan') }}">Laporan Penggunaan</a></li>
    <li><a class="dropdown-item" href="{{ route('laporan.rekap') }}">Laporan Rekap Bulanan</a></li>
    <li><a class="dropdown-item" href="{{ route('laporan.admin') }}">Laporan Per Admin</a></li>
  </ul>
</li>