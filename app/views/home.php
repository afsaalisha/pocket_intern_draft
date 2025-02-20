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

<style>
    /* Layout */
    .change-container {
        display: flex;
        width: 100%;
        align-items: stretch;
        margin: 20px 0;
    }

    /* Notifications List */
    .change-notifications {
        width: 300px;
        background: rgb(247, 247, 247);
        border-radius: 10px 0 0 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 0; /* Removes extra space */
        margin-left: 40px;
    }

    .change-header {
        background: #ff7f00;
        color: white;
        text-align: center;
        padding: 12px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        border-bottom: 2px solid #ff6600;
        transition: background 0.3s;
    }

    .change-header:hover {
        background: #e66c00;
    }

    .change-notification {
        display: flex;
        align-items: center;
        padding: 12px;
        border-bottom: 1px solid #eee;
        background:rgb(247, 247, 247);
        cursor: pointer;
        transition: background 0.3s ease-in-out, border 0.3s ease-in-out;
        position: relative;
    }

    .change-notification:hover {
        background: #e0e0e0;
    }

    .change-notification.active {
        background: #fff;
        border-left: none;
    }

    .change-notification.change-unread::after {
        content: '•';
        color: orange;
        font-size: 24px;
        position: absolute;
        top: 10px;
        right: 15px;
    }

    .change-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        margin-right: 15px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .change-text {
        flex: 1;
        font-size: 14px;
    }

    .change-bold {
        font-weight: bold;
        color: #333;
        margin-bottom: 2px;
    }

    .change-date {
        font-size: 12px;
        color: #777;
        margin-top: 5px;
    }

    /* Fixed Size for Notification Details */
    .change-card {
        flex: 1;
        background: #fff;
        padding: 30px;
        border-radius: 0 10px 10px 0;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        justify-content: center;
        min-height: 300px;
        min-width: 500px;
        flex-shrink: 0;
        margin: 0; /* Ensures no spacing */
    }

    .change-card img {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
    }

    .changecard-title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }

    .change-card p {
        font-size: 14px;
        margin: 5px 0;
    }

    .change-card-btn {
        margin-top: 15px;
        padding: 10px 15px;
        background: #ff7f00;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .change-card-btn:hover {
        background: #e66c00;
    }
</style>

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
