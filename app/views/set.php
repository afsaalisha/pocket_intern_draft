<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <div class="breadcrumb">
        <span>Settings</span> > <span class="active">Rent To Own Settings</span>
    </div>
    <h1 class="title">Settings</h1>
    <div class="tab-menu">
    <a href="/poshet/set" class="tab active">Rent To Own Settings</a>
    <a href="/poshet/user" class="tab">Branch User Accounts</a>

    </div>
    <div class="settings-container">
        <h2 class="settings-title">Settings</h2>
        <div class="settings-row">
            <label>Automatically approve 'change payment method' requests?</label> 
            <div class="dropdown-box">
                <select class="styled-dropdown">
                    <option selected class="urdad">Yes</option> 
                    <option class="urdad">No</option>
                </select>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layouts/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const dropdownBox = document.querySelector(".dropdown-box");
    const selectedText = dropdownBox.querySelector(".selected-text");
    const dropdownOptions = document.querySelector(".dropdown-options");
    const options = document.querySelectorAll(".dropdown-options div");

    dropdownBox.addEventListener("click", function () {
        dropdownBox.classList.toggle("open");
    });

    options.forEach(option => {
        option.addEventListener("click", function () {
            selectedText.textContent = this.textContent;
            options.forEach(opt => opt.classList.remove("selected"));
            this.classList.add("selected");
            dropdownBox.classList.remove("open");
        });
    });

    document.addEventListener("click", function (event) {
        if (!dropdownBox.contains(event.target)) {
            dropdownBox.classList.remove("open");
        }
    });
});


</script>