<?php
// Retrieve the parameters from the URL
$terminalId = isset($_GET['terminalId']) ? $_GET['terminalId'] : '';
$terminalName = isset($_GET['terminalName']) ? $_GET['terminalName'] : '';
$redirectLink = isset($_GET['redirectLink']) ? $_GET['redirectLink'] : '';
$paymentLink = isset($_GET['paymentLink']) ? $_GET['paymentLink'] : '';

// Sanitize output
$terminalId = htmlspecialchars($terminalId);
$terminalName = htmlspecialchars($terminalName);
$redirectLink = htmlspecialchars($redirectLink);
$paymentLink = htmlspecialchars($paymentLink);
?>

<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">View Payment Links</h1>

    <div class="detete-container">
        <div class="detete-card">
            <h2>Payment Link Details</h2>
            <div class="detete-details">
                <p><strong>Terminal ID:</strong> <?php echo $terminalId; ?></p>
                <p><strong>Terminal Name:</strong> <?php echo $terminalName; ?></p>
                <p><strong>Redirect Link:</strong> <a href="<?php echo $redirectLink; ?>" target="_blank" class="detete-link"><?php echo $redirectLink; ?></a></p>
                
                <!-- Non-editable form container with copy clipboard functionality -->
                <p><strong>Payment Link:</strong> 
                    <input type="text" id="paymentLinkField" class="detete-input" value="<?php echo $paymentLink; ?>" readonly>
                    <button class="detete-clipboard" onclick="copyToClipboard()">📋 Copy</button>
                </p>

                <div class="detete-buttons">
                    <button onclick="window.history.back()" class="detete-btn back">⬅ Back</button>
                    <button class="detete-btn delete">Delete Link</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
// Function to copy the payment link to clipboard
function copyToClipboard() {
    var copyText = document.getElementById("paymentLinkField");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand("copy");
    alert("Copied: " + copyText.value);
}
</script>


</script>

<style>
    /* Container */
.detete-container {
    width: 90%;
    max-width: 800px;
    margin: 20px auto;
}

/* Card */
.detete-card {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    text-align: left;
}

/* Title */
.title {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

/* Details Section */
.detete-details p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.detete-details a {
    color: #007bff;
    text-decoration: none;
    word-wrap: break-word;
    max-width: 100%;
    transition: color 0.3s;
}

.detete-details a:hover {
    color: #0056b3;
}

/* Clipboard Button */
.detete-clipboard {
    background-color: #f1f1f1;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 8px 15px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.detete-clipboard:hover {
    background-color: #007bff;
    color: white;
}

/* Non-editable Input */
.detete-input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-right: 10px;
    background-color: #f4f4f4;
    color: #333;
    cursor: not-allowed;
}

/* Buttons */
.detete-buttons {
    margin-top: 30px;
    display: flex;
    gap: 15px;
    justify-content: space-between;
}

/* Button Styling */
.detete-btn {
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    width: 48%;
}

.detete-btn.back {
    background-color: #007bff;
    color: white;
    border: none;
}

.detete-btn.back:hover {
    background-color: #0056b3;
}

.detete-btn.delete {
    background-color: #dc3545;
    color: white;
    border: none;
}

.detete-btn.delete:hover {
    background-color: #c82333;
}

/* Responsiveness */
@media (max-width: 768px) {
    .detete-container {
        width: 95%;
    }

    .detete-btn {
        width: 100%;
    }
}

</style>