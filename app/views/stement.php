<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h1 class="stuh-title">Statement</h1>
    <div class="tab-menu">
        <a href="/poshet/stement" class="tab active" onclick="setActiveTab(event, 'stement')">Statement</a>
        <a href="/poshet/void" class="tab" onclick="setActiveTab(event, 'void')">Void</a>
    </div>

    <!-- Real-Time Calendar Display -->
    <div class="calendar-container">
        <div class="calendar-box">
            <span class="calendar-icon"><i class="fa-solid fa-calendar"></i></span>

            <span id="real-time-clock"></span>
        </div>
    </div>
    <div class="cards-container">
        <div class="card">
            <p class="card-title">NO. OF TRANSACTIONS</p>
            <h1 class="card-value">0</h1>
        </div>
        <div class="card">
            <p class="card-title">TOTAL SALES</p>
            <h1 class="card-value">$0</h1>
        </div>
        <div class="card">
            <p class="card-title">SALES <br> (EXCLUDING VOIDS AND REFUNDS)</p>
            <h1 class="card-value">$0</h1>
        </div>
        <div class="red-card">
            <p id="red-card-title">REVERSED SALES</p>
            <h1 id="red-card-value">-$0</h1>
        </div>
    </div>

    <div class="date-time-boxes">
        <div class="date-time-box">
            <label for="from-date">From:</label>
            <input type="date" id="from-date" name="from-date">
        </div>
        <div class="date-time-box">
            <label for="to-date">To:</label>
            <input type="date" id="to-date" name="to-date">
        </div>
        <div class="date-time-box">
            <button type="button" id="go-button">Go</button>
        </div>
    </div>


    <!-- Transaction Table Slot -->
    <div class="stemen-table-con">
        <table class="stemen-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Merchant</th>
                    <th>Branch</th>
                    <th>Reference</th>
                    <th>Voucher Reference</th>
                    <th>Amount ($)</th>
                    <th>Source</th>
                    <th>Order ID</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Remark</th>
                    <th>Transaction Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2025-02-25</td>
                    <td>09:58:36</td>
                    <td>Coffee Street Cafe</td>
                    <td>Coffee</td>
                    <td>C25025519278</td>
                    <td>-</td>
                    <td>1.00</td>
                    <td>qr</td>
                    <td>0</td>
                    <td>8000008</td>
                    <td>-</td>
                    <td>-</td>
                    <td>Success</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'layouts/footer.php'; ?>

<script>
    function updateClock() {
        const now = new Date();
        const weekday = now.toLocaleDateString('en-GB', {
            weekday: 'short'
        });
        const day = now.getDate().toString().padStart(2, '0');
        const month = now.toLocaleDateString('en-GB', {
            month: 'short'
        });
        const year = now.getFullYear().toString().slice(-2);
        document.getElementById('real-time-clock').innerHTML = `<b class="highlight">${weekday}</b>, ${day} ${month} ${year}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>