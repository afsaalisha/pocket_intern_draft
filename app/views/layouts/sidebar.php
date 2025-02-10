<!-- Burger Menu -->
<div class="burger-menu" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>

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
        <li data-page="statement"><a href="/poshet/stement" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-file"></i> Statement</a></li>
        <li data-page="terminal"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-mobile"></i> Terminal</a></li>
        <li data-page="branches"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-building"></i> Branches</a></li>
        <li data-page="manage-keys"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-key"></i> Manage Keys</a></li>
        <li data-page="services"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-briefcase"></i> Services</a></li>
        <li data-page="finances"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-money-bill"></i> Finances</a></li>
        <li data-page="home"><a href="/poshet/home" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-gear"></i> Settings</a></li>
        <li data-page="integration"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-link"></i> Integration</a></li>
        <li data-page="manage-payment"><a href="#" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-file-invoice"></i> Manage Payment Plans</a></li>
    </ul>

    <div class="logout">Logout</div>
</div>

<script>
    function toggleMenu() {
        document.querySelector('.mobile-nav').classList.toggle('active');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll(".menu li");
        const currentPage = localStorage.getItem("activePage");

        // Remove active class from all menu items before setting the correct one
        menuItems.forEach(item => item.classList.remove("active"));

        if (currentPage) {
            document.querySelector(`[data-page="${currentPage}"]`)?.classList.add("active");
        }

        menuItems.forEach(item => {
            item.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                const page = this.getAttribute("data-page");
                localStorage.setItem("activePage", page);
                menuItems.forEach(i => i.classList.remove("active"));
                this.classList.add("active");

                // Redirect to the selected page
                const link = this.querySelector("a");
                if (link && link.href) {
                    window.location.href = link.href;
                }
            });
        });

        // Ensure the main tab stays active when accessing subtabs
        const urlPath = window.location.pathname;
        let matchedPage = null;

        if (urlPath.includes("/poshet/stement") || urlPath.includes("/poshet/void")) {
            matchedPage = "statement";
        }

        if (urlPath.includes("/poshet/home") || urlPath.includes("/poshet/branch-user-accounts")) {
            matchedPage = "home";
        }

        if (matchedPage) {
            localStorage.setItem("activePage", matchedPage);
            document.querySelector(`[data-page="${matchedPage}"]`)?.classList.add("active");
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll(".menu li");
        const logoutButton = document.querySelector(".logout");
        const sidebar = document.querySelector(".sidebar");
        const content = document.querySelector(".content");
        const loginButton = document.createElement("div");
        loginButton.textContent = "Login";
        loginButton.classList.add("login");
        loginButton.style.background = "#C1E1C1";
        loginButton.style.padding = "10px";
        loginButton.style.textAlign = "center";
        loginButton.style.borderRadius = "5px";
        loginButton.style.fontWeight = "bold";
        loginButton.style.color = "#0E6E29";
        loginButton.style.cursor = "pointer";
        loginButton.style.display = "none";
        loginButton.style.position = "absolute";
        loginButton.style.top = "50%";
        loginButton.style.left = "50%";
        loginButton.style.transform = "translate(-50%, -50%)";

        document.body.appendChild(loginButton);

        const currentPage = localStorage.getItem("activePage");
        if (currentPage) {
            document.querySelector(`[data-page="${currentPage}"]`)?.classList.add("active");
        }

        menuItems.forEach(item => {
            item.addEventListener("click", function() {
                localStorage.setItem("activePage", this.getAttribute("data-page"));
            });
        });

        logoutButton.addEventListener("click", function() {
            localStorage.removeItem("activePage");
            sidebar.style.display = "none";
            if (content) content.style.display = "none";
            loginButton.style.display = "block";
        });

        loginButton.addEventListener("click", function() {
            sidebar.style.display = "block";
            if (content) content.style.display = "block";
            loginButton.style.display = "none";
        });
    });
</script>