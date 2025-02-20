<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Dashboard</h1>
    <div class="tab-menu">
        <a href="/poshet/home" class="tab active">Installment (4)</a>
        <a href="/poshet/change" class="tab">Change Payment (0)</a>
    </div>

    <div class="change-container">
        <!-- Notifications List -->
        <div class="change-notifications">
            <div class="change-header" onclick="markAllAsRead()">Mark All As Read</div>

            <div class="change-notification change-unread" onclick="showDetails(this, 'IO-250207446740', 'Nisa Alias (879554)', '07 February 2025', 'Pending')">
                <img class="change-icon" src="/poshet/public/images/pocket.png" alt="Profile">
                <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                    <div>Customer ref. 12345567687</div>
                    <div class="change-date">07 February 2025, 09:25am</div>
                </div>
            </div>

            <div class="change-notification change-unread" onclick="showDetails(this, 'IO-250207446741', 'Yuki Tanaka (245678)', '08 February 2025', 'Approved')">
                <img class="change-icon" src="/poshet/public/images/pocket.png" alt="Profile">
                <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                    <div>Customer ref. 987654321</div>
                    <div class="change-date">08 February 2025, 10:15am</div>
                </div>
            </div>
            <div class="change-notification change-unread" onclick="showDetails(this, 'IO-250207446741', 'Yuki Tanaka (245678)', '08 February 2025', 'Approved')">
                <img class="change-icon" src="/poshet/public/images/pocket.png" alt="Profile">
                <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                    <div>Customer ref. 987654321</div>
                    <div class="change-date">08 February 2025, 10:15am</div>
                </div>
            </div>
            <div class="change-notification change-unread" onclick="showDetails(this, 'IO-250207446741', 'Yuki Tanaka (245678)', '08 February 2025', 'Approved')">
                <img class="change-icon" src="/poshet/public/images/pocket.png" alt="Profile">
                <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                    <div>Customer ref. 987654321</div>
                    <div class="change-date">08 February 2025, 10:15am</div>
                </div>
            </div>
            <div class="change-notification change-unread" onclick="showDetails(this, 'IO-250207446741', 'Yuki Tanaka (245678)', '08 February 2025', 'Approved')">
                <img class="change-icon" src="/poshet/public/images/pocket.png" alt="Profile">
                <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                    <div>Customer ref. 987654321</div>
                    <div class="change-date">08 February 2025, 10:15am</div>
                </div>
            </div>
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
</script>

<?php require_once 'layouts/footer.php'; ?>
