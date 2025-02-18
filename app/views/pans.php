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


