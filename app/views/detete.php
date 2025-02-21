<?php
// Retrieve the parameters from the URL
$terminalId = isset($_GET['terminalId']) ? $_GET['terminalId'] : 'Not Provided';
$terminalName = isset($_GET['terminalName']) ? $_GET['terminalName'] : 'Not Provided';
$redirectLink = isset($_GET['redirectLink']) ? $_GET['redirectLink'] : '#';
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
    <h2>Payment Link Details</h2>

    <p><strong>Terminal ID:</strong> <span><?php echo $terminalId; ?></span></p>
    <p><strong>Terminal Name:</strong> <span><?php echo $terminalName; ?></span></p>
    <p><strong>Redirect Link:</strong> 
        <a href="<?php echo $redirectLink; ?>" target="_blank" class="detete-link"><?php echo $redirectLink; ?></a>
    </p>

    <h3>Payment Link</h3>
    
    <div class="input-container">
        <input type="text" id="paymentLinkField" class="detete-input" value="<?php echo $paymentLink; ?>" readonly>
        <button class="copy-icon" onclick="copyToClipboard()">
            <i class="fas fa-copy"></i>
        </button>
    </div>

    <div class="detete-buttons">
        <button onclick="window.history.back()" class="detete-btn back">Back</button>
        <button class="detete-btn delete">Delete Link</button>
    </div>
</div>

<script>
function copyToClipboard() {
    var copyText = document.getElementById("paymentLinkField");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");

    // Show a small tooltip or change the icon to indicate success
    let copyButton = document.querySelector(".copy-icon i");
    copyButton.classList.remove("fa-copy");
    copyButton.classList.add("fa-check");

    setTimeout(() => {
        copyButton.classList.remove("fa-check");
        copyButton.classList.add("fa-copy");
    }, 1500);
}

</script>

<style>
/* Main Container */
.detete-container {
    display: block;
    position: fixed;
    top: 50%;
    left: 60%;
    transform: translate(-50%, -50%);
    background: white;
    color: #333;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 40%;
    max-width: 600px;
}

/* Title and Headings */
.detete-container h2, 
.detete-container h3 {
    margin-bottom: 12px;
    color: #FFA74D; /* Light orange */
    font-size: 20px;
    font-weight: bold;
}

/* Input Container */
.input-container {
    display: flex;
    align-items: center;
    background: #f4f4f4;
    border-radius: 8px;
    padding: 5px;
    border: 1px solid #ccc;
}

/* Payment Link Field */
.detete-input {
    flex: 1;
    padding: 10px;
    font-size: 16px;
    border: none;
    background: transparent;
    color: #333;
    outline: none;
}

/* Copy Button */
.copy-icon {
    background: #FF7F00; /* Orange */
    border: none;
    cursor: pointer;
    font-size: 18px;
    padding: 10px;
    border-radius: 6px;
    color: white; /* White Icon */
    transition: background 0.3s;
}

.copy-icon:hover {
    background: #CC5E00; /* Darker Orange */
}

/* Buttons */
.detete-buttons {
    margin-top: 20px;
    display: flex;
    gap: 10px;
    justify-content: center;
}

.detete-btn {
    padding: 10px 18px;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
    border: none;
}

.detete-btn.back {
    background-color: #FFA74D;
    color: white;
}

.detete-btn.back:hover {
    background-color: #CC5E00;
}

.detete-btn.delete {
    background-color: #dc3545;
    color: white;
}

.detete-btn.delete:hover {
    background-color: #c82333;
}

/* Responsive */
@media (max-width: 768px) {
    .detete-container {
        width: 80%;
    }
}
</style>
