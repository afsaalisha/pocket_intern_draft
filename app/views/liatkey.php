<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>
<?php

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

<div class="gonten skroll">
    <h2 class="title">Merchant Salt & Key</h2>
    <p class="kiz-description"><?= htmlspecialchars($merchant_name) ?></p>

    <label class="kunci-label">Merchant Salt:</label>
    <div class="kunci-input-group">
        <input type="text" class="kunci-kotak" id="salt" value="<?= htmlspecialchars($merchant_salt) ?>" readonly>
        <button onclick="copyToClipboard('salt')" class="kunci-btn-copy">
            <i class="fa fa-copy"></i>
        </button>
    </div>

    <label class="kunci-label">Merchant API Key:</label>
    <div class="kunci-input-group">
        <input type="text" class="kunci-kotak" id="api" value="<?= htmlspecialchars($merchant_api_key) ?>" readonly>
        <button onclick="copyToClipboard('api')" class="kunci-btn-copy">
            <i class="fa fa-copy"></i>
        </button>
    </div>

    <div class="kunci">
        <a href="/poshet/keys" class="kiz-btn-secondary">Back</a>
    </div>

</div>

<?php require_once 'layouts/footer.php'; ?>

<!-- scripts go below here -->
<script>
    function copyToClipboard(type) {
        let inputField = document.getElementById(type);
        inputField.select();
        inputField.setSelectionRange(0, 99999); // For mobile compatibility
        document.execCommand('copy');
        alert(type.charAt(0).toUpperCase() + type.slice(1) + " copied to clipboard!");
    }
</script>