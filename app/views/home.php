<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Dashboard</h1>
    <div class="tab-menu">
        <a href="/poshet/home" class="tab active">Installment (4)</a>
        <a href="/poshet/change" class="tab">Change Payment (0)</a>
    </div>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notification UI</title>
        <style>
            .change-container {
                display: flex;
                gap: 20px;
                margin-left: 40px;
            }
            .change-notifications {
                width: 300px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .change-header {
                background: #ff7f00;
                color: white;
                text-align: center;
                padding: 10px;
                font-weight: bold;
                cursor: pointer;
            }
            .change-notification {
                display: flex;
                align-items: center;
                padding: 10px;
                border-bottom: 1px solid #ddd;
                position: relative;
                background: white;
            }
            .change-notification.change-unread::after {
                content: '\2022';
                color: orange;
                font-size: 30px;
                position: absolute;
                top: 0;
                right: 10px;
            }
            .change-icon {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                margin-right: 10px;
            }
            .change-text {
                flex: 1;
            }
            .change-bold {
                font-weight: bold;
            }
            .change-card {
                width: 300px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 15px;
            }
            .changecard-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="change-container">
            <div class="change-notifications">
                <div class="change-header" onclick="markAllAsRead()">Mark All As Read</div>
                <div class="change-notification change-unread">
                <img class="change-icon" src="/poshet/public/images/kiyoshi.jpg" alt="Profile">
                    <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                        <div>customer with ref no. IO-250207446740</div>
                        <div>07 February 2025, 09:25am</div>
                    </div>
                </div>
                <div class="change-notification change-unread">
                <img class="change-icon" src="/poshet/public/images/kiyoshi.jpg" alt="Profile">
                    <div class="change-text">
                        <div class="change-bold">New Installment Order!</div>
                        <div>customer with ref no. IO-250207446740</div>
                        <div>07 February 2025, 09:25am</div>
                    </div>
                </div>
                <div class="change-notification change-unread">
                <img class="change-icon" src="/poshet/public/images/kiyoshi.jpg" alt="Profile">
                    <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                        <div>customer with ref no. IO-250207446740</div>
                        <div>07 February 2025, 09:25am</div>
                    </div>
                </div>
                <div class="change-notification change-unread">
                <img class="change-icon" src="/poshet/public/images/kiyoshi.jpg" alt="Profile">
                    <div class="change-text">
                    <div class="change-bold">New Installment Order!</div>
                        <div>customer with ref no. IO-250207446740</div>
                        <div>07 February 2025, 09:25am</div>
                    </div>
                    <div class="change-notification"></div>
                    <div class="change-notification"></div>
                </div>
            </div>
            <div class="change-card">
                <div class="changecard-title">Order Details</div>
                <p>Reference No: IO-250207446740</p>
                <p>Customer: Adachi (case143)</p>
                <p>Order Date: 07 February 2025</p>
                <p>Status: Pending</p>
                <button onclick="viewOrder()">View Order</button>
            </div>
            <div>
                
            </div>
        </div>
        
        <script>
            function markAllAsRead() {
                document.querySelectorAll('.change-notification.change-unread').forEach(notification => {
                    notification.classList.remove('change-unread');
                });
            }
            function viewOrder() {
                alert('Viewing order details...');
            }
        </script>
    </body>
    </html>
