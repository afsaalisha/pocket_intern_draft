<!-- Burger Menu -->
<div class="burger-menu" onclick="toggleMenu()">☰</div>

<!-- Mobile Navigation -->
<nav class="mobile-nav">
    <a href="#">Statement</a>
    <a href="#">Terminal</a>
    <a href="#">Branches</a>
    <a href="#">Manage Keys</a>
    <a href="#">Services</a>
    <a href="#">Finances</a>
    <a href="#">Settings</a>
    <a href="#">Integration</a>
    <a href="#">Manage Payment Plans</a>
</nav>

<div class="sidebar">
    <div class="logo">
        <img src="/poshet/public/images/pocket.png" alt="Logo" width="40">
    </div>
    <div class="profile">
        <img src="/poshet/public/images/kiyoshi.jpg" alt="Profile">
        <div>
            <div>Username</div>
            <div class="subtext">ID or something</div>
        </div>
    </div>
    <ul class="menu">
        <li><a href="/poshet/stement" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-file"></i> Statement</a></li>
        <li><i class="fa-solid fa-mobile"></i> Terminal</li>
        <li><i class="fa-solid fa-building"></i> Branches</li>
        <li><i class="fa-solid fa-key"></i> Manage Keys</li>
        <li><i class="fa-solid fa-briefcase"></i> Services</li>
        <li><i class="fa-solid fa-money-bill"></i> Finances</li>
        <li><a href="/poshet/home" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-gear"></i> Settings</a></li>
        <li><i class="fa-solid fa-link"></i> Integration</li>
        <li><i class="fa-solid fa-file-invoice"></i> Manage Payment Plans</li>
    </ul>
    <div class="logout">Logout</div>
</div>

<script>
    function toggleMenu() {
        document.querySelector('.mobile-nav').classList.toggle('active');
    }
</script>