<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="stuh-title">Dashboard</h1>
    <div class="tab-menu">
        <a href="/poshet/home" class="tab ">Installment (4)</a>
        <a href="/poshet/change" class="tab active">Change Payment (0)</a>
    </div>

<div class="change-container">
        <!-- Notifications List -->
        <div class="change-notifications">
            <div class="change-header" onclick="markAllAsRead()">Mark All As Read</div>
        </div>

        <!-- Notification Details (Always Same Size) -->
        <div class="change-card" id="change-card">
            <img src="/poshet/public/images/pocket.png" alt="Notification Icon" class="change-icon">
            <div class="changecard-title">Welcome!</div>
            <p id="order-info">Select a notification to see details.</p>
            <button class="change-card-btn" style="display: none;" id="view-order-btn" onclick="viewOrder()">View Order</button>
        </div>
    </div>
</div>

<script>
    function markAllAsRead() {
        document.querySelectorAll('.change-notification.change-unread').forEach(notification => {
            notification.classList.remove('change-unread');
            notification.classList.remove('active');
        });
    }

    function showDetails(element, refNo, customer, orderDate, status) {
        // Remove active class from all notifications
        document.querySelectorAll('.change-notification').forEach(notification => {
            notification.classList.remove('active');
        });

        // Mark clicked notification as read
        element.classList.add('active');
        element.classList.remove('change-unread');

        // Show the details on the right
        document.getElementById("order-info").innerHTML = `
            Customer with Ref. No: <strong>${refNo}</strong>, <strong>${customer}</strong> made a new installment order.<br>
            Order Date: <strong>${orderDate}</strong> <br>
            Status: <strong>${status}</strong><br>
            Click the button below to view the order details.
        `;

        // Update card title and show button
        document.querySelector('.changecard-title').innerText = "New Installment Order!";
        document.getElementById("view-order-btn").style.display = "block";
    }

    function viewOrder() {
        alert("Viewing order details...");
    }

    function updateTabCounts() {
    const installmentCount = document.querySelectorAll('.change-notifications .change-notification').length;
    const changePaymentCount = document.querySelectorAll('.change-payment-notifications .change-notification').length;
    
    document.querySelector(".tab-menu a[href='/poshet/home']").innerHTML = `Installment (${installmentCount})`;
    document.querySelector(".tab-menu a[href='/poshet/change']").innerHTML = `Change Payment (${changePaymentCount})`;
}

// Ensure tab switching updates the count dynamically
document.querySelectorAll(".tab-menu a").forEach(tab => {
    tab.addEventListener("click", () => {
        setTimeout(updateTabCounts, 100); // Small delay to ensure new elements are counted
    });
});

// Run on page load
document.addEventListener("DOMContentLoaded", () => {
    updateTabCounts();
});

// Call this function whenever a new notification is added dynamically
function addNotification(parentSelector, notificationHTML) {
    document.querySelector(parentSelector).insertAdjacentHTML("beforeend", notificationHTML);
    updateTabCounts();
}


</script>

<?php require_once 'layouts/footer.php'; ?>