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

<div class="content skroll">
    <div id="managePaymentLinks">
        <h1 class="stuh-title">Manage Payment Links</h1>
        <span class="pepep">Payment Links</span>
        <p class="description">Here you can manage your payment links, view details, and add new links easily.</p>
        <a href="javascript:void(0)" id="addNewLinkButton" class="add-button"><i class="fa-solid fa-plus"></i> Add New Link</a>
    </div>
    
    <!-- Table View Container -->
    <div id="tableView">
        <table>
            <thead>
                <tr>
                    <th>Terminal ID</th>
                    <th>Terminal Name</th>
                    <th>Redirect Link</th>
                    <th>Payment Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Coffee</td>
                    <td><a href="https://bit.ly/DigitalFuture24" target="_blank" class="truncate">https://bit.ly/DigitalFuture24</a></td>
                    <td><a href="https://pay.pocket.com.bn/payments/setCustomAmount/..." target="_blank" class="truncate">https://pay.pocket.com.bn/payments/setCustomAmount/...</a></td>
                    <td><button class="Details">Details</button></td>
                </tr>
                <tr>
                    <td>501</td>
                    <td>Shopify API</td>
                    <td><a href="https://docs.google.com/document/d/1zfoote8..." target="_blank" class="truncate">https://docs.google.com/document/d/1zfoote8...</a></td>
                    <td><a href="https://pay.pocket.com.bn/payments/setCustomAmount/..." target="_blank" class="truncate">https://pay.pocket.com.bn/payments/setCustomAmount/...</a></td>
                    <td><button class="Details">Details</button></td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>Coffee</td>
                    <td><a href="https://en.wikipedia.org/wiki/Rose" target="_blank" class="truncate">https://en.wikipedia.org/wiki/Rose</a></td>
                    <td><a href="https://pocket-payv2.threeg.asia/payments/setCustomAmount/..." target="_blank" class="truncate">https://pocket-payv2.threeg.asia/payments/setCustomAmount/...</a></td>
                    <td><button class="Details">Details</button></td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>Coffee</td>
                    <td><a href="https://google.com" target="_blank" class="truncate">https://google.com</a></td>
                    <td><a href="https://pocket-payv2.threeg.asia/payments/setCustomAmount/..." target="_blank" class="truncate">https://pocket-payv2.threeg.asia/payments/setCustomAmount/...</a></td>
                    <td><button class="Details">Details</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Hidden Pupu Form View (pupu.php content) -->
    <div id="pupuForm" style="display: none;">
        <h1 class="title">Generate New Payment Links</h1>
        <p class="description">Here you can manage your payment links, view details, and add new links easily.</p>

        <div class="payment-container">
            <h2>Select a Terminal</h2>
            <form method="POST" action="pans">
                <label for="terminal" class="gahlabel">Choose a Terminal:</label>
                <select id="terminal" name="terminal" class="terminal-dropdown">
                    <option>Coffee</option>
                    <option>Shopify API</option>
                </select>

                <h2>Enter Redirect Link</h2>
                <label for="redirect" class="gahlabel">Redirect URL:</label>
                <div class="redirect-input-container">
                    <input type="text" id="https" class="https-input" value="https://" readonly>
                    <input type="text" id="redirect" name="redirect" class="redirect-input" placeholder="example.com" required>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-generate">Generate Link</button>
                    <button type="button" class="btn btn-back">Go Back</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hidden Detete Container (Details View) -->
    <div class="detete-container" style="display: none;">
        <h2>Payment Link Details</h2>
        <p><strong>Terminal ID:</strong> <span id="deteteTerminalId"></span></p>
        <p><strong>Terminal Name:</strong> <span id="deteteTerminalName"></span></p>
        <p><strong>Redirect Link:</strong> 
            <a href="#" target="_blank" class="detete-link" id="deteteRedirectLink"></a>
        </p>
        <h3>Payment Link</h3>
        <div class="input-container">
            <input type="text" id="paymentLinkField" class="detete-input" readonly>
            <button class="copy-icon" onclick="copyToClipboard()">
                <i class="fas fa-copy"></i>
            </button>
        </div>
        <div class="detete-buttons">
            <button class="btn btn-back" id="deteteBackButton">Back</button>
            <button class="detete-btn delete">Delete Link</button>
        </div>
    </div>

</div>

<script>
// 1. Fix the "Add New Link" button position
function fixAddButton() {
    const button = document.querySelector(".add-button");
    if (button) {
        button.style.position = "fixed";
        button.style.top = "12%";
        button.style.zIndex = "1000";
    }
}
fixAddButton();

// Observe mutations so the button remains fixed
const observer = new MutationObserver(() => fixAddButton());
observer.observe(document.body, { childList: true, subtree: true });

// 2. Show the "pupuForm" when the "Add New Link" button is clicked
document.getElementById("addNewLinkButton").addEventListener("click", function() {
    document.getElementById("pupuForm").style.display = "block";
    document.getElementById("tableView").style.display = "none";
    document.getElementById("managePaymentLinks").style.display = "none";
    this.style.display = "none";
});

// 3. PupU form "Go Back" button -> redirect to pans.php
document.querySelector("#pupuForm .btn-back").addEventListener("click", function() {
    window.location.href = "pans";
});

// 4. Handle "Generate Link" button in pupu form
document.querySelector(".btn-generate").addEventListener("click", function(event) {
    event.preventDefault();

    const terminal = document.getElementById("terminal").value;
    const redirect = document.getElementById("redirect").value.trim();
    // Example: generate a unique payment link
    const paymentLink = `https://pay.pocket.com.bn/payments/setCustomAmount/${Date.now()}`;

    if (!redirect) {
        alert("Please enter a redirect URL.");
        return;
    }

    // Assign Terminal ID
    let terminalId;
    if (terminal === "Coffee") {
        terminalId = "001";
    } else if (terminal === "Shopify API") {
        terminalId = "501";
    } else {
        terminalId = "NEW";
    }

    // Create a new row in the table
    const tableBody = document.querySelector("#tableView tbody");
    const newRow = document.createElement("tr");
    newRow.innerHTML = `
        <td>${terminalId}</td>
        <td>${terminal}</td>
        <td><a href="https://${redirect}" target="_blank" class="truncate">https://${redirect}</a></td>
        <td><a href="${paymentLink}" target="_blank" class="truncate">${paymentLink}</a></td>
        <td><button class="Details">Details</button></td>
    `;
    tableBody.appendChild(newRow);

    // Hide the form and show the table again
    document.getElementById("pupuForm").style.display = "none";
    document.getElementById("tableView").style.display = "block";
    document.getElementById("managePaymentLinks").style.display = "block";
    document.getElementById("addNewLinkButton").style.display = "block";
    document.getElementById("redirect").value = "";
});

// 5. When a "Details" button is clicked, show the detete container
document.addEventListener("click", function(event) {
    if (event.target.classList.contains("Details")) {
        // Get the row that was clicked
        const row = event.target.closest("tr");

        // Extract the data from the row cells
        const rowTerminalId   = row.cells[0].innerText;
        const rowTerminalName = row.cells[1].innerText;
        const rowRedirectLink = row.cells[2].querySelector("a").href;
        const rowPaymentLink  = row.cells[3].querySelector("a").href;

        // Populate the detete container fields
        document.getElementById("deteteTerminalId").textContent = rowTerminalId;
        document.getElementById("deteteTerminalName").textContent = rowTerminalName;
        document.getElementById("deteteRedirectLink").href = rowRedirectLink;
        document.getElementById("deteteRedirectLink").textContent = rowRedirectLink;
        document.getElementById("paymentLinkField").value = rowPaymentLink;

        // Show the detete container and hide others
        document.querySelector(".detete-container").style.display = "block";
        document.getElementById("tableView").style.display = "none";
        document.getElementById("managePaymentLinks").style.display = "none";
        document.getElementById("pupuForm").style.display = "none";
    }
});

// 6. Back button in detete container -> redirect to pans.php
document.getElementById("deteteBackButton").addEventListener("click", function() {
    window.location.href = "pans";
});

// 7. Copy-to-Clipboard functionality
function copyToClipboard() {
    var copyText = document.getElementById("paymentLinkField");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");

    // Visual feedback on the copy icon
    let copyButton = document.querySelector(".copy-icon i");
    copyButton.classList.remove("fa-copy");
    copyButton.classList.add("fa-check");
    
    setTimeout(() => {
        copyButton.classList.remove("fa-check");
        copyButton.classList.add("fa-copy");
    }, 1500);
}
</script>
