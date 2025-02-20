<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>
<?php
session_start();

// Dummy data (replace with database fetch logic)
$merchant_name = "Coffee Street Cafe - 001";
$merchant_salt = "p5B4YpA23MFLQvXX6jBEjSd3jPYHDzCnZHQWpSPQt49u6mTV8aTC6rbcPhqPuX8q";
$merchant_api_key = "4HEuuYvKNjpwhQA8HkHUAKhUUcgwErWYcZvw6sd7qMijqqNjFRjStN8daTfcNe";

// If using GET parameter for merchant ID
if (isset($_GET['id'])) {
    $merchant_id = $_GET['id'];
    // Fetch real values from the database here based on `$merchant_id`
}

?>


<div class="content skroll">
    <h2>Merchant Salt & Key</h2>
    <p class="kiz-description"><?= htmlspecialchars($merchant_name) ?></p>

    <label>Merchant Salt:</label>
    <div class="kiz-input-group">
        <input type="text" value="<?= htmlspecialchars($merchant_salt) ?>" readonly>
        <button onclick="copyToClipboard('salt')">📋</button>
    </div>

    <label>Merchant API Key:</label>
    <div class="kiz-input-group">
        <input type="text" value="<?= htmlspecialchars($merchant_api_key) ?>" readonly>
        <button onclick="copyToClipboard('api')">📋</button>
    </div>

    <a href="/poshet/keys" class="kiz-btn-secondary">Back</a>
</div>

<?php require_once 'layouts/footer.php'; ?>

<!-- scripts go below here -->

<script>
    function copyToClipboard(type) {
        let inputField = type === 'salt' ? document.querySelector('.kiz-input-group input') : document.querySelectorAll('.kiz-input-group input')[1];
        inputField.select();
        document.execCommand('copy');
        alert('Copied to clipboard!');
    }
</script>