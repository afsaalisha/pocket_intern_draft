<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h1 class="title">Statement</h1>
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
</div>

<?php require_once 'layouts/footer.php'; ?>


<script>
    function updateClock() {
        const now = new Date();

        // Format day, month, and year
        const weekday = now.toLocaleDateString('en-GB', {
            weekday: 'short'
        }); // Get the short day name (Tue)
        const day = now.getDate().toString().padStart(2, '0'); // Get the day (11)
        const month = now.toLocaleDateString('en-GB', {
            month: 'short'
        }); // Get the short month name (Feb)
        const year = now.getFullYear().toString().slice(-2); // Get the last two digits of the year (25)

        // Combine into the desired format
        const formattedDate = `${weekday}, ${day} ${month} ${year}`;

        // Update the clock with the formatted date, highlighting the weekday
        document.getElementById('real-time-clock').innerHTML = `<b class="highlight">${weekday}</b>, ${day} ${month} ${year}`;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>