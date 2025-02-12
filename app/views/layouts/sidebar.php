<!-- Burger Menu -->
<div class="burger-menu" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div>

<!-- Mobile Navigation -->
<nav class="mobile-nav">
    <a href="/poshet/home"><i class="fa-solid fa-book"></i>Dashboard</a>
    <a href="/poshet/stement"><i class="fa-solid fa-file"></i>Statement</a>
    <a href="/poshet/tetris"><i class="fa-solid fa-mobile"></i>Terminal</a>
    <a href="/poshet/branch"><i class="fa-solid fa-building"></i>Branches</a>
    <a href="/poshet/keys"><i class="fa-solid fa-key"></i>Manage Keys</a>
    <a href="/poshet/service"><i class="fa-solid fa-briefcase"></i>Services</a>
    <a href="/poshet/finance"><i class="fa-solid fa-money-bill"></i>Finances</a>
    <a href="/poshet/set"><i class="fa-solid fa-gear"></i>Settings</a>
    <a href="/poshet/intete"><i class="fa-solid fa-link"></i>Integration</a>
    <a href="/poshet/pans"><i class="fa-solid fa-file-invoice"></i>Manage Payment Links</a>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <img src="/poshet/public/images/pocket.png" alt="Logo" width="40">
    </div>
    <div class="profile" onclick="changeProfilePic()" style="cursor: pointer;">
        <input type="file" id="profilePicInput" accept="image/*" style="display: none;">
        <img id="profilePic" src="/poshet/public/images/kiyoshi.jpg" alt="Profile">
        <div>
            <div>Username</div>
            <div class="subtext">ID or something</div>
        </div>
    </div>
    <ul class="menu">
        <li data-page="home"><a href="/poshet/home" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-book"></i> Dashboard</a></li>
        <li data-page="statement"><a href="/poshet/stement" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-file"></i> Statement</a></li>
        <li data-page="terminal"><a href="/poshet/tetris" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-mobile"></i> Terminal</a></li>
        <li data-page="branches"><a href="/poshet/branch" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-building"></i> Branches</a></li>
        <li data-page="manage-keys"><a href="/poshet/keys" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-key"></i> Manage Keys</a></li>
        <li data-page="services"><a href="/poshet/service" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-briefcase"></i> Services</a></li>
        <li data-page="finances"><a href="/poshet/finance" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-money-bill"></i> Finances</a></li>
        <li data-page="set"><a href="/poshet/set" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-gear"></i> Settings</a></li>
        <li data-page="integration"><a href="/poshet/intete" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-link"></i> Integration</a></li>
        <li data-page="manage-payment"><a href="/poshet/pans" style="text-decoration: none !important; color: inherit !important;"><i class="fa-solid fa-file-invoice"></i> Manage Payment Links</a></li>
    </ul>

    <div class="logout">Logout</div>
</div>

<!-- Cropping Modal -->
<div id="cropModal">
    <div class="modal-content">
        <img id="cropImage" style="max-width: 100%;">
        <button id="cropBtn">Crop & Save</button>
        <button id="closeCropper">Cancel</button>
    </div>
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

        if (urlPath.includes("/poshet/set") || urlPath.includes("/poshet/branch-user-accounts")) {
            matchedPage = "set";
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

    function toggleMenu() {
        const mobileNav = document.querySelector('.mobile-nav');
        const content = document.querySelector('.content');
        mobileNav.classList.toggle('active');
        content.classList.toggle('shifted');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const menu = document.querySelector(".menu");
        const menuItems = document.querySelectorAll(".menu li");

        // Restore scroll position
        const savedScrollPosition = localStorage.getItem("menuScrollPosition");
        if (savedScrollPosition) {
            menu.scrollTop = savedScrollPosition;
        }

        menuItems.forEach(item => {
            item.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default anchor behavior

                // Save the current scroll position before redirecting
                localStorage.setItem("menuScrollPosition", menu.scrollTop);

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
    });
// Profile Picture Handling with Cropping and GIF Support
const profilePic = document.getElementById("profilePic");
const profilePicInput = document.getElementById("profilePicInput");
const cropModal = document.getElementById("cropModal");
const cropImage = document.getElementById("cropImage");
const cropBtn = document.getElementById("cropBtn");
const closeCropper = document.getElementById("closeCropper");

let cropper;

// Hide the crop modal immediately when the script is loaded to prevent flickering
cropModal.style.display = "none";

// Load saved profile picture
const savedProfilePic = localStorage.getItem("profilePic");
if (savedProfilePic) {
    profilePic.src = savedProfilePic;
}

// Click profile picture to open gallery
profilePic.addEventListener("click", function () {
    profilePicInput.click();
});

// Handle image selection (show modal only after selecting an image)
profilePicInput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (!file) return;

    const fileType = file.type;
    const reader = new FileReader();

    reader.onload = function (e) {
        const imageData = e.target.result;

        // If it's a GIF, store it directly without cropping
        if (fileType === "image/gif") {
            localStorage.setItem("profilePic", imageData);
            profilePic.src = imageData;
        } else {
            // Show modal **only after selecting an image**
            cropImage.src = imageData;
            cropModal.style.display = "flex";

            // Destroy previous instance of cropper if exists
            if (cropper) cropper.destroy();

            cropper = new Cropper(cropImage, {
                aspectRatio: 1, // Square crop for profile pic
                viewMode: 2
            });
        }
    };

    reader.readAsDataURL(file);
});

// Crop and save image
cropBtn.addEventListener("click", function () {
    const canvas = cropper.getCroppedCanvas();
    const croppedImage = canvas.toDataURL("image/png");

    // Save cropped image
    localStorage.setItem("profilePic", croppedImage);
    profilePic.src = croppedImage;

    // Hide crop modal
    cropModal.style.display = "none";
});

// Close the cropper without saving
closeCropper.addEventListener("click", function () {
    cropModal.style.display = "none";
});

// Ensure the crop modal is hidden on page load
document.addEventListener("DOMContentLoaded", function () {
    cropModal.style.display = "none";
});


</script>