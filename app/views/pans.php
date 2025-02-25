<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content skroll">
    <h1 class="stuh-title">Manage Payment Links</h1>
    <span class="pepep">Payment Links</span>
    <p class="description">Here you can manage your payment links, view details, and add new links easily.</p>
    <a href="/poshet/pupu" class="add-button"><i class="fa-solid fa-plus"></i> Add New Link</a>
    
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

    <!-- Hidden Details View -->
    <div id="detailsView" style="display: none;">
        <button id="backButton">⬅ Back</button>
        <h2>View Payment Link</h2>

        <label>Payment Link:</label>
        <input type="text" id="detailPaymentLink" readonly>
        <button onclick="copyToClipboard()">Copy</button>

        <h3>Link Information</h3>
        <p><strong>Terminal ID:</strong> <span id="detailTerminalId"></span></p>
        <p><strong>Terminal Name:</strong> <span id="detailTerminalName"></span></p>
        <p><strong>Redirect Link:</strong> <a id="detailRedirectLink" target="_blank"></a></p>
        <p><strong>Date Created:</strong> <span id="detailDateCreated"></span></p>

        <button class="delete-link">Delete Link</button>
    </div>
</div>

<script>
// Function to fix the "Add User" button in place
function fixAddButton() {
    const button = document.querySelector(".add-button");
    if (button) {
        button.style.position = "fixed";
        button.style.top = "12%";
        button.style.zIndex = "1000";
    }
}
fixAddButton();

const observer = new MutationObserver(() => fixAddButton());
observer.observe(document.body, { childList: true, subtree: true });

document.querySelectorAll('.Details').forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const terminalId = row.cells[0].innerText;
        const terminalName = row.cells[1].innerText;
        const redirectLink = row.cells[2].querySelector('a').href;
        const paymentLink = row.cells[3].querySelector('a').href;

        // Construct URL with parameters
        const url = `http://localhost/poshet/detete?terminalId=${encodeURIComponent(terminalId)}&terminalName=${encodeURIComponent(terminalName)}&redirectLink=${encodeURIComponent(redirectLink)}&paymentLink=${encodeURIComponent(paymentLink)}`;

        // Redirect to detete page
        window.location.href = url;
    });
});



</script>
