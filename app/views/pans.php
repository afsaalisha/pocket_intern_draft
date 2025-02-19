<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Manage Payment Links</h1>
    <span class="pepep">Payment Links</span>
    <p class="description">Here you can manage your payment links, view details, and add new links easily.</p>
    <a href="/poshet/pupu" class="add-button"><i class="fa-solid fa-plus"></i> Add New Link</a>

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
            <!-- Existing Data (Hardcoded) -->
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

            <!-- Dynamically Added Data -->
            <?php
            // File to store payment links
            $file = 'payment_links.txt';

            // Create the file if it doesn't exist
            if (!file_exists($file)) {
                file_put_contents($file, ""); // Creates an empty file
            }

            // Check if form was submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $terminal = $_POST['terminal'];
                $redirect = $_POST['redirect'];

                // Generate a unique payment link
                $payment_link = "https://pay.pocket.com.bn/payments/setCustomAmount/" . uniqid();

                // Append new entry to file
                $newEntry = "001|$terminal|https://$redirect|$payment_link\n";
                file_put_contents($file, $newEntry, FILE_APPEND);

                // Refresh page to show new data
                header("Location: pans.php");
                exit;
            }

            // Load additional saved payment links
            if (file_exists($file)) {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    list($terminal_id, $terminal_name, $redirect_link, $payment_link) = explode('|', $line);
                    echo "<tr>
                        <td>$terminal_id</td>
                        <td>$terminal_name</td>
                        <td><a href=\"$redirect_link\" target=\"_blank\" class=\"truncate\">$redirect_link</a></td>
                        <td><a href=\"$payment_link\" target=\"_blank\" class=\"truncate\">$payment_link</a></td>
                        <td><button class=\"Details\">Details</button></td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
        // Function to fix the "Add User" button in place
function fixAddButton() {
    const button = document.querySelector(".add-button"); // Select the correct button

    if (button) {
        button.style.position = "fixed"; // Ensure it remains fixed
        button.style.top = "12%"; // Keep it at 15% from the top
        button.style.zIndex = "1000"; // Ensure it stays above other elements
    }
}

// Call fixAddButton initially
fixAddButton();

// Observe DOM changes to ensure button remains in place
const observer = new MutationObserver(() => fixAddButton());
observer.observe(document.body, { childList: true, subtree: true });
</script>


