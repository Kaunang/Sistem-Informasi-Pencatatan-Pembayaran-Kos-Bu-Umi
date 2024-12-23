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
                <a href="dashboard-user" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="tagihan" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-credit-cards"></i>
                    <span>Data Tagihan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="profil" style="text-decoration: none;" class="sidebar-link">
                <i class="lni lni-user"></i>
                    <span>Profil</span>
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
        e.preventDefault();  // Mencegah aksi default (navigasi ke halaman lain)
        document.getElementById('logoutForm').submit();  // Mengirim form logout
    });
</script>
    </aside>
