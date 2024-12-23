<aside id="sidebar">
<div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="dashboard-user" style="text-decoration: none;">Project Uas</a>
            </div>
        </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="Dashboard" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-home"></i> <!-- Ikon dashboard diganti ke ikon rumah -->
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
    <a href="Data-Kamar" style="text-decoration: none;" class="sidebar-link">
        <i class="lni lni-apartment"></i> <!-- Coba gunakan ikon lain -->
        <span>Data Kamar</span>
    </a>
</li>

        <li class="sidebar-item">
            <a href="Data-Penghuni" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-user"></i> <!-- Ikon pengguna untuk data penghuni -->
                <span>Data Penghuni</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="Data-Tagihan" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-credit-cards"></i> <!-- Ikon kartu kredit untuk tagihan -->
                <span>Data Tagihan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="Pembayaran-Lunas" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-checkmark-circle"></i> <!-- Tetap menggunakan ikon checklist -->
                <span>Pembayaran Lunas</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="Laporan-Keuangan" style="text-decoration: none;" class="sidebar-link">
            <i class="lni lni-book"></i>
                <span>Laporan Keuangan</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="Pengguna-Sistem" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-users"></i> <!-- Tetap menggunakan ikon grup pengguna -->
                <span>Pengguna Sistem</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
            <a href="#" id="logoutBtn" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default (navigasi ke halaman lain)
            document.getElementById('logoutForm').submit(); // Mengirim form logout
        });
    </script>
</aside>
