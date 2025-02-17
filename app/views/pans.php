<?php require_once 'layouts/header.php'; ?>
<?php require_once 'layouts/sidebar.php'; ?>

<div class="content">
    <h1 class="title">Manage Payment Links</h1>

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
        <tbody id="userTableBody">
            <tr>
                <td>001</td>
                <td>Coffee</td>
                <td>
                    <a href="https://bit.ly/DigitalFuture24" target="_blank" class="truncate">https://bit.ly/DigitalFuture24</a>
                </td>
                <td>
                    <a href="https://pay.pocket.com.bn/payments/setCustomAmount/..." target="_blank" class="truncate">
                        https://pay.pocket.com.bn/payments/setCustomAmount/eyJtZXJjaGFud...
                    </a>
                </td>
                <td><button class="Details" onclick="openDetailsModal()">Details</button></td>
            </tr>
            <tr>
                <td>501</td>
                <td>Shopify API</td>
                <td>
                    <a href="https://docs.google.com/document/d/1zfoote8u7zuB8GL8xbkgFDpBevb8soEpEwxJ4x0FYt8/edit?usp=sharing" target="_blank" class="truncate">
                        https://docs.google.com/document/d/1zfoote8...
                    </a>
                </td>
                <td>
                    <a href="https://pay.pocket.com.bn/payments/setCustomAmount/..." target="_blank" class="truncate">
                        https://pay.pocket.com.bn/payments/setCustomAmount/eyJtZXJjaGFud...
                    </a>
                </td>
                <td><button class="Details" onclick="openDetailsModal()">Details</button></td>
            </tr>
            <tr>
                <td>001</td>
                <td>Coffee</td>
                <td>
                    <a href="https://en.wikipedia.org/wiki/Rose" target="_blank" class="truncate">
                        https://en.wikipedia.org/wiki/Rose
                    </a>
                </td>
                <td>
                    <a href="https://pocket-payv2.threeg.asia/payments/setCustomAmount/..." target="_blank" class="truncate">
                        https://pocket-payv2.threeg.asia/payments/setCustomAmount/eyJtZXJjaGFud...
                    </a>
                </td>
                <td><button class="Details" onclick="openDetailsModal()">Details</button></td>
            </tr>
            <tr>
                <td>001</td>
                <td>Coffee</td>
                <td>
                    <a href="https://google.com" target="_blank" class="truncate">https://google.com</a>
                </td>
                <td>
                    <a href="https://pocket-payv2.threeg.asia/payments/setCustomAmount/..." target="_blank" class="truncate">
                        https://pocket-payv2.threeg.asia/payments/setCustomAmount/eyJtZXJjaGFud...
                    </a>
                </td>
                <td><button class="Details" onclick="openDetailsModal()">Details</button></td>
            </tr>
        </tbody>
    </table>
</div>
