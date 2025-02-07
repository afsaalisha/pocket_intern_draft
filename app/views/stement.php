<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Statement</h1>
    <div class="tab-menu">
        <a href="/poshet/stement" class="tab active" onclick="setActiveTab(event, 'stement')">Statement</a>
        <a href="/poshet/void" class="tab" onclick="setActiveTab(event, 'void')">Void</a>

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
        <div>
            <label for="from-date">From:</label>
            <input type="date" id="from-date" name="from-date">
        </div>
        <div>
            <label for="to-date">To:</label>
            <input type="date" id="to-date" name="to-date">
        </div>
        <div>
            <button type="button" id="go-button">Go</button>
        </div>
    </div>
</div>

<?php require_once 'layouts/footer.php'; ?>