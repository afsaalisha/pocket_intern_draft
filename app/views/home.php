<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="stuh-title">Dashboard</h1>
    <div class="tab-menu">
        <a href="/poshet/home" class="tab active">Installment (4)</a>
        <a href="/poshet/change" class="tab">Change Payment (0)</a>
    </div>

    <div class="change-container">
        <!-- Notifications List -->
        <div class="change-notifications" id="change-notifications">
            <div class="change-header" onclick="markAllAsRead()">Mark All As Read</div>

            <!-- Existing notifications (this part will be dynamically updated) -->
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

    // Generate random customer data
    function generateRandomCustomer() {
        const customers = [
            { name: 'Yuki Tanaka', ref: '245678' },
            { name: 'Alicia Sato', ref: '342567' },
            { name: 'John Smith', ref: '657890' },
            { name: 'Jane Doe', ref: '123456' },
            { name: 'Ahmad Bin Ali', ref: '987654' },
            { name: 'Siti Binti Ahmad', ref: '456789' },
            { name: 'Mohd Aziz', ref: '234567' },
            { name: 'Nurul Huda', ref: '876543' },
            { name: 'Kumar Raj', ref: '567890' },
            { name: 'Adachi Kiyoshi', ref: '143223'},
            { name: 'Joe Biden', ref: '123456'}
        ];

        const statuses = ['Pending', 'Approved', 'Denied'];

        const randomCustomer = customers[Math.floor(Math.random() * customers.length)];
        const randomStatus = statuses[Math.floor(Math.random() * statuses.length)];
        const randomDate = new Date();
        randomDate.setDate(randomDate.getDate() - Math.floor(Math.random() * 5)); // Random date within the last 5 days

        const refNo = randomCustomer.ref;
        const customerName = randomCustomer.name;
        const orderDate = randomDate.toLocaleDateString() + ', ' + randomDate.toLocaleTimeString().slice(0, 5);
        const status = randomStatus;

        return { refNo, customerName, orderDate, status };
    }

    // Function to add a random notification every 30 minutes
    setInterval(function () {
        const { refNo, customerName, orderDate, status } = generateRandomCustomer();

        const notificationHTML = `
            <div class="change-notification change-unread" onclick="showDetails(this, '${refNo}', '${customerName}', '${orderDate}', '${status}')">
                <img class="change-icon" src="/poshet/public/images/pocket.png" alt="Profile">
                <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                    <div>Customer ref. ${refNo}</div>
                    <div class="change-date">${orderDate}</div>
                </div>
            </div>
        `;

        addNotification('#change-notifications', notificationHTML);
    }, 1000); // Adds a new notification every 1 second (1000 ms)
</script>

<?php require_once 'layouts/footer.php'; ?>
